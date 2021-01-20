<?php

use App\SubProduk;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JenisProduksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $subproduks = SubProduk::all()->pluck('id')->toArray();
        for ($i=0; $i <10 ; $i++) { 
            \App\JenisProduk::create([
                'sub_produk_id' =>  $faker->randomElement($subproduks),
                'nm_jenis_produk'	=>$faker->name,
            ]);
        }
    }
}
