<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpvKreditMotorWilayahKreditMotorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spv_kredit_motor_wilayah_kredit_motor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('spv_kredit_motor_id');
            $table->integer('wilayah_kredit_motor_id');
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
        Schema::dropIfExists('spv_kredit_motor_wilayah_kredit_motor');
    }
}
