<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAngsuranPembiayaanDanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angsuran_pembiayaan_dana', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->bigInteger('motor_pembiayaan_dana_id');
            // $table->bigInteger('wilayah_pembiayaan_dana_id');
            // $table->integer('tahun');
            // $table->bigInteger('status_stnk_id');
            // $table->bigInteger('status_bpkb_id');
            $table->bigInteger('pencairan');
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
        Schema::dropIfExists('angsuran_pembiayaan_dana');
    }
}
