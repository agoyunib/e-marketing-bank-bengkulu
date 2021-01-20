<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AlatPromosisTableSeeder extends Seeder
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
            \App\AlatPromosi::create([
                'nm_alat_promosi'	=> $faker->name,
                'status_alat_promosi'	=> '1',
            ]);
        }
    }
}
