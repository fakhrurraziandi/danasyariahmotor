<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentVariableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_variable', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key');
            $table->text('value_text')->nullable();
            $table->text('value_html')->nullable();
            $table->enum('type', ['text', 'html'])->default('text');
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
        Schema::dropIfExists('content_variable');
    }
}
