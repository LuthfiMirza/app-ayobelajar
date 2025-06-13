<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user if it doesn't exist
        User::firstOrCreate(
            ['email' => 'admin@ayobelajar.com'],
            [
                'name' => 'Administrator',
                'email' => 'admin@ayobelajar.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'phone' => '081234567890',
                'school' => 'Ayo Belajar',
                'level' => 'Guru',
                'region' => 'Indonesia',
            ]
        );

        // Create test user if it doesn't exist
        User::firstOrCreate(
            ['email' => 'user@ayobelajar.com'],
            [
                'name' => 'Test User',
                'email' => 'user@ayobelajar.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
                'phone' => '081234567891',
                'school' => 'SD Negeri 1',
                'level' => 'SD',
                'region' => 'Jakarta',
            ]
        );
    }
}