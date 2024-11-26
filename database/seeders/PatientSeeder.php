<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;
use Faker\Factory as Faker;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Create 10 dummy patients
        foreach (range(1, 10) as $index) {
            Patient::create([
                'nama' => $faker->name,
                'nik' => $faker->unique()->numerify('###########'), // Generate a unique NIK
                'tanggal_lahir' => $faker->date(),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'alamat' => $faker->address,
                'telepon' => $faker->phoneNumber,
                'riwayat_penyakit' => $faker->optional()->sentence, // Optional field
            ]);
        }
    }
}
