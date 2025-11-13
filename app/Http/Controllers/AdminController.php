<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\ProductVariant;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!auth()->user()->isAdmin()) {
                abort(403, 'Unauthorized action.');
            }
            return $next($request);
        });
    }

    public function dashboard()
    {
        try {
            // Debug: Cek apakah ada data orders
            $allOrders = Order::all();
            Log::info('Total orders in database: ' . $allOrders->count());
            
            $customersCount = User::where('role', 'customer')->count();
            $productsCount = Product::count();
            $ordersCount = Order::count();
            $completedOrdersCount = Order::where('status', 'completed')->count();
            $todayOrdersCount = Order::whereDate('created_at', today())->count();
            $totalRevenue = Order::where('status', 'completed')->sum('total_amount');
            $averageOrderValue = $ordersCount > 0 ? $totalRevenue / $ordersCount : 0;
            $conversionRate = $customersCount > 0 ? ($ordersCount / $customersCount) * 100 : 0;

            $recentCustomers = User::where('role', 'customer')
                ->withCount('orders')
                ->latest()
                ->take(5)
                ->get();

            // **PASTIKAN VARIABLE RECENTORDERS SELALU ADA**
            $recentOrders = Order::with([
                    'user', 
                    'items.product', 
                    'items.variant'
                ])
                ->latest()
                ->take(5)
                ->get();

            Log::info('Recent orders count: ' . $recentOrders->count());
            Log::info('Recent orders IDs: ' . $recentOrders->pluck('id')->implode(', '));

            return view('admin.dashboard', compact(
                'customersCount', 
                'productsCount', 
                'ordersCount', 
                'completedOrdersCount',
                'todayOrdersCount', 
                'totalRevenue', 
                'averageOrderValue', 
                'conversionRate',
                'recentCustomers', 
                'recentOrders'
            ));

        } catch (\Exception $e) {
            Log::error('Dashboard error: ' . $e->getMessage());
            
            // **FALLBACK: Return default values jika ada error**
            return view('admin.dashboard', [
                'customersCount' => 0,
                'productsCount' => 0,
                'ordersCount' => 0,
                'completedOrdersCount' => 0,
                'todayOrdersCount' => 0,
                'totalRevenue' => 0,
                'averageOrderValue' => 0,
                'conversionRate' => 0,
                'recentCustomers' => collect(),
                'recentOrders' => collect() // **PASTIKAN INI ADA**
            ]);
        }
    }

    public function customers()
    {
        $customers = User::where('role', 'customer')->withCount('orders')->get();
        
        $allOrders = Order::with([
                'user', 
                'items.product', 
                'items.variant'
            ])
            ->latest()
            ->get();

        return view('admin.customers', compact('customers', 'allOrders'));
    }


    public function products()
    {
        $products = Product::with('variants')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function createProduct()
    {
        return view('admin.products.create');
    }

    public function editProduct(Product $product)
    {
        $product->load('variants');
        return view('admin.products.edit', compact('product'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string',
            'subcategory' => 'required|string',
            'brand' => 'required|string|max:255',
            'variants' => 'required|array|min:1',
            'variants.*.shade_name' => 'required|string|max:255',
            'variants.*.image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        try {
            // Create product
            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category' => $request->category,
                'subcategory' => $request->subcategory,
                'brand' => $request->brand,
            ]);

            // Create variants - simpan di public folder
            foreach ($request->variants as $variantData) {
                $image = $variantData['image'];
                
                // Generate unique filename
                $imageName = Str::slug($request->name) . '-' . Str::slug($variantData['shade_name']) . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                
                // Create directory if not exists
                $directory = public_path('images/products');
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }
                
                // Save image to public/images/products/
                $image->move($directory, $imageName);
                
                ProductVariant::create([
                    'product_id' => $product->id,
                    'variant_name' => $request->name,
                    'shade_name' => $variantData['shade_name'],
                    'image_url' => 'images/products/' . $imageName, // Relative path
                ]);
            }

            return redirect()->route('admin.products')->with('success', 'Produk berhasil ditambahkan! ');
        } catch (\Exception $e) {
            Log::error('Error creating product: ' . $e->getMessage());
            return back()->with('error', 'Gagal menambahkan produk: ' . $e->getMessage());
        }
    }

    public function updateProduct(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string',
            'subcategory' => 'required|string',
            'brand' => 'required|string|max:255',
            'variants' => 'required|array|min:1',
            'variants.*.shade_name' => 'required|string|max:255',
            'variants.*.image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'variants.*.id' => 'sometimes|exists:product_variants,id',
        ]);

        try {
            // Update product
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category' => $request->category,
                'subcategory' => $request->subcategory,
                'brand' => $request->brand,
            ]);

            // Update variants
            foreach ($request->variants as $variantData) {
                $variantData = (object) $variantData;
                
                if (isset($variantData->id)) {
                    // Update existing variant
                    $variant = ProductVariant::find($variantData->id);
                    if ($variant) {
                        $updateData = [
                            'variant_name' => $request->name,
                            'shade_name' => $variantData->shade_name,
                        ];

                        if (isset($variantData->image)) {
                            // Delete old image
                            if ($variant->image_url && file_exists(public_path($variant->image_url))) {
                                unlink(public_path($variant->image_url));
                            }
                            
                            // Save new image
                            $image = $variantData->image;
                            $imageName = Str::slug($request->name) . '-' . Str::slug($variantData->shade_name) . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                            $directory = public_path('images/products');
                            
                            $image->move($directory, $imageName);
                            $updateData['image_url'] = 'images/products/' . $imageName;
                        }

                        $variant->update($updateData);
                    }
                } else {
                    // Create new variant
                    $image = $variantData->image;
                    $imageName = Str::slug($request->name) . '-' . Str::slug($variantData->shade_name) . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $directory = public_path('images/products');
                    
                    $image->move($directory, $imageName);
                    
                    ProductVariant::create([
                        'product_id' => $product->id,
                        'variant_name' => $request->name,
                        'shade_name' => $variantData->shade_name,
                        'image_url' => 'images/products/' . $imageName,
                    ]);
                }
            }

            return redirect()->route('admin.products')->with('success', 'Produk berhasil diperbarui! Jangan lupa commit perubahan gambar ke repository.');
        } catch (\Exception $e) {
            Log::error('Error updating product: ' . $e->getMessage());
            return back()->with('error', 'Gagal memperbarui produk: ' . $e->getMessage());
        }
    }

    public function destroyProduct(Product $product)
    {
        try {
            // Delete variant images
            foreach ($product->variants as $variant) {
                if ($variant->image_url && file_exists(public_path($variant->image_url))) {
                    unlink(public_path($variant->image_url));
                }
            }
            
            $product->delete();
            return redirect()->route('admin.products')->with('success', 'Produk berhasil dihapus! Jangan lupa commit penghapusan gambar ke repository.');
        } catch (\Exception $e) {
            Log::error('Error deleting product: ' . $e->getMessage());
            return back()->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
        }
    }
}