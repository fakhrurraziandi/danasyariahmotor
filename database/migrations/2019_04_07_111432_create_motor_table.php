<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motor', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name');
            $table->string('slug');
            
            $table->bigInteger('pabrikan_motor_id')->unsigned();
            $table->foreign('pabrikan_motor_id')->references('id')->on('pabrikan_motor')->onDelete('cascade');
            
            $table->bigInteger('type_motor_id')->unsigned();
            $table->foreign('type_motor_id')->references('id')->on('type_motor')->onDelete('cascade');

            $table->bigInteger('jenis_transmisi_id')->unsigned();
            $table->foreign('jenis_transmisi_id')->references('id')->on('jenis_transmisi')->onDelete('cascade');

            $table->bigInteger('jenis_pembakaran_id')->nullable();
            // $table->foreign('jenis_pembakaran_id'); // ->references('id')->on('jenis_pembakaran')->onDelete('cascade');

            $table->bigInteger('kapasitas_mesin_id')->unsigned();
            $table->foreign('kapasitas_mesin_id')->references('id')->on('kapasitas_mesin')->onDelete('cascade');

            $table->text('fitur')->nullable();

            $table->integer('tahun');
            $table->bigInteger('harga')->nullable();

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
        Schema::dropIfExists('motor');
    }
}
