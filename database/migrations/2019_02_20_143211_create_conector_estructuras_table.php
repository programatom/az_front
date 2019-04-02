<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConectorEstructurasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conector_estructuras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('frase_id');
            $table->string('caracter');
            $table->string('genero');
            $table->string('numero');
            $table->string('persona');
            $table->string('tipo');
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
        Schema::dropIfExists('conector_estructuras');
    }
}
