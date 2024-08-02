<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;
use App\Models\Unit;
use App\Models\Jabatan;
use Faker\Factory as Faker;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Create sample units and jabatans
        $unit = Unit::create(['name' => 'Unit A']);
        $jabatan = Jabatan::create(['name' => 'Staff']);

        foreach (range(1, 10) as $index) {
            Karyawan::create([
                'nama' => $faker->name,
                'username' => $faker->unique()->userName,
                'password' => bcrypt('password'), // Set a default password for all users
                'unit_id' => $unit->id,
                'jabatan_id' => $jabatan->id,
                'tanggal_bergabung' => $faker->date,
            ]);
        }
    }
}
