<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Kameraseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $types = ['Mirrorless', 'DSLR', 'Lensa', 'Aksesoris'];
        for($i=1;$i<=50;$i++)
        {
            DB::table('kamera')->insert([
            'nama' => $faker->words(3,true),
            'brand' => $faker->word(),
            'type' => $faker->randomElement($types),
            'deskripsi' => $faker->text(),
            'harga' => $faker->numberBetween(10, 50) * 1000,
            'stock' => $faker->numberBetween(1, 10),
        ]);
        }
    }
}
