<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConectorEstructura extends Model
{
  protected $fillable =
  [
    'caracter',
    'genero',
    'numero',
    'persona',
    'tipo',
    'posicion',
    'frase_id',

  ];

  protected $attributes = [
    'caracter'=> "",
    'genero'=> "",
    'numero'=> "",
    'persona'=> "",
    'tipo'=> "",
    'posicion'=> "",
  ];
}
