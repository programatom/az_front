<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePalabraEstructurasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palabra_estructuras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('frase_id');
            $table->string('caracter');
            $table->string('genero');
            $table->string('numero');
            $table->string('persona');
            $table->string('tiempo');
            $table->string('modo');
            $table->integer('posicion');
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
        Schema::dropIfExists('palabra_estructuras');
    }
}
