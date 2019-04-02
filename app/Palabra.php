<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Palabra extends Model
{
  protected $fillable =
  [
    'palabra',
    'infinitivo',
    'caracter',
    'genero',
    'numero',
    'persona',
    'tiempo',
    'modo',
    'count',
    'uses',
    'is_regular',

  ];

  protected $attributes = [
    'palabra'=> "",
    'infinitivo'=> "",
    'caracter'=> "",
    'genero'=> "",
    'numero'=> "",
    'persona'=> "",
    'tiempo'=> "",
    'modo'=> "",
    'count'=> 0,
    'uses'=> 0,
    'is_regular' => 0
];
}
