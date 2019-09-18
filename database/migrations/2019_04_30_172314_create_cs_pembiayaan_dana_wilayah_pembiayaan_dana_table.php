<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCsPembiayaanDanaWilayahPembiayaanDanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cs_pembiayaan_dana_wilayah_pembiayaan_dana', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cs_pembiayaan_dana_id');
            $table->integer('wilayah_pembiayaan_dana_id');
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
        Schema::dropIfExists('cs_pembiayaan_dana_wilayah_pembiayaan_dana');
    }
}
