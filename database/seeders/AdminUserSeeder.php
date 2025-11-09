<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@lessismore.com',
            'password' => Hash::make('admin123'),
            'age' => 30,
            'gender' => 'male',
            'role' => 'admin',
            'balance' => 0,
        ]);
    }
}