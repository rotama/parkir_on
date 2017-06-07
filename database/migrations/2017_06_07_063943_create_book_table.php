<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('tgl_booking');
            $table->integer('parkir_id')->unsigned()->index();
            $table->foreign('parkir_id')->references('id')->on('parkirs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('denda_id')->unsigned()->index();
            $table->foreign('denda_id')->references('id')->on('dendas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('perawatan_id')->unsigned()->index();
            $table->foreign('perawatan_id')->references('id')->on('perawatans')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->dateTime('tgl_keluar');
            $table->string('status')->length(10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
