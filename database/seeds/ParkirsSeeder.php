<?php

use Illuminate\Database\Seeder;
use App\Parkir;

class ParkirsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kendaraan1 = Parkir::create(['slot'=>'R01','harga'=>'10000','posisi'=>'Lantai 1','status'=>'Available']);
        $kendaraan2 = Parkir::create(['slot'=>'R02','harga'=>'10000','posisi'=>'Lantai 1','status'=>'Available']);
        $kendaraan3 = Parkir::create(['slot'=>'R03','harga'=>'10000','posisi'=>'Lantai 1','status'=>'Available']);
        $kendaraan4 = Parkir::create(['slot'=>'R04','harga'=>'15000','posisi'=>'Lantai 2','status'=>'Available']);
        $kendaraan5 = Parkir::create(['slot'=>'R05','harga'=>'15000','posisi'=>'Lantai 2','status'=>'Available']);
        $kendaraan6 = Parkir::create(['slot'=>'R06','harga'=>'15000','posisi'=>'Lantai 2','status'=>'Available']);
        $kendaraan7 = Parkir::create(['slot'=>'R07','harga'=>'20000','posisi'=>'Lantai 3','status'=>'Available']);
        $kendaraan8 = Parkir::create(['slot'=>'R08','harga'=>'20000','posisi'=>'Lantai 3','status'=>'Available']);
        $kendaraan9 = Parkir::create(['slot'=>'R09','harga'=>'20000','posisi'=>'Lantai 3','status'=>'Available']);
        $kendaraan10 = Parkir::create(['slot'=>'R10','harga'=>'20000','posisi'=>'Lantai 3','status'=>'Available']);
    }
}
