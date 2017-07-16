<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ParkirsSeeder::class);
        $this->call(PerawatansSeeder::class);
        $this->call(BanksSeeder::class);
        $this->call(DendasSeeder::class);
    }
}
