<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        // Lip Tint Products
        $lipTintProducts = [
            [
                'name' => 'Barenbliss Peach Makes Perfect Lip Tint',
                'description' => 'Lip tint dengan formula peach yang sempurna, memberikan warna alami dan tahan lama.',
                'price' => 61965,
                'category' => 'lip',
                'subcategory' => 'lip_tint',
                'brand' => 'Barenbliss',
                'variants' => [
                    [
                        'variant_name' => 'Barenbliss Peach Makes Perfect Lip Tint', 
                        'shade_name' => '01 Paradise Found',
                        'image_url' => 'storage/images/products/lip_tint/barenbliss/peach_makes_perfect_01.avif'
                    ],
                    [
                        'variant_name' => 'Barenbliss Peach Makes Perfect Lip Tint', 
                        'shade_name' => '02 Pretty Please',
                        'image_url' => 'storage/images/products/lip_tint/barenbliss/peach_makes_perfect_02.avif'
                    ],
                    [
                        'variant_name' => 'Barenbliss Peach Makes Perfect Lip Tint', 
                        'shade_name' => '06 Brave Enough',
                        'image_url' => 'storage/images/products/lip_tint/barenbliss/peach_makes_perfect_03.avif' // Temporary same image
                    ],
                    [
                        'variant_name' => 'Barenbliss Peach Makes Perfect Lip Tint', 
                        'shade_name' => '09 Enjoy Today',
                        'image_url' => 'storage/images/products/lip_tint/barenbliss/peach_makes_perfect_04.avif' // Temporary same image
                    ],
                    [
                        'variant_name' => 'Barenbliss Peach Makes Perfect Lip Tint', 
                        'shade_name' => '13 Rise Up',
                        'image_url' => 'storage/images/products/lip_tint/barenbliss/peach_makes_perfect_05.avif' // Temporary same image
                    ],
                ]
            ],
            [
                'name' => 'BARENBLISS Lily Makes Luminous Glow Tint',
                'description' => 'Glow tint dengan efek luminous yang membuat bibir tampak berkilau alami.',
                'price' => 72900,
                'category' => 'lip',
                'subcategory' => 'lip_tint',
                'brand' => 'Barenbliss',
                'variants' => [
                    [
                        'variant_name' => 'BARENBLISS Lily Makes Luminous Glow Tint', 
                        'shade_name' => '01 Queen Bae',
                        'image_url' => 'storage/images/products/lip_tint/barenbliss/lily_makes_luminous_glow_01.avif'
                    ],
                    [
                        'variant_name' => 'BARENBLISS Lily Makes Luminous Glow Tint', 
                        'shade_name' => '03 Figgy Plum',
                        'image_url' => 'storage/images/products/lip_tint/barenbliss/lily_makes_luminous_glow_02.avif'
                    ],
                    [
                        'variant_name' => 'BARENBLISS Lily Makes Luminous Glow Tint', 
                        'shade_name' => '04 Sunset Drop',
                        'image_url' => 'storage/images/products/lip_tint/barenbliss/lily_makes_luminous_glow_03.avif'
                    ],
                    [
                        'variant_name' => 'BARENBLISS Lily Makes Luminous Glow Tint', 
                        'shade_name' => '05 Burn Pomelo',
                        'image_url' => 'storage/images/products/lip_tint/barenbliss/lily_makes_luminous_glow_04.avif'
                    ],
                    [
                        'variant_name' => 'BARENBLISS Lily Makes Luminous Glow Tint', 
                        'shade_name' => '06 Garnet Crush',
                        'image_url' => 'storage/images/products/lip_tint/barenbliss/lily_makes_luminous_glow_05.avif'
                    ],
                ]
            ],
            // Tambahkan 4 produk lip tint lainnya untuk total 6 produk
            [
                'name' => 'Dear Me Beauty Velvet Lip Tint',
                'description' => 'Velvet lip tint dengan tekstur lembut dan warna intense.',
                'price' => 59250,
                'category' => 'lip',
                'subcategory' => 'lip_tint',
                'brand' => 'Dear Me Beauty',
                'variants' => [
                    [
                        'variant_name' => 'Dear Me Beauty Velvet Lip Tint', 
                        'shade_name' => 'Dear Aulia',
                        'image_url' => 'storage/images/products/lip_tint/dear_me_beauty/velvet_lip_tint_01.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Dear Me Beauty Velvet Lip Tint', 
                        'shade_name' => 'Dear Aulia',
                        'image_url' => 'storage/images/products/lip_tint/dear_me_beauty/velvet_lip_tint_02.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Dear Me Beauty Velvet Lip Tint', 
                        'shade_name' => 'Dear Diana',
                        'image_url' => 'storage/images/products/lip_tint/dear_me_beauty/velvet_lip_tint_03.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Dear Me Beauty Velvet Lip Tint', 
                        'shade_name' => 'Dear Niki',
                        'image_url' => 'storage/images/products/lip_tint/dear_me_beauty/velvet_lip_tint_04.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Dear Me Beauty Velvet Lip Tint', 
                        'shade_name' => 'Dear Vinna',
                        'image_url' => 'storage/images/products/lip_tint/dear_me_beauty/velvet_lip_tint_05.avif' // Temporary
                    ],
                ]
            ],
            [
                'name' => 'Dear Me Beauty Serum Lip Tint',
                'description' => 'Serum lip tint dengan kandungan nourishing untuk bibir.',
                'price' => 34300,
                'category' => 'lip',
                'subcategory' => 'lip_tint',
                'brand' => 'Dear Me Beauty',
                'variants' => [
                    [
                        'variant_name' => 'Dear Me Beauty Serum Lip Tint', 
                        'shade_name' => 'Dear Elise',
                        'image_url' => 'storage/images/products/lip_tint/dear_me_beauty/Serum_lip_tint_01.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Dear Me Beauty Serum Lip Tint', 
                        'shade_name' => 'Dear Kyls',
                        'image_url' => 'storage/images/products/lip_tint/dear_me_beauty/Serum_lip_tint_02.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Dear Me Beauty Serum Lip Tint', 
                        'shade_name' => 'Dear Maudy',
                        'image_url' => 'storage/images/products/lip_tint/dear_me_beauty/Serum_lip_tint_03.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Dear Me Beauty Serum Lip Tint', 
                        'shade_name' => 'Dear Monico',
                        'image_url' => 'storage/images/products/lip_tint/dear_me_beauty/Serum_lip_tint_04.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Dear Me Beauty Serum Lip Tint', 
                        'shade_name' => 'Dear Valerie',
                        'image_url' => 'storage/images/products/lip_tint/dear_me_beauty/Serum_lip_tint_05.avif' // Temporary
                    ],
                ]
            ],
            [
                'name' => 'Judydoll Watery Iron Liptint Gloss',
                'description' => 'Watery lip tint dengan finish gloss yang menyegarkan.',
                'price' => 114939,
                'category' => 'lip',
                'subcategory' => 'lip_tint',
                'brand' => 'Judydoll',
                'variants' => [
                    [
                        'variant_name' => 'Judydoll Watery Iron Liptint Gloss', 
                        'shade_name' => '01',
                        'image_url' => 'storage/images/products/lip_tint/judy_doll/iron_liptint_gloss_01.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'Judydoll Watery Iron Liptint Gloss', 
                        'shade_name' => '02',
                        'image_url' => 'storage/images/products/lip_tint/judy_doll/iron_liptint_gloss_02.WEBP' // Temporary
                    ],
                    [
                        'variant_name' => 'Judydoll Watery Iron Liptint Gloss', 
                        'shade_name' => '03',
                        'image_url' => 'storage/images/products/lip_tint/judy_doll/iron_liptint_gloss_03.WEBP' // Temporary
                    ],
                    [
                        'variant_name' => 'Judydoll Watery Iron Liptint Gloss', 
                        'shade_name' => '04',
                        'image_url' => 'storage/images/products/lip_tint/judy_doll/iron_liptint_gloss_04.WEBP' // Temporary
                    ],
                    [
                        'variant_name' => 'Judydoll Watery Iron Liptint Gloss', 
                        'shade_name' => '05',
                        'image_url' => 'storage/images/products/lip_tint/judy_doll/iron_liptint_gloss_05.JPG' // Temporary
                    ],
                ]
            ],
            [
                'name' => 'BLP Lip Gel - Liptint',
                'description' => 'Lip gel dengan formula tint yang ringan dan nyaman.',
                'price' => 79135,
                'category' => 'lip',
                'subcategory' => 'lip_tint',
                'brand' => 'BLP',
                'variants' => [
                    [
                        'variant_name' => 'BLP Lip Gel - Liptint', 
                        'shade_name' => 'Carnation',
                        'image_url' => 'storage/images/products/lip_tint/blp/lip_gel_01.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'BLP Lip Gel - Liptint', 
                        'shade_name' => 'Magnolia',
                        'image_url' => 'storage/images/products/lip_tint/blp/lip_gel_02.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'BLP Lip Gel - Liptint', 
                        'shade_name' => 'Marigold',
                        'image_url' => 'storage/images/products/lip_tint/blp/lip_gel_03.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'BLP Lip Gel - Liptint', 
                        'shade_name' => 'Sweet Pea',
                        'image_url' => 'storage/images/products/lip_tint/blp/lip_gel_04.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'BLP Lip Gel - Liptint', 
                        'shade_name' => 'Daylily',
                        'image_url' => 'storage/images/products/lip_tint/blp/lip_gel_05.PNG' // Temporary
                    ],
                ]
            ],
            [
                'name' => 'Rose All Day Plush Lip Tint',
                'description' => 'Lip gel dengan formula tint yang ringan dan nyaman.',
                'price' => 74052,
                'category' => 'lip',
                'subcategory' => 'lip_tint',
                'brand' => 'Rose All Day',
                'variants' => [
                    [
                        'variant_name' => 'Rose All Day Plush Lip Tint', 
                        'shade_name' => 'R1',
                        'image_url' => 'storage/images/products/lip_tint/rose_all_day/R1.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'Rose All Day Plush Lip Tint', 
                        'shade_name' => 'R2',
                        'image_url' => 'storage/images/products/lip_tint/rose_all_day/R2.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'Rose All Day Plush Lip Tint', 
                        'shade_name' => 'R3',
                        'image_url' => 'storage/images/products/lip_tint/rose_all_day/R3.jpg' // Temporary
                    ], 
                    [
                        'variant_name' => 'Rose All Day Plush Lip Tint', 
                        'shade_name' => 'R4',
                        'image_url' => 'storage/images/products/lip_tint/rose_all_day/R4.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'Rose All Day Plush Lip Tint', 
                        'shade_name' => 'R5',
                        'image_url' => 'storage/images/products/lip_tint/rose_all_day/R5.jpg' // Temporary
                    ],
                ]
            ],
            [
                'name' => 'Time Phoria - Stellar Dust Lip Stain',
                'description' => 'Lip gel dengan formula tint yang ringan dan nyaman.',
                'price' => 87200,
                'category' => 'lip',
                'subcategory' => 'lip_tint',
                'brand' => 'Time Phoria',
                'variants' => [
                    [
                        'variant_name' => 'Time Phoria - Stellar Dust Lip Stain', 
                        'shade_name' => '01',
                        'image_url' => 'storage/images/products/lip_tint/time_phoria/01.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'Time Phoria - Stellar Dust Lip Stain', 
                        'shade_name' => '02',
                        'image_url' => 'storage/images/products/lip_tint/time_phoria/02.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'Time Phoria - Stellar Dust Lip Stain', 
                        'shade_name' => '03',
                        'image_url' => 'storage/images/products/lip_tint/time_phoria/03.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'Time Phoria - Stellar Dust Lip Stain', 
                        'shade_name' => '04',
                        'image_url' => 'storage/images/products/lip_tint/time_phoria/04.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'Time Phoria - Stellar Dust Lip Stain', 
                        'shade_name' => '05',
                        'image_url' => 'storage/images/products/lip_tint/time_phoria/05.jpg' // Temporary
                    ],
                ]
            ],
            [
                'name' => 'MOTHER OF PEARL AM to PM Colorfast Hypertint',
                'description' => 'Lip gel dengan formula tint yang ringan dan nyaman.',
                'price' => 80168,
                'category' => 'lip',
                'subcategory' => 'lip_tint',
                'brand' => 'MOP',
                'variants' => [
                    [
                        'variant_name' => 'MOTHER OF PEARL AM to PM Colorfast Hypertint', 
                        'shade_name' => 'M1',
                        'image_url' => 'storage/images/products/lip_tint/mop/M1.png' // Temporary
                    ],
                    [
                        'variant_name' => 'MOTHER OF PEARL AM to PM Colorfast Hypertint', 
                        'shade_name' => 'M2',
                        'image_url' => 'storage/images/products/lip_tint/mop/M2.png' // Temporary
                    ],
                    [
                        'variant_name' => 'MOTHER OF PEARL AM to PM Colorfast Hypertint', 
                        'shade_name' => 'M3',
                        'image_url' => 'storage/images/products/lip_tint/mop/M3.png' // Temporary
                    ],
                    [
                        'variant_name' => 'MOTHER OF PEARL AM to PM Colorfast Hypertint', 
                        'shade_name' => 'M4',
                        'image_url' => 'storage/images/products/lip_tint/mop/M4.png' // Temporary
                    ],
                    [
                        'variant_name' => 'MOTHER OF PEARL AM to PM Colorfast Hypertint', 
                        'shade_name' => 'M5',
                        'image_url' => 'storage/images/products/lip_tint/mop/M5.png' // Temporary
                    ],
                ]
            ],
            [
                'name' => 'Raecca Glow Up Tint — Soft on Lips, Strong on Stain Lip Tint',
                'description' => 'Lip gel dengan formula tint yang ringan dan nyaman.',
                'price' => 58900,
                'category' => 'lip',
                'subcategory' => 'lip_tint',
                'brand' => 'Raecca',
                'variants' => [
                    [
                        'variant_name' => 'Raecca Glow Up Tint — Soft on Lips, Strong on Stain Lip Tint', 
                        'shade_name' => 'Active',
                        'image_url' => 'storage/images/products/lip_tint/raecca/Active.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'Raecca Glow Up Tint — Soft on Lips, Strong on Stain Lip Tint', 
                        'shade_name' => 'Brave',
                        'image_url' => 'storage/images/products/lip_tint/raecca/Brave.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'Raecca Glow Up Tint — Soft on Lips, Strong on Stain Lip Tint', 
                        'shade_name' => 'Confident',
                        'image_url' => 'storage/images/products/lip_tint/raecca/Confident.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'Raecca Glow Up Tint — Soft on Lips, Strong on Stain Lip Tint', 
                        'shade_name' => 'Dynamic',
                        'image_url' => 'storage/images/products/lip_tint/raecca/Dynamic.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'Raecca Glow Up Tint — Soft on Lips, Strong on Stain Lip Tint', 
                        'shade_name' => 'Strong',
                        'image_url' => 'storage/images/products/lip_tint/raecca/Strong.PNG' // Temporary
                    ],
                ]
            ],
            [
                'name' => 'Holika Holika Heart Crush Glow Tint Air | Glossy Lip Tint',
                'description' => 'Lip gel dengan formula tint yang ringan dan nyaman.',
                'price' => 98999,
                'category' => 'lip',
                'subcategory' => 'lip_tint',
                'brand' => 'Holika Holika',
                'variants' => [
                    [
                        'variant_name' => 'Holika Holika Heart Crush Glow Tint Air | Glossy Lip Tint', 
                        'shade_name' => '01 Winsome',
                        'image_url' => 'storage/images/products/lip_tint/holika_holika/01 Winsome.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'Holika Holika Heart Crush Glow Tint Air | Glossy Lip Tint', 
                        'shade_name' => '02 Wig',
                        'image_url' => 'storage/images/products/lip_tint/holika_holika/02 Wig.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'Holika Holika Heart Crush Glow Tint Air | Glossy Lip Tint', 
                        'shade_name' => '03 Bae',
                        'image_url' => 'storage/images/products/lip_tint/holika_holika/03 Bae.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'Holika Holika Heart Crush Glow Tint Air | Glossy Lip Tint', 
                        'shade_name' => '04 Bubbly',
                        'image_url' => 'storage/images/products/lip_tint/holika_holika/04 Bubbly.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'Holika Holika Heart Crush Glow Tint Air | Glossy Lip Tint', 
                        'shade_name' => '05 OH!',
                        'image_url' => 'storage/images/products/lip_tint/holika_holika/05 OH!.PNG' // Temporary
                    ],
                ]
            ],
        ];

        // Lip Cream Products
        $lipCreamProducts = [
            [
                'name' => 'Barenbliss Cherry Makes Cheerful Lip Velvet',
                'description' => 'Lip velvet dengan cherry essence yang memberikan warna matte sempurna.',
                'price' => 75000,
                'category' => 'lip',
                'subcategory' => 'lip_cream',
                'brand' => 'Barenbliss',
                'variants' => [
                    [
                        'variant_name' => 'Barenbliss Cherry Makes Cheerful Lip Velvet', 
                        'shade_name' => '01 Blushed Moment',
                        'image_url' => 'storage/images/products/lip_cream/barenbliss/cherry_makes_cheerful_01.PNG'
                    ],
                    [
                        'variant_name' => 'Barenbliss Cherry Makes Cheerful Lip Velvet', 
                        'shade_name' => '03 Cherish Delight',
                        'image_url' => 'storage/images/products/lip_cream/barenbliss/cherry_makes_cheerful_02.PNG'
                    ],
                ]
            ],
            [
                'name' => 'BNB Barenbliss Aura Mood Transferproof Vinyl Lip Cream',
                'description' => 'Transferproof vinyl lip cream dengan finish glossy yang tahan lama.',
                'price' => 159000,
                'category' => 'lip',
                'subcategory' => 'lip_cream',
                'brand' => 'Barenbliss',
                'variants' => [
                    [
                        'variant_name' => 'BNB Barenbliss Aura Mood Transferproof Vinyl Lip Cream', 
                        'shade_name' => '001 Movie Night',
                        'image_url' => 'storage/images/products/lip_cream/barenbliss/001 Movie Night.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'BNB Barenbliss Aura Mood Transferproof Vinyl Lip Cream', 
                        'shade_name' => '333 First Meet',
                        'image_url' => 'storage/images/products/lip_cream/barenbliss/333 First Meet.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'BNB Barenbliss Aura Mood Transferproof Vinyl Lip Cream', 
                        'shade_name' => '518 Silent Touch',
                        'image_url' => 'storage/images/products/lip_cream/barenbliss/518 Silent Touch.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'BNB Barenbliss Aura Mood Transferproof Vinyl Lip Cream', 
                        'shade_name' => '600 Midnight Talk',
                        'image_url' => 'storage/images/products/lip_cream/barenbliss/600 Midnight Talk.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'BNB Barenbliss Aura Mood Transferproof Vinyl Lip Cream', 
                        'shade_name' => '789 Cute Smile',
                        'image_url' => 'storage/images/products/lip_cream/barenbliss/789 Cute Smile.PNG' // Temporary
                    ],
                ]
            ],
            // Tambahkan 4 produk lip cream lainnya untuk total 6 produk
            [
                'name' => 'Raecca Power Frosted Velvet Matte',
                'description' => 'Velvet matte lip cream dengan tekstur frosted yang mewah.',
                'price' => 72900,
                'category' => 'lip',
                'subcategory' => 'lip_cream',
                'brand' => 'Raecca',
                'variants' => [
                    [
                        'variant_name' => 'Raecca Power Frosted Velvet Matte', 
                        'shade_name' => 'Classy Power',
                        'image_url' => 'storage/images/products/lip_cream/raecca/Classy Power.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'Raecca Power Frosted Velvet Matte', 
                        'shade_name' => 'Heart Power',
                        'image_url' => 'storage/images/products/lip_cream/raecca/Heart Power.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'Raecca Power Frosted Velvet Matte', 
                        'shade_name' => 'Honest  Power',
                        'image_url' => 'storage/images/products/lip_cream/raecca/Honest lassy Power.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'Raecca Power Frosted Velvet Matte', 
                        'shade_name' => 'Kind Power',
                        'image_url' => 'storage/images/products/lip_cream/raecca/Kind Power.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'Raecca Power Frosted Velvet Matte', 
                        'shade_name' => 'Smart Power',
                        'image_url' => 'storage/images/products/lip_cream/raecca/Smart Power.PNG' // Temporary
                    ],
                ]
            ],
            [
                'name' => 'MakeOver Intense Matte Lip Cream',
                'description' => 'Intense matte lip cream dengan pigmentasi tinggi.',
                'price' => 119000,
                'category' => 'lip',
                'subcategory' => 'lip_cream',
                'brand' => 'Makeover',
                'variants' => [
                    [
                        'variant_name' => 'MakeOver Intense Matte Lip Cream', 
                        'shade_name' => '001 lavish',
                        'image_url' => 'storage/images/products/lip_cream/makeover/001 lavish.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'MakeOver Intense Matte Lip Cream', 
                        'shade_name' => '002 Heiress',
                        'image_url' => 'storage/images/products/lip_cream/makeover/002 Heiress.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'MakeOver Intense Matte Lip Cream', 
                        'shade_name' => '004 vanity',
                        'image_url' => 'storage/images/products/lip_cream/makeover/004 vanity.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'MakeOver Intense Matte Lip Cream', 
                        'shade_name' => '017 savvy',
                        'image_url' => 'storage/images/products/lip_cream/makeover/017 savvy.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'MakeOver Intense Matte Lip Cream', 
                        'shade_name' => '016 Pixie',
                        'image_url' => 'storage/images/products/lip_cream/makeover/016 Pixie.avif' // Temporary
                    ],

                ]
            ],
            [
                'name' => 'Make Over Powerstay Transferproof Matte Lip Cream',
                'description' => 'Transferproof matte lip cream yang tahan seharian.',
                'price' => 143000,
                'category' => 'lip',
                'subcategory' => 'lip_cream',
                'brand' => 'Makeover',
                'variants' => [
                    [
                        'variant_name' => 'Make Over Powerstay Transferproof Matte Lip Cream', 
                        'shade_name' => 'P18 Make Over Pink',
                        'image_url' => 'storage/images/products/lip_cream/makeover/P18 Make Over Pink.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Make Over Powerstay Transferproof Matte Lip Cream', 
                        'shade_name' => 'B30 Fame',
                        'image_url' => 'storage/images/products/lip_cream/makeover/B30 Fame.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Make Over Powerstay Transferproof Matte Lip Cream', 
                        'shade_name' => 'B40 Authentic',
                        'image_url' => 'storage/images/products/lip_cream/makeover/B40 Authentic.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Make Over Powerstay Transferproof Matte Lip Cream', 
                        'shade_name' => 'P19 Plum Red',
                        'image_url' => 'storage/images/products/lip_cream/makeover/P19 Plum Red.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Make Over Powerstay Transferproof Matte Lip Cream', 
                        'shade_name' => 'P14 Peaches And Cream',
                        'image_url' => 'storage/images/products/lip_cream/makeover/P14 Peaches And Cream.avif' // Temporary
                    ],
                ]
            ],
            [
                'name' => 'Maybelline Superstay Matte Ink Liquid Lipstick',
                'description' => 'Matte ink liquid lipstick dengan ketahanan ekstra lama.',
                'price' => 138900,
                'category' => 'lip',
                'subcategory' => 'lip_cream',
                'brand' => 'Maybelline',
                'variants' => [
                    [
                        'variant_name' => 'Maybelline Superstay Matte Ink Liquid Lipstick', 
                        'shade_name' => '175 Ringleader',
                        'image_url' => 'storage/images/products/lip_cream/maybelline/175 Ringleader.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Maybelline Superstay Matte Ink Liquid Lipstick', 
                        'shade_name' => '385 Validator',
                        'image_url' => 'storage/images/products/lip_cream/maybelline/385 Validator.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Maybelline Superstay Matte Ink Liquid Lipstick', 
                        'shade_name' => '170 Initiator',
                        'image_url' => 'storage/images/products/lip_cream/maybelline/170 Initiator.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Maybelline Superstay Matte Ink Liquid Lipstick', 
                        'shade_name' => '125 Inspirer',
                        'image_url' => 'storage/images/products/lip_cream/maybelline/125 Inspirer.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Maybelline Superstay Matte Ink Liquid Lipstick', 
                        'shade_name' => '305 Unconventional',
                        'image_url' => 'storage/images/products/lip_cream/maybelline/305 Unconventional.avif' // Temporary
                    ],
                ]
            ],
            [
                'name' => 'Maybelline SuperStay Vinyl Ink',
                'description' => 'Matte ink liquid lipstick dengan ketahanan ekstra lama.',
                'price' => 139900,
                'category' => 'lip',
                'subcategory' => 'lip_cream',
                'brand' => 'Maybelline',
                'variants' => [
                    [
                        'variant_name' => 'Maybelline SuperStay Vinyl Ink', 
                        'shade_name' => '53 Unpredictable',
                        'image_url' => 'storage/images/products/lip_cream/maybelline/53 Unpredictable.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Maybelline SuperStay Vinyl Ink', 
                        'shade_name' => '80 Eccentric',
                        'image_url' => 'storage/images/products/lip_cream/maybelline/80 Eccentric.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Maybelline SuperStay Vinyl Ink', 
                        'shade_name' => '37 Daring',
                        'image_url' => 'storage/images/products/lip_cream/maybelline/37 Daring.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Maybelline SuperStay Vinyl Ink', 
                        'shade_name' => '30 Unrivaled',
                        'image_url' => 'storage/images/products/lip_cream/maybelline/30 Unrivaled.avif' // Temporary
                    ],
                    [
                        'variant_name' => 'Maybelline SuperStay Vinyl Ink', 
                        'shade_name' => '23 Rebelllious',
                        'image_url' => 'storage/images/products/lip_cream/maybelline/23 Rebelllious.avif' // Temporary
                    ],
                ]
            ],
            [
                'name' => 'Rose All Day Mousse Records',
                'description' => 'Matte ink liquid lipstick dengan ketahanan ekstra lama.',
                'price' => 69000,
                'category' => 'lip',
                'subcategory' => 'lip_cream',
                'brand' => 'Rose All Day',
                'variants' => [
                    [
                        'variant_name' => 'Rose All Day Mousse Records', 
                        'shade_name' => '01',
                        'image_url' => 'storage/images/products/lip_cream/rose_all_day/RC1.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'Rose All Day Mousse Records', 
                        'shade_name' => '02',
                        'image_url' => 'storage/images/products/lip_cream/rose_all_day/RC2.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'Rose All Day Mousse Records', 
                        'shade_name' => '03',
                        'image_url' => 'storage/images/products/lip_cream/rose_all_day/RC3.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'Rose All Day Mousse Records', 
                        'shade_name' => '04',
                        'image_url' => 'storage/images/products/lip_cream/rose_all_day/RC4.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'Rose All Day Mousse Records', 
                        'shade_name' => '05',
                        'image_url' => 'storage/images/products/lip_cream/rose_all_day/RC5.jpg' // Temporary
                    ],
                ]
            ],
            [
                'name' => 'Time Phoria - Nebula Velvet Lip Cream',
                'description' => 'Matte ink liquid lipstick dengan ketahanan ekstra lama.',
                'price' => 87200,
                'category' => 'lip',
                'subcategory' => 'lip_cream',
                'brand' => 'Time Phoria',
                'variants' => [
                    [
                        'variant_name' => 'Time Phoria - Nebula Velvet Lip Cream', 
                        'shade_name' => 'TC01',
                        'image_url' => 'storage/images/products/lip_cream/time_phoria/TC01.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'Time Phoria - Nebula Velvet Lip Cream', 
                        'shade_name' => 'TC02',
                        'image_url' => 'storage/images/products/lip_cream/time_phoria/TC02.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'Time Phoria - Nebula Velvet Lip Cream', 
                        'shade_name' => 'TC03',
                        'image_url' => 'storage/images/products/lip_cream/time_phoria/TC03.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'Time Phoria - Nebula Velvet Lip Cream', 
                        'shade_name' => 'TC04',
                        'image_url' => 'storage/images/products/lip_cream/time_phoria/TC04.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'Time Phoria - Nebula Velvet Lip Cream', 
                        'shade_name' => 'TC05',
                        'image_url' => 'storage/images/products/lip_cream/time_phoria/TC05.jpg' // Temporary
                    ],
                ]
            ],
            [
                'name' => 'MOTHER OF PEARL - My Perfect Nude Lip Cream',
                'description' => 'Matte ink liquid lipstick dengan ketahanan ekstra lama.',
                'price' => 90500,
                'category' => 'lip',
                'subcategory' => 'lip_cream',
                'brand' => 'MOP',
                'variants' => [
                    [
                        'variant_name' => 'MOTHER OF PEARL - My Perfect Nude Lip Cream', 
                        'shade_name' => 'MOP1',
                        'image_url' => 'storage/images/products/lip_cream/mop/MOP1.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'MOTHER OF PEARL - My Perfect Nude Lip Cream', 
                        'shade_name' => 'MOP2',
                        'image_url' => 'storage/images/products/lip_cream/mop/MOP2.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'MOTHER OF PEARL - My Perfect Nude Lip Cream', 
                        'shade_name' => 'MOP3',
                        'image_url' => 'storage/images/products/lip_cream/mop/MOP3.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'MOTHER OF PEARL - My Perfect Nude Lip Cream', 
                        'shade_name' => 'MOP4',
                        'image_url' => 'storage/images/products/lip_cream/mop/MOP4.jpg' // Temporary
                    ],
                    [
                        'variant_name' => 'MOTHER OF PEARL - My Perfect Nude Lip Cream', 
                        'shade_name' => 'MOP5',
                        'image_url' => 'storage/images/products/lip_cream/mop/MOP5.jpg' // Temporary
                    ],
                ]
            ],
            [
                'name' => 'SOMETHINC MAKEUP Idol Bullry Soft Lip Matte - Lip Cream Matte',
                'description' => 'Matte ink liquid lipstick dengan ketahanan ekstra lama.',
                'price' => 31355,
                'category' => 'lip',
                'subcategory' => 'lip_cream',
                'brand' => 'Somethinc',
                'variants' => [
                    [
                        'variant_name' => 'SOMETHINC MAKEUP Idol Bullry Soft Lip Matte - Lip Cream Matte', 
                        'shade_name' => 'Slay',
                        'image_url' => 'storage/images/products/lip_cream/somethinc/Slay.JPG' // Temporary
                    ],
                    [
                        'variant_name' => 'SOMETHINC MAKEUP Idol Bullry Soft Lip Matte - Lip Cream Matte', 
                        'shade_name' => 'Confess',
                        'image_url' => 'storage/images/products/lip_cream/somethinc/Confess.JPG' // Temporary
                    ],
                    [
                        'variant_name' => 'SOMETHINC MAKEUP Idol Bullry Soft Lip Matte - Lip Cream Matte', 
                        'shade_name' => 'Happier',
                        'image_url' => 'storage/images/products/lip_cream/somethinc/Happier.WEBP' // Temporary
                    ],
                    [
                        'variant_name' => 'SOMETHINC MAKEUP Idol Bullry Soft Lip Matte - Lip Cream Matte', 
                        'shade_name' => 'Trouble',
                        'image_url' => 'storage/images/products/lip_cream/somethinc/Trouble.JPG' // Temporary
                    ],
                    [
                        'variant_name' => 'SOMETHINC MAKEUP Idol Bullry Soft Lip Matte - Lip Cream Matte', 
                        'shade_name' => 'Hunter',
                        'image_url' => 'storage/images/products/lip_cream/somethinc/Hunter.JPG' // Temporary
                    ],
                ]
            ],
            [
                'name' => 'Holika Holika Butter Blur Tint',
                'description' => 'Matte ink liquid lipstick dengan ketahanan ekstra lama.',
                'price' => 109999,
                'category' => 'lip',
                'subcategory' => 'lip_cream',
                'brand' => 'Holika Holika',
                'variants' => [
                    [
                        'variant_name' => 'Holika Holika Butter Blur Tint', 
                        'shade_name' => '01 Salted',
                        'image_url' => 'storage/images/products/lip_cream/holika_holika/01 Salted.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'Holika Holika Butter Blur Tint', 
                        'shade_name' => '02 Peanut',
                        'image_url' => 'storage/images/products/lip_cream/holika_holika/02 Peanut.WEBP' // Temporary
                    ],
                    [
                        'variant_name' => 'Holika Holika Butter Blur Tint', 
                        'shade_name' => '03 Aging',
                        'image_url' => 'storage/images/products/lip_cream/holika_holika/03 Aging.PNG' // Temporary
                    ],
                    [
                        'variant_name' => 'Holika Holika Butter Blur Tint', 
                        'shade_name' => '04 Rose',
                        'image_url' => 'storage/images/products/lip_cream/holika_holika/04 Rose.JPG' // Temporary
                    ],
                    [
                        'variant_name' => 'Holika Holika Butter Blur Tint', 
                        'shade_name' => '05 Chill',
                        'image_url' => 'storage/images/products/lip_cream/holika_holika/05 Chill.JPG' // Temporary
                    ],
                ]
            ],
        ];

        // Insert Lip Tint Products
        foreach ($lipTintProducts as $productData) {
            $this->createProductWithVariants($productData);
        }

        // Insert Lip Cream Products
        foreach ($lipCreamProducts as $productData) {
            $this->createProductWithVariants($productData);
        }
    }

    private function createProductWithVariants($productData)
    {
        $product = Product::create([
            'name' => $productData['name'],
            'description' => $productData['description'],
            'price' => $productData['price'],
            'category' => $productData['category'],
            'subcategory' => $productData['subcategory'],
            'brand' => $productData['brand'],
        ]);

        foreach ($productData['variants'] as $variant) {
            ProductVariant::create([
                'product_id' => $product->id,
                'variant_name' => $variant['variant_name'],
                'shade_name' => $variant['shade_name'],
                'image_url' => $variant['image_url'],
            ]);
        }
    }
}