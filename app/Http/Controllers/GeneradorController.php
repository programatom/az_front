<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Frase;
use App\FraseEstructura;
use App\Constant;
use App\Palabra;

use App\Http\Controllers\GeneradorController;

class GeneradorController extends Controller
{

    public function buscarFraseYElegirRandom(){


      $frases = FraseEstructura::all();
      $frases_length = count($frases);
      $numero_random = rand(0 , $frases_length - 1);
      $frase = $frases[$numero_random];



      $palabras_frase = $frase->palabras;
      $conectores_frase = $frase->conectores;




      $restriccionesVerbos = $this->conjugationLogic($palabras_frase);

      $array_palabras_final = array();
      $palabrasAEnviar = array();

      foreach ($palabras_frase as $palabra) {
        $caracter = $palabra->caracter;
        if($caracter == "palabra_fija" ){
          $palabra_fija = $palabra->fijo;
          $posicion = $palabra->posicion;
          $obj_palabra_fija = new \stdClass();
          $obj_palabra_fija->posicion = $posicion;
          $obj_palabra_fija->palabra = $palabra_fija;
          $array_palabras_final[] = $obj_palabra_fija;
        }else{
          $palabrasAEnviar[] = $palabra;
        }
      }


      $posiciones_palabras = $this->showRestricted($palabrasAEnviar);

      // LOGICA PALABRAS

      foreach($posiciones_palabras as $posicion_palabras){
        $palabras = $posicion_palabras->palabras;
        if(count($palabras) == 0){
          return;
        }
        $posicion = $posicion_palabras->posicion;
        $palabras_length = count($palabras);
        $numero_random = rand(0 , $palabras_length - 1);
        $palabra_random_full = $palabras[$numero_random];
        $palabra_random = $palabra_random_full->palabra;
        $caracter = $palabra_random_full->caracter;

        if($caracter == "verbo"){
          if($restriccionesVerbos->$posicion->tiempo!= "infinitivo"){
            $restricciones = $restriccionesVerbos->$posicion;
            $infinitivo = $palabra_random_full->infinitivo;
            $restricciones->infinitivo = $infinitivo;
            $palabra_conjugada = $this->conjugador($restricciones);
            if($palabra_conjugada == false){

              // FILTRO PALABRA QUE NO TERMINAN EN R Y EL CÓDIGO LAS INTERPRETÓ COMO VERBOS
              return response()->json([
                "data"=>"VERBO INCORRECTO"
              ],200);
            }
            $obj = new \StdClass();
            $obj->posicion = $posicion;
            $obj->palabra = $palabra_conjugada;
            $array_palabras_final[] = $obj;
          }else{
            $obj = new \StdClass();
            $obj->posicion = $posicion;
            $obj->palabra = $palabra_random_full->infinitivo;
            $array_palabras_final[] = $obj;
          }
        }else{
          $obj = new \StdClass();
          $obj->posicion = $posicion;
          $obj->palabra = $palabra_random;;
          $array_palabras_final[] = $obj;
        }
      }



      // LOGICA CONECTORES
      if(count($conectores_frase) != 0){
        $conectores = $this->conectorRedirection($conectores_frase);
        if($conectores == false){
          // FILTRO SI NO SE ENCUENTRA UN CONECTOR POR ALGÚNA EVENTUALIDAD
          return response()->json([
            "data"=>"NO SE ENCONTRÓ ARTICULO",
            "conectores" => $conectores,
            "frase" => $frase
          ],200);
        }
      }else{
        $conectores = array();
      }


      $array_palabras_conectores_final = array_merge($conectores, $array_palabras_final);
      $frase_final = "";

      $i = 0;
      foreach($array_palabras_conectores_final as $elemento){
        $i = $i + 1;
        foreach($array_palabras_conectores_final as $elemento){
          if($elemento->posicion == $i){
            $frase_final = $frase_final.$elemento->palabra." ";
          }
        }
      }

      Frase::create([
        "frase" => $frase_final,
        "frase_id" => $frase->id
      ]);

      return response()->json([
        "data" => $frase_final,
        "frase_id" => $frase->id
      ]);

    }

    public function conjugationLogic($palabras_frase){
      $restriccionesVerbos = new \stdClass();
      foreach($palabras_frase as $palabra){
        $caracter = $palabra->caracter;
        if($caracter == "verbo"){
          $tiempo = $palabra->tiempo;
          if($tiempo != "infinitivo"){
            $palabra->is_regular = 1;
            $restriccionesVerbos = $this->guardarRestriccionesYReinicializarPalabra($palabra, $restriccionesVerbos);
          }else{
            $restriccionesVerbos = $this->guardarRestriccionesYReinicializarPalabra($palabra, $restriccionesVerbos);
          }
        }
      }

      return $restriccionesVerbos;
    }

