<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PalabraEstructura;
use App\ConectorEstructura;

class FraseEstructura extends Model
{

    public function palabras()
  {
    return $this->hasMany(PalabraEstructura::class, "frase_id");
  }

    public function conectores()
  {
    return $this->hasMany(ConectorEstructura::class, "frase_id");
  }

}
