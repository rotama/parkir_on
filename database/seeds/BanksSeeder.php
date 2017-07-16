<?php

use Illuminate\Database\Seeder;
use App\Bank;

class BanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $bank1 = Bank::create(['no_rek'=>'3247094843','atas_nama'=>'Parkir Online','nm_bank'=>'BCA']);
        $bank2 = Bank::create(['no_rek'=>'3857594937','atas_nama'=>'Parkir Online','nm_bank'=>'BRI']);
        $bank3 = Bank::create(['no_rek'=>'9585749404','atas_nama'=>'Parkir Online','nm_bank'=>'Danamon']);
        $bank4 = Bank::create(['no_rek'=>'9474834950','atas_nama'=>'Parkir Online','nm_bank'=>'Mandiri']);
        $bank5 = Bank::create(['no_rek'=>'9048473948','atas_nama'=>'Parkir Online','nm_bank'=>'Bank BJB']);
    }
}
