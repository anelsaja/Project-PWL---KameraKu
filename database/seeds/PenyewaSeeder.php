<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PenyewaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 10; $i++)
        {
            DB::table('penyewas')->insert([
                'nama_lengkap' => $faker->name,
                'no_identitas' => $faker->numerify('3###############'), 
                'no_hp'        => $faker->phoneNumber,
                'alamat'       => $faker->address,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }
}