    public function guardarRestriccionesYReinicializarPalabra($palabra, $restriccionesVerbos){
      $key_posicion = $palabra->posicion;
      $restriccionesVerbos->$key_posicion = new \stdClass();
      $restriccionesVerbos->$key_posicion->tiempo = $palabra->tiempo;
      $restriccionesVerbos->$key_posicion->persona = $palabra->persona;
      $restriccionesVerbos->$key_posicion->numero = $palabra->numero;
      $palabra->tiempo = "";
      $palabra->persona = "";
      $palabra->numero = "";
      return $restriccionesVerbos;
    }

    public function showRestricted($palabras){

        // Genero un array de obj posicion y posibilidadess
        $respuesta = array();


        foreach ($palabras as $palabra){
          $restricciones = (object) $palabra;

          $posicion = $restricciones["posicion"];
          // FILTRO : SACO POSICION Y TODOS LOS CAMPOS QUE SEAN NULL
          unset($restricciones["posicion"]);

          $array = array("caracter" => $restricciones["caracter"],
          "genero" => $restricciones["genero"],
          "numero" => $restricciones["numero"],
          "persona" => $restricciones["persona"],
          "tiempo" => $restricciones["tiempo"],
          "modo" => $restricciones["modo"]
        );
        foreach($array as $array_element=>$value){
          if($value == null || $value == ""){
            unset($array[$array_element]);
          }
        }

          $palabras_elegidas = Palabra::where($array)->get();

          $obj = new \stdClass();

          $obj->posicion = $posicion;
          $obj->palabras = $palabras_elegidas;
          $respuesta[] = $obj;
        }



      return $respuesta;

    }

    public function conjugador($palabra){
      $infinitivo = $palabra->infinitivo;
      $infinitivo_length = count($infinitivo);
      $R = substr($infinitivo, -1);
      if($R != "r"){
        return false;
      }
      $tipo = substr($infinitivo, -2);

      $tiempo = $palabra->tiempo;
      $tiempo_remplazado = str_replace(" ", "_", $tiempo);

      $persona = $palabra->persona;
      $numero = $palabra->numero;

      $constant = new Constant();
      $conjugacion_const = $constant->conjugacion_const();

      $indicador1= $tiempo_remplazado."_".$tipo;
      $objTiempo = $conjugacion_const->$indicador1;
      $indicador2 = $numero."_".$persona;
      $terminacion = $objTiempo->$indicador2;

      $infinitivo_puro = substr($palabra->infinitivo, 0, -2);

      return $infinitivo_puro.$terminacion;

    }

    public function conectorRedirection($conectores_frase){

      $conectores_resultantes = array();

      foreach($conectores_frase as $conector){
        $caracter = $conector->caracter;
        $constant = new Constant();

        if($caracter == "articulo"){
          $articulo = $this->elegir_conector($conector, $constant->articulos_const());
          if($articulo == false){
            return false;
          }
          $conectores_resultantes[] = $articulo;
        }
        if($caracter == "conjuncion"){
          $conjuncion = $this->elegir_conector($conector, $constant->conjunciones_const());
          if($conjuncion == false){
            return false;
          }
          $conectores_resultantes[] = $conjuncion;
        }
        if($caracter == "preposicion"){
          $preposicion = $this->elegir_conector($conector, Constant::PREPOSICIONES);
          if($preposicion == false){
            return false;
          }
          $conectores_resultantes[] = $preposicion;
        }
        if($caracter == "pronombre"){
          $pronombres = $this->elegir_conector($conector, $constant->pronombres_const());
          if($pronombres == false){
            return false;
          }
          $conectores_resultantes[] = $pronombres;
        }
      }

      return $conectores_resultantes;
    }

    public function elegir_conector($conector, $super_array){

      $conector = $conector;

      $restringir = true;
      if($restringir){
        $conector_keys = get_object_vars($conector);
        $filtro_keys_valores_nulos = array_filter($conector_keys , function($key) use ($conector){
          if($key != "posicion" && $conector->$key != ""){
            return $key;
          }
        });

        $elementos_validos = array();
        foreach($super_array as $elemento_super){
          $elemento_invalido = false;
          foreach($filtro_keys_valores_nulos as $restriccion_key){
            $restriccion = $conector->$restriccion_key;
            $comparador = $elemento_super->$restriccion_key;
            if ($comparador != $restriccion && $comparador != undefined) {
              return response()->json([
                "superArray" => $comparador,
                "restriccion" =>$restriccion
              ],200);

              $elemento_invalido = true;
            }
          }
          if($elemento_invalido == false){
            $elementos_validos[] = $elemento_super;
          }
        }

        if(count($elementos_validos) == 0){
          return false;
        }

        $numero_random = rand(0, count($elementos_validos) - 1);
        $elemento_valido_random = $elementos_validos[$numero_random];
        $caracter = $conector->caracter;

        $obj = new \StdClass();
        $obj->posicion = $conector->posicion;
        $obj->palabra = $elemento_valido_random->$caracter;
        return $obj;
      }else{
        $numero_random = rand(0,count($super_array)-1);
        $super_array_random = $super_array[$numero_random];
        return $super_array_random;
      }
    }




}
