<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Login;
use App\Models\Karyawan;
use Faker\Factory as Faker;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Ambil semua karyawan
        $karyawans = Karyawan::all();

        foreach (range(1, 200) as $index) {
            Login::create([
                'user_id' => $faker->randomElement($karyawans)->id,
                'login_time' => $faker->dateTimeThisYear
            ]);
        }
    }
}
