<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create an admin (staff) user
        User::create([
            'username' => 'admin', // Admin username
            'name' => 'admin',
            'email' => 'admin@example.com', // Admin email
            'password' => Hash::make('password123'), // Admin password (hashed)
            'profilePicture' => 'default.png', // Default profile picture
            'level' => 'admin', // Set the user level to 'admin'
        ]);
    }
}
