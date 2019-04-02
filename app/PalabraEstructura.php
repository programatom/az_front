<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PalabraEstructura extends Model
{

  protected $fillable = [
    "caracter",
    "genero",
    "numero",
    "persona",
    "tiempo",
    "modo",
    "posicion",
    'frase_id',
    "fijo",

  ];
  protected $attributes = [
    "genero"=> "",
    "numero"=> "",
    "persona"=> "",
    "tiempo"=> "",
    "modo"=> "",
    "fijo"=> "",
  ];
}
