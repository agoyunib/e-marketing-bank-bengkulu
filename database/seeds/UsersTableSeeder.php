<?php

use App\Unit;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $units = Unit::all()->pluck('id')->toArray();
        for ($i=0; $i <2 ; $i++) { 
            \App\User::create([
                'nm_user'	=> $faker->name,
                'no_nrpp'	=> $faker->randomDigit,
                'no_hp'	    => $faker->randomDigit,
                'unit_id'  => $faker->randomElement($units),
                'email'	=> Str::random(10) . '@mail.com',
                'password'	=> bcrypt('secret'),
                'jabatan'   => $faker->randomElement(['ao','supervisi','pimpinan','administrator']),
            ]);
        }
    }
}
