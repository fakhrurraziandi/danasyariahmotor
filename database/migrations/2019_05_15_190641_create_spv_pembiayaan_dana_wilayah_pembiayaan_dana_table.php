<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpvPembiayaanDanaWilayahPembiayaanDanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spv_pembiayaan_dana_wilayah_pembiayaan_dana', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('spv_pembiayaan_dana_id');
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
        Schema::dropIfExists('spv_pembiayaan_dana_wilayah_pembiayaan_dana');
    }
}
