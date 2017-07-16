<?php

use Illuminate\Database\Seeder;
use App\Denda;

class DendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $denda = Denda::create(['harga'=>'5000']);
    }
}
