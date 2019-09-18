<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuanPembiayaanDanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_pembiayaan_dana', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // $table->integer('plafond_pembiayaan');

            $table->integer('wilayah_pembiayaan_dana_id');
            $table->integer('tempo_angsuran_pembiayaan_dana_id');
            $table->integer('motor_pembiayaan_dana_id');
            $table->integer('status_stnk_id');
            $table->integer('status_bpkb_id');
            $table->integer('status_rumah_id');
            $table->integer('tahun_motor');

            $table->bigInteger('cs_pembiayaan_dana_id')->unsigned()->nullable();
            $table->enum('cs_pembiayaan_dana_status', ['approved', 'denied'])->nullable();
            $table->text('cs_pembiayaan_dana_note')->nullable();

            $table->bigInteger('spv_pembiayaan_dana_id')->unsigned()->nullable();
            $table->enum('spv_pembiayaan_dana_status', ['approved', 'denied'])->nullable();

            $table->bigInteger('manager_pembiayaan_dana_id')->unsigned()->nullable();

            $table->integer('max_plafond_pembiayaan_disetujui')->nullable();
            $table->integer('plafond_pembiayaan_disetujui')->nullable();
            $table->integer('tempo_angsuran_pembiayaan_dana_id_disetujui')->nullable();
            $table->integer('angsuran')->nullable();

            $table->string('image_ktp')->nullable();
            $table->string('image_kk')->nullable();
            $table->string('image_stnk')->nullable();
            $table->string('image_bpkb')->nullable();

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
        Schema::dropIfExists('pengajuan_pembiayaan_dana');
    }
}
