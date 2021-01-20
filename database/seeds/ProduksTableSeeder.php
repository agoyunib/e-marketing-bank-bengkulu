<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProduksTableSeeder extends Seeder
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
            \App\Produk::create([
                'nm_produk'	=> $faker->name,
            ]);
        }
    }
}
