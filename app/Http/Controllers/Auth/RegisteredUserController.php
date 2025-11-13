<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
   public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'age' => ['required', 'integer', 'min:1', 'max:100'],
        'instance' => ['required', 'string', 'max:255'],
        'ethnicity' => ['required', 'string', 'max:100'],
        'occupation' => ['required', 'string', 'max:100'],
        'gender' => ['required', 'string', 'in:male,female,other'],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'age' => $request->age,
        'instance' => $request->instance,
        'ethnicity' => $request->ethnicity,
        'occupation' => $request->occupation,
        'gender' => $request->gender,
        'role' => 'customer',
        'balance' => 200000,
    ]);

    event(new Registered($user));

    Auth::login($user);

    return redirect(route('home', absolute: false));
}
}