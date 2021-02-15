<?php

use App\JenisProduk;
use App\Pipeline;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PipelinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $users = User::all()->pluck('id')->toArray();
        $jenis = JenisProduk::all()->pluck('id')->toArray();
        Pipeline::truncate();
        for ($i=0; $i <30 ; $i++) { 
            \App\Pipeline::create([
                'ao_id'	=> $faker->randomElement($users),
                'jenis_produk_id'	=> $faker->randomElement($jenis),
                'no_registrasi'	=> $faker->randomDigit,
                'nm_target'	    => $faker->name,
                'alamat'  => $faker->name,
                'kota'  => $faker->city,
                'no_hp'  => $faker->randomDigit,
                'kategori'  => $faker->randomElement(['new','old']),
                'target_penambahan_dana'  => $faker->randomDigit,
                'alat_promosi'  => $faker->name,
                'total_target'  => $faker->randomDigit,
                'periode_target'  => $faker->randomElement(['bulanan','triwulan']),
                'status_usulan'  => '0',
                'status_realisasi'   => $faker->randomElement(['target','pipeline','ditolak','berhasil','tidak_berhasil','verified','verification_failed']),
            ]);
        }

        Pipeline::where('status_realisasi','verified')->update([
            'status_final'  =>  '1',
        ]);

        Pipeline::where('status_realisasi','verification_failed')->update([
            'status_final'  =>  '0',
        ]);
    }
}
