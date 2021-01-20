<?php

use App\Produk;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SubProduksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $produks = Produk::all()->pluck('id')->toArray();
        for ($i=0; $i <5 ; $i++) { 
            \App\SubProduk::create([
                'produk_id' =>  $faker->randomElement($produks),
                'nm_sub_produk'	=> $faker->name,
            ]);
        }
    }
}
