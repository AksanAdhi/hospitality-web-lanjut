<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'dr_andini',
                'name' => 'Dr. Andini Kartika, Sp.A',
                'email' => 'andini.kartika@example.com',
                'password' => Hash::make('password123'),
                'profilePicture' => null,
                'level' => 'admin',
            ],
            [
                'username' => 'dr_ferdi',
                'name' => 'Dr. Ferdi Anwar, Sp.B',
                'email' => 'ferdi.anwar@example.com',
                'password' => Hash::make('password123'),
                'profilePicture' => null,
                'level' => 'user',
            ],
            [
                'username' => 'dr_putri',
                'name' => 'Dr. Putri Handayani, Sp.PD',
                'email' => 'putri.handayani@example.com',
                'password' => Hash::make('password123'),
                'profilePicture' => null,
                'level' => 'user',
            ],
            [
                'username' => 'dr_bayu',
                'name' => 'Dr. Bayu Pratama, Sp.OG',
                'email' => 'bayu.pratama@example.com',
                'password' => Hash::make('password123'),
                'profilePicture' => null,
                'level' => 'user',
            ],
            [
                'username' => 'dr_nurul',
                'name' => 'Dr. Nurul Aisyah, Sp.KK',
                'email' => 'nurul.aisyah@example.com',
                'password' => Hash::make('password123'),
                'profilePicture' => null,
                'level' => 'user',
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
