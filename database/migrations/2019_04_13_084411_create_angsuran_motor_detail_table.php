<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAngsuranMotorDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angsuran_motor_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('angsuran_motor_id');
            $table->bigInteger('tempo_angsuran_motor_id');
            $table->bigInteger('angsuran_per_bulan');
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
        Schema::dropIfExists('angsuran_motor_detail');
    }
}
