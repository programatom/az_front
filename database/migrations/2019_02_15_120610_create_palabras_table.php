<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePalabrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palabras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('palabra');
            $table->string('infinitivo');

            $table->string('caracter');
            $table->string('genero');
            $table->string('numero');
            $table->string('persona');
            $table->string('tiempo');
            $table->string('modo');
            
            $table->integer('count');
            $table->integer('uses');
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
        Schema::dropIfExists('palabras');
    }
}
