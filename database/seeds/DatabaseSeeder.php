<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProduksTableSeeder::class);
        $this->call(SubProduksTableSeeder::class);
        $this->call(JenisProduksTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AlatPromosisTableSeeder::class);
    }
}
