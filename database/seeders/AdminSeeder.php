<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Jefri',
            'email' => 'adminjefri@gmail.com',
            'password' => Hash::make('admin1234'),
            'email_verified_at' => now(),
        ]);
    }
} 