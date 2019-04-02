<?php

namespace App;

class Constant {

  const PREPOSICIONES = array(
    "a","ante","bajo","con","contra","de","desde",
    "durante","en","entre","hacia","hasta","para",
    "por","segun","sin","sobre","tras","durante"
  );


  public function conjugacion_const(){

   return (object) array(
  "presente_ar" => (object) array(
    "singular_1"=> "o",
    "singular_3"=> "a",
    "plural_1"=> "amos",
    "plural_3"=> "an",
  ),

  "preterito_imperfecto_ar" => (object) array(
    "singular_1"=> "aba",
    "singular_3"=> "aba",
    "plural_1"=> "ábamos",
    "plural_3"=> "aban",
  ),

  "preterito_perfecto_ar" => (object) array(
    "singular_1"=> "é",
    "singular_3"=> "ó",
    "plural_1"=> "amos",
    "plural_3"=> "aron",
  ),

  "futuro_ar" => (object) array(
    "singular_1"=> "aré",
    "singular_3"=> "ará",
    "plural_1"=> "aremos",
    "plural_3"=> "arán",
  ),




  "presente_er" => (object) array(
    "singular_1"=> "o",
    "singular_3"=> "e",
    "plural_1"=> "emos",
    "plural_3"=> "en",
  ),

  "preterito_imperfecto_er" => (object) array(
    "singular_1"=> "ía",
    "singular_3"=> "ía",
    "plural_1"=> "íamos",
    "plural_3"=> "ían",
  ),

  "preterito_perfecto_er" => (object) array(
    "singular_1"=> "í",
    "singular_3"=> "ió",
    "plural_1"=> "imos",
    "plural_3"=> "ieron",
  ),

  "futuro_er" => (object) array(
    "singular_1"=> "eré",
    "singular_3"=> "erá",
    "plural_1"=> "eremos",
    "plural_3"=> "erán",
  ),



  "presente_ir" => (object) array(
    "singular_1"=> "o",
    "singular_3"=> "e",
    "plural_1"=> "imos",
    "plural_3"=> "en",
  ),

  "preterito_imperfecto_ir" => (object) array(
    "singular_1"=> "ía",
    "singular_3"=> "ía",
    "plural_1"=> "íamos",
    "plural_3"=> "ían",
  ),

  "preterito_perfecto_ir" => (object) array(
    "singular_1"=> "í",
    "singular_3"=> "ió",
    "plural_1"=> "imos",
    "plural_3"=> "ieron",
  ),

  "futuro_ir" => (object) array(
    "singular_1"=> "iré",
    "singular_3"=> "irá",
    "plural_1"=> "iremos",
    "plural_3"=> "irán",
  ),

);
}

public function articulos_const(){

  return array(
  (object) array (
    "articulo"=>"el",
    "numero"=>"singular",
    "genero"=>"masculino",
    "tipo"=>"determinado",
  ),
  (object)array(
    "articulo"=>"los",
    "numero"=>"plural",
    "genero"=>"masculino",
    "tipo"=>"determinado",
  ),
  (object)array(
    "articulo"=>"la",
    "numero"=>"singular",
    "genero"=>"femenino",
    "tipo"=>"determinado",
  ),
  (object)array(
    "articulo"=>"las",
    "numero"=>"plural",
    "genero"=>"femenino",
    "tipo"=>"determinado",
  ),
  (object)array(
    "articulo"=>"una",
    "numero"=>"singular",
    "genero"=>"femenino",
    "tipo"=>"indeterminado",
  ),
  (object)array(
    "articulo"=>"unas",
    "numero"=>"plural",
    "genero"=>"femenino",
    "tipo"=>"indeterminado",
  ),
  (object)array(
    "articulo"=>"uno",
    "numero"=>"singular",
    "genero"=>"masculino",
    "tipo"=>"indeterminado",
  ),
  (object)array(
    "articulo"=>"unos",
    "numero"=>"plural",
    "genero"=>"masculino",
    "tipo"=>"indeterminado",
  )
);
}

public function pronombres_const(){
  return array((object) array(
    "pronombre" => "yo",
    "tipo" => "personal tonico",
    "numero" => "singular",
    "genero" => "indefinido",
    "persona" => "1",
  ),
  (object) array(
    "pronombre" => "tú",
    "tipo" => "personal tonico",
    "numero" => "singular",
    "genero" => "indefinido",
    "persona" => "2",
  ),
  (object) array(
    "pronombre" => "vos",
    "tipo" => "personal tonico",
    "numero" => "singular",
    "genero" => "indefinido",
    "persona" => "2",
  ),
  (object) array(
    "pronombre" => "él",
    "tipo" => "personal tonico",
    "numero" => "singular",
    "genero" => "masculino",
    "persona" => "3",
  ),
  (object) array(
    "pronombre" => "ella",
    "tipo" => "personal tonico",
    "numero" => "singular",
    "genero" => "femenino",
    "persona" => "3",
  ),
  (object) array(
    "pronombre" => "nosotros",
    "tipo" => "personal tonico",
    "numero" => "plural",
    "genero" => "indefinido",
    "persona" => "1",
  ),
  (object) array(
    "pronombre" => "ustedes",
    "tipo" => "personal tonico",
    "numero" => "plural",
    "genero" => "indefinido",
    "persona" => "2",
  ),
  (object) array(
    "pronombre" => "ellos",
    "tipo" => "personal tonico",
    "numero" => "plural",
    "genero" => "masculino",
    "persona" => "3",
  ),
  (object) array(
    "pronombre" => "ellas",
    "tipo" => "personal tonico",
    "numero" => "plural",
    "genero" => "femenino",
    "persona" => "3",
  ),
  (object) array(
    "pronombre" => "me",
    "tipo" => "personal atonico",
    "numero" => "singular",
    "genero" => "indefinido",
    "persona" => "1",
  ),
  (object) array(
    "pronombre" => "te",
    "tipo" => "personal atonico",
    "numero" => "singular",
    "genero" => "indefinido",
    "persona" => "2",
  ),
  (object) array(
    "pronombre" => "se",
    "tipo" => "personal atonico",
    "numero" => "singular",
    "genero" => "indefinido",
    "persona" => "3",
  ),
  (object) array(
    "pronombre" => "uno",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "alguno",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "ninguno",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "poco",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "escaso",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "mucho",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "demasiado",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "todo",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "otro",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "mismo",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "tanto",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "una",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "alguna",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "ninguna",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "poca",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "escasa",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "mucha",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "demasiada",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "toda",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "otra",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "misma",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "tanta",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "algo",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "indefinido",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "nada",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "indefinido",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "poco",
    "tipo" => "indeterminado",
    "numero" => "singular",
    "genero" => "indefinido",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "unas",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "algunas",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "ningunas",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "pocas",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "escasas",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "muchas",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "demasiadas",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "todas",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "otras",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "mismas",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "tantas",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "femenino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "unos",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "algunos",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "ningunos",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "pocos",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "escasos",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "muchos",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "demasiados",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "todos",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "otros",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "mismos",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "masculino",
    "persona" => "0",
  ),
  (object) array(
    "pronombre" => "tantos",
    "tipo" => "indeterminado",
    "numero" => "plural",
    "genero" => "masculino",
    "persona" => "0",
  ),);
}

public function conjunciones_const(){
  return array(
    (object) array (
  "conjuncion"=>"y",
  "tipo"=>"copulativa"
),
(object) array (
  "conjuncion"=>"e",
  "tipo"=>"copulativa"
),
(object) array (
  "conjuncion"=>"ni",
  "tipo"=>"copulativa"
),
(object) array (
  "conjuncion"=>"pero",
  "tipo"=>"adversativa"
),
(object) array (
  "conjuncion"=>"o",
  "tipo"=>"disyuntiva"
),
  );
}




}
