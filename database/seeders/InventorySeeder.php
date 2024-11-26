<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventory;
use Carbon\Carbon;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inventory::create([
            'medicine_name' => 'Paracetamol',
            'quantity' => 100,
            'expiry_date' => Carbon::now()->addMonths(6),
        ]);

        Inventory::create([
            'medicine_name' => 'Ibuprofen',
            'quantity' => 50,
            'expiry_date' => Carbon::now()->addYear(),
        ]);

        Inventory::create([
            'medicine_name' => 'Amoxicillin',
            'quantity' => 75,
            'expiry_date' => Carbon::now()->addMonths(9),
        ]);

        Inventory::create([
            'medicine_name' => 'Vitamin C',
            'quantity' => 200,
            'expiry_date' => Carbon::now()->addMonths(12),
        ]);

        Inventory::create([
            'medicine_name' => 'Cough Syrup',
            'quantity' => 30,
            'expiry_date' => Carbon::now()->addMonths(4),
        ]);
    }
}
