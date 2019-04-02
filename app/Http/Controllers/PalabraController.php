<?php

namespace App\Http\Controllers;

use App\Palabra;
use Illuminate\Http\Request;

class PalabraController extends Controller
{

  private $verbosIrregulares =
  [
  "abrir",
  "absolver",
  "abstenerse",
  "abstraer",
  "acertar",
  "acontecer",
  "acordar",
  "acordarse",
  "acostar",
  "acostarse",
  "adherir",
  "adormecer",
  "adquirir",
  "aducir",
  "advertir",
  "agorar",
  "agradecer",
  "alentar",
  "almorzar",
  "amanecer",
  "amoblar",
  "andar",
  "anochecer",
  "apacentar",
  "aparecer",
  "apetecer",
  "apostar",
  "apretar",
  "aprobar",
  "arrendar",
  "arrepentirse",
  "ascender",
  "asentir",
  "asir",
  "atardecer",
  "atender",
  "atenerse",
  "atraer",
  "atravesar",
  "avenirse",
  "avergonzar",
  "avergonzarse",
  "balbucir",
  "bendecir",
  "caber",
  "caer",
  "caerse",
  "calentar",
  "calentarse",
  "carecer",
  "cegar",
  "ceñir",
  "cocer",
  "colar",
  "colarse",
  "colegir",
  "colgar",
  "comenzar",
  "compadecer",
  "comparecer",
  "competir",
  "complacer",
  "componer",
  "comprobar",
  "concebir",
  "concernir",
  "concertar",
  "concordar",
  "conducir",
  "conferir",
  "confesar",
  "conmover",
  "conocer",
  "conseguir",
  "consentir",
  "consolar",
  "constreñir",
  "contar",
  "contener",
  "contradecir",
  "contraer",
  "contravenir",
  "convenir",
  "convertir",
  "convertirse",
  "corregir",
  "costar",
  "crecer",
  "dar",
  "darse",
  "decir",
  "deducir",
  "defender",
  "degollar",
  "demoler",
  "demostrar",
  "denegar",
  "deponer",
  "derivar",
  "derretir",
  "derretirse",
  "desandar",
  "desaparecer",
  "descender",
  "descomponer",
  "descontar",
  "describir",
  "deshacer",
  "deshacerse",
  "desobedecer",
  "desolar",
  "desollar",
  "desosar",
  "despedir",
  "despedirse",
  "despertar",
  "despertarse",
  "desteñir",
  "desvanecerse",
  "desvestir",
  "desvestirse",
  "detener",
  "detenerse",
  "devenir",
  "devolver",
  "diferir",
  "digerir",
  "discernir",
  "disentir",
  "disolver",
  "disponer",
  "disponerse",
  "distender",
  "distraer",
  "divertir",
  "divertirse",
  "doler",
  "dormir",
  "dormirse",
  "elegir",
  "embellecer",
  "embestir",
  "encender",
  "encerrar",
  "encontrar",
  "encontrarse",
  "enflaquecerse",
  "enloquecer",
  "enmendar",
  "enriquecer",
  "enriquecerse",
  "entender",
  "enterrar",
  "entretener",
  "entretenerse",
  "entrever",
  "envejecer",
  "envolver",
  "erguir",
  "errar",
  "escribir",
  "esforzar",
  "esforzarse",
  "establecer",
  "estar",
  "estreñir",
  "expedir",
  "exponer",
  "extender",
  "extraer",
  "fallecer",
  "favorecer",
  "florecer",
  "follar",
  "fortalecer",
  "forzar",
  "fregar",
  "freír",
  "gemir",
  "gobernar",
  "haber",
  "hacer",
  "hacerse",
  "heder",
  "helar",
  "henchir",
  "herir",
  "herrar",
  "hervir",
  "impartir",
  "impedir",
  "imponer",
  "inducir",
  "inferir",
  "inquirir",
  "inscribir",
  "inscribirse",
  "interferir",
  "interponer",
  "intervenir",
  "introducir",
  "invertir",
  "ir",
  "irse",
  "jugar",
  "llover",
  "lucir",
  "maldecir",
  "malquerer",
  "manifestar",
  "mantener",
  "mantenerse",
  "mecer",
  "medir",
  "mentar",
  "mentir",
  "merecer",
  "merendar",
  "moler",
  "morder",
  "morir",
  "morirse",
  "mostrar",
  "mostrarse",
  "mover",
  "moverse",
  "nacer",
  "negar",
  "negarse",
  "nevar",
  "obedecer",
  "obtener",
  "ofrecer",
  "oír",
  "oler",
  "oponer",
  "oponerse",
  "oscurecer",
  "padecer",
  "parecer",
  "parecerse",
  "pedir",
  "pensar",
  "perecer",
  "permanecer",
  "perseguir",
  "pertenecer",
  "placer",
  "plegar",
  "poder",
  "poner",
  "ponerse",
  "posponer",
  "predecir",
  "preferir",
  "prescribir",
  "presentir",
  "prevenir",
  "prever",
  "probar",
  "probarse",
  "producir",
  "promover",
  "proponer",
  "proponerse",
  "proseguir",
  "provenir",
  "pudrir",
  "quebrar",
  "quebrarse",
  "querer",
  "raer",
  "recaer",
  "recomendar",
  "reconocer",
  "recordar",
  "reducir",
  "referir",
  "referirse",
  "reforzar",
  "regar",
  "regir",
  "rehacer",
  "reír",
  "reírse",
  "remover",
  "renacer",
  "rendir",
  "renovar",
  "reñir",
  "repetir",
  "reponer",
  "reproducir",
  "requerir",
  "resolver",
  "restablecer",
  "retener",
  "reventar",
  "revolver",
  "rodar",
  "roer",
  "rogar",
  "romper",
  "saber",
  "salir",
  "satisfacer",
  "seducir",
  "seguir",
  "sembrar",
  "sentar",
  "sentarse",
  "sentir",
  "sentirse",
  "ser",
  "serrar",
  "servir",
  "sobresalir",
  "sofreír",
  "soldar",
  "soler",
  "soltar",
  "sonar",
  "sonarse",
  "sonreír",
  "soñar",
  "sosegar",
  "sostener",
  "sugerir",
  "suponer",
  "suscribir",
  "temblar",
  "tender",
  "tener",
  "tentar",
  "teñir",
  "torcer",
  "tostar",
  "tostarse",
  "traducir",
  "traer",
  "transcribir",
  "transferir",
  "tronar",
  "tropezar",
  "valer",
  "venir",
  "ver",
  "verter",
  "vestir",
  "vestirse",
  "volar",
  "volcar",
  "volver",
  "volverse",
  "yacer",
  "yuxtaponer"];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $palabras = Palabras::all();

