<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i <2 ; $i++) { 
            \App\Unit::create([
                'nm_unit'	=> $faker->name,
                'alamat'	=> $faker->address,
                'kota'	    => $faker->city,
                'kategori'  => $faker->randomElement(['cabang','capem']),
            ]);
        }
    }
}
