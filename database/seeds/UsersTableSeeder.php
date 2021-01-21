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
        for ($i=0; $i <30 ; $i++) { 
            \App\User::create([
                'nm_user'	=> $faker->name,
                'no_nrpp'	=> $faker->randomDigit,
                'no_hp'	    => $faker->randomDigit,
                'unit_id'  => $faker->randomElement($units),
                'email'	=> $faker->randomDigit. '@mail.com',
                'password'	=> bcrypt('secret'),
                'role'   => $faker->randomElement(['ao','supervisi','pimpinan','administrator']),
            ]);
        }
    }
}