    return response()->json([
        'status' => 'success',
        'data' => $palabras
    ], 200);
    }



    public function showRestricted(Request $request){

        // Me conviene devolver un array
        $palabras = $request->palabras;

        // Genero un array de obj posicion y posibilidades
        $respuesta = array();

        foreach ($palabras as $palabra){
          $restricciones = (array) $palabra;
          $posicion = $restricciones["posicion"];
          // FILTRO : SACO POSICION Y TODOS LOS CAMPOS QUE SEAN NULL
          unset($restricciones["posicion"]);
          foreach($restricciones as $restriccion=>$value){
            if($value == null || $value == ""){
              unset($restricciones[$restriccion]);
            }
          }


          $palabras_elegidas = Palabra::where($restricciones)->get();

          $obj = new \stdClass();

          $obj->posicion = $posicion;
          $obj->palabras = $palabras_elegidas;
          $respuesta[] = $obj;
        }



      return response()->json([
        'status' => 'success',
        'data' => $respuesta
      ], 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $palabra = $request->palabra;

      $palabras = Palabra::where('palabra', $palabra)->get();
      if(sizeof($palabras) != 0){
        $palabraRepetida = $palabras[0];
        $count = $palabras[0]->count;
        $count = $count + 1;
        Palabra::where("palabra", $palabra)->update([
          "count"=> $count
        ]);

        return response()->json([
          'status' => 'success',
          'data' => "ya_ingresada"
        ], 200);
      }



      $analisis = $this->apiCall($palabra);
      $data = $analisis["deps"][0]["Analyzed_Sentence"];
      $explode = explode("|", $data);

      //PROCESAMIENTO POSICION CERO DEL ARRAY

      $explodePrimeroCero = explode( "::", $explode[0]);
      $explodeSegundoCero = explode( "_", $explodePrimeroCero[1]);
      $explodeTerceroCero = explode( ":", $explodeSegundoCero[3]);

      //PROESAMIENTO A PARTIR DE CERO

      $arrayValues = array();
      foreach($explode as $fragmento){
        $explodeFragmento = explode(":" ,$fragmento);
        if($explodeFragmento[0] == "SENT"){
        }else{
          if(isset($explodeFragmento[1])){
            array_push($arrayValues, $explodeFragmento[1]);
          }
        }
      }

      // RESPUESTA CRUDA

      $respuestaApi = new \stdClass();

      $respuestaApi->palabraEnviada = isset($explodeSegundoCero[0]) ? $explodeSegundoCero[0]: "";
      $respuestaApi->caracterGramatical = isset($explodeSegundoCero[1]) ? $explodeSegundoCero[1]: "";
      $respuestaApi->numeroSignifDesconocido = isset($explodeSegundoCero[2]) ? $explodeSegundoCero[2]: "";
      $respuestaApi->genero = isset($explodeTerceroCero[1])?$explodeTerceroCero[1] : "";
      $respuestaApi->lemma = isset($arrayValues[0]) ? $arrayValues[0] : '';
      $respuestaApi->modo = isset($arrayValues[1]) ? $arrayValues[1] : '';
      $respuestaApi->numero = isset($arrayValues[2]) ? $arrayValues[2] : '';
      $respuestaApi->persona = isset($arrayValues[3]) ? $arrayValues[3] : '';
      $respuestaApi->posicion = isset($arrayValues[4]) ? $arrayValues[4] : '';
      $respuestaApi->tiempo = isset($arrayValues[5]) ? $arrayValues[5] : '';
      $respuestaApi->token = isset($arrayValues[6]) ? $arrayValues[6] : '';
      $respuestaApi->tipo = isset($arrayValues[7]) ? $arrayValues[7] : '';

      // FILTRO PARA ENVIAR LA INFO CORRECTA EN CADA CARACTER GRAMATICAL
      /* campos posibles:
      palabra
      caracter
      infinitivo
      genero
      numero
      modo

      VERBOS

      persona
      tiempo

      count DEFAULT NO HACE FALTA ENVIAR
      uses DEFAULT NO HACE FALTA ENVIAR
      */


      $dataProcesada = new \stdClass();

      // CASO INDEFINIDO
      $dataProcesada->palabra = $palabra;

      if($respuestaApi->caracterGramatical == "I"){
        $dataProcesada->caracter = "indefinido";
        return $this->guardarYResponder($dataProcesada, $respuestaApi);
      }

      // CASO VERBO


      if($respuestaApi->caracterGramatical == "VERB"){

        if($respuestaApi->modo == "G"){
          $dataProcesada->caracter = "verbo";
          $dataProcesada->infinitivo = $respuestaApi->lemma ;
          $dataProcesada->modo = "gerundio" ;
          return $this->guardarYResponder($dataProcesada, $respuestaApi);
        }

        $dataProcesada->caracter = "verbo";
        $dataProcesada->infinitivo = $respuestaApi->lemma;

        // Check regular o irregular
        $dataProcesada->is_regular = 1;

        foreach($this->verbosIrregulares as $verboIrregular){
          if($verboIrregular == $dataProcesada->infinitivo){
            $dataProcesada->is_regular = 0;
          }
        };

        if($respuestaApi->numero == "P"){
          $dataProcesada->numero = "plural";
        }else{
          $dataProcesada->numero = "singular";
        }

        $dataProcesada->modo = "indicativo";

        $dataProcesada->persona = $respuestaApi->persona;

        $tiempo = $respuestaApi->tiempo;

        if($tiempo == "I"){
          $dataProcesada->tiempo = "indefinido";
        }
        if($tiempo == "F"){
          $dataProcesada->tiempo = "futuro";

        }
        if($tiempo == "S"){
          $dataProcesada->tiempo = "pasado";

        }
        if($tiempo == "P"){
          $dataProcesada->tiempo = "presente";
        }
        if($tiempo == "C"){
          $dataProcesada->tiempo = "condicional";
        }
        return $this->guardarYResponder($dataProcesada, $respuestaApi);
      }

      // CASO SUSTANTIVO

      if($respuestaApi->caracterGramatical == "NOUN"){

        $dataProcesada->caracter = "sustantivo";

        if($respuestaApi->genero == "M"){
          $dataProcesada->genero = "masculino";
        }else if ($respuestaApi->genero == "F"){
          $dataProcesada->genero = "femenino";
        }else{
          $dataProcesada->genero = "indefinido";
        }

        if($respuestaApi->modo == "P"){
          $dataProcesada->numero = "plural";
        }else if ($respuestaApi->modo == "S"){
          $dataProcesada->numero = "singular";
        }else{
          $dataProcesada->numero = "indefinido";
        }
        $dataProcesada->infinitivo = $respuestaApi->lemma;
        return $this->guardarYResponder($dataProcesada, $respuestaApi);
      }


      // CASO ADVERBIO
      if($respuestaApi->caracterGramatical == "ADV"){

        $dataProcesada->caracter = "adverbio";
        return $this->guardarYResponder($dataProcesada, $respuestaApi);

      }

      // CASO ADJETIVO

      if($respuestaApi->caracterGramatical == "ADJ"){

        $dataProcesada->caracter = "adjetivo";

        if($respuestaApi->modo == "M"){
          $dataProcesada->genero = "masculino";
        }else if ($respuestaApi->modo == "F"){
          $dataProcesada->genero = "femenino";
        }else{
          $dataProcesada->genero = "indefinido";
        }

        if($respuestaApi->persona == "P"){
          $dataProcesada->numero = "plural";
        }else if ($respuestaApi->persona == "S"){
          $dataProcesada->numero = "singular";
        }else{
          $dataProcesada->numero = "indefinido";
        }

        return $this->guardarYResponder($dataProcesada, $respuestaApi);

      }

      // CASO ARTICULO

      if($respuestaApi->caracterGramatical == "DT"){

        $dataProcesada->caracter = "articulo";

        if($respuestaApi->genero == "M"){
          $dataProcesada->genero = "masculino";
        }else if ($respuestaApi->genero == "F"){
          $dataProcesada->genero = "femenino";
        }else{
          $dataProcesada->genero = "indefinido";
        }

        if($respuestaApi->modo == "P"){
          $dataProcesada->numero = "plural";
        }else if ($respuestaApi->modo == "S"){
          $dataProcesada->numero = "singular";
        }else{
          $dataProcesada->numero = "indefinido";
        }
        $dataProcesada = $respuestaApi->numero;

        return $this->guardarYResponder($dataProcesada, $respuestaApi);

      }

      // CASO PREPOSICION

      if($respuestaApi->caracterGramatical == "PRP"){

        $dataProcesada->caracter = "preposicion";
        return $this->guardarYResponder($dataProcesada, $respuestaApi);

      }


      // CASO PRONOMBRE
      if($respuestaApi->caracterGramatical == "PRO"){

        $dataProcesada->caracter = "pronombre";

        if($respuestaApi->lemma == "M"){
          $dataProcesada->genero = "masculino";
        }else if ($respuestaApi->lemma == "F"){
          $dataProcesada->genero = "femenino";
        }else{
          $dataProcesada->genero = "indefinido";
        }

        if($respuestaApi->numero == "P"){
          $dataProcesada->numero = "plural";
        }else if ($respuestaApi->numero == "S"){
          $dataProcesada->numero = "singular";
        }else{
          $dataProcesada->numero = "indefinido";
        }

        $dataProcesada->persona = $respuestaApi->persona;
        return $this->guardarYResponder($dataProcesada, $respuestaApi);
      }

      // CASO CONJUNCION

      if($respuestaApi->caracterGramatical == "CONJ"){

        $dataProcesada->caracter = "conjuncion";
        return $this->guardarYResponder($dataProcesada, $respuestaApi);

      }
    }

    public function guardarYResponder($dataProcesada, $respuestaApi){
      $palabra = Palabra::create((array) $dataProcesada);
      return response()->json([
        'status' => 'success',
        'data' => $dataProcesada,
        'dataCruda'=> $respuestaApi
      ], 200);
    }

    public function apiCall($palabra)
    {
      $headers = [
        'X-RapidAPI-Key'=> '208e042f52mshab8d011f10b325bp1b8543jsn78cb289ed4e2',
      ];

      $client = new \GuzzleHttp\Client(['base_uri' => 'https://cilenisapi.p.rapidapi.com/']);
      $response = $client->request('GET', "syntactic_analyzer?output_type=-a&text=" . $palabra . "&lang_input=es", [
        "headers" => $headers,
      ]);
      $respuestaJson = $response->getBody()->getContents();
      $respuesta = json_decode($respuestaJson, true);
      return $respuesta;
    }

    public function count(){
      $count = count(Palabra::all());

      return response()->json([
        "status" => "success",
        "data" => $count
      ],200);
    }
}
