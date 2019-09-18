<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuanKreditMotorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_kredit_motor', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('wilayah_kredit_motor_id');

            $table->bigInteger('angsuran_motor_id');
            $table->bigInteger('angsuran_motor_detail_id');

            $table->bigInteger('cs_kredit_motor_id')->unsigned()->nullable();
            $table->enum('cs_kredit_motor_status', ['approved', 'denied'])->nullable();
            $table->text('cs_kredit_motor_note')->nullable();

            $table->bigInteger('spv_kredit_motor_id')->unsigned()->nullable();
            $table->enum('spv_kredit_motor_status', ['approved', 'denied'])->nullable();
            
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
        Schema::dropIfExists('pengajuan_kredit_motor');
    }
}
