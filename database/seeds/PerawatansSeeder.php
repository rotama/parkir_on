<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Perawatan;

class PerawatansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kendaraan1 = Perawatan::create(['harga'=>'10000','servis'=>'Cuci 1X sehari, Tune Up 1x sehari']);
    }
}
