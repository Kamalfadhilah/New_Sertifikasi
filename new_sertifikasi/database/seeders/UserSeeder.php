<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //admin
        User::create([
            'name' => 'Iam Admin',
            'password' => Hash::make('12345678'),
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'is_admin' => 'y',
        ]);

        //user
        User::create([
            'name' => 'Iam User',
            'password' => Hash::make('12345678'),
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'is_admin' => 'n'
        ]);
    }
}
