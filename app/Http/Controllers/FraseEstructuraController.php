<?php

namespace App\Http\Controllers;

use App\FraseEstructura;
use App\PalabraEstructura;
use App\ConectorEstructura;

use Illuminate\Http\Request;
use Validator;

class FraseEstructuraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $frases = FraseEstructura::all();

      foreach($frases as $frase){
        $conectores = $frase->conectores()->select([
          "caracter",
          "genero",
          "numero",
          "persona",
          "tipo",
          "posicion"
          ])->get();
        $palabras = $frase->palabras()->select([
        "caracter",
        "genero",
        "numero",
        "persona",
        "tiempo",
        "modo",
        "posicion",
        "fijo"])->get();

        $frase->conectores = $conectores;
        $frase->palabras = $palabras;
      }

      return response()->json([
          'status' => 'success',
          'data' => $frases
      ], 200);
    }

    public function eliminar(Request $request){

      $id = $request->frase_id;

      FraseEstructura::where("id",$id)->delete();
      PalabraEstructura::where("frase_id",$id)->delete();
      ConectorEstructura::where("frase_id",$id)->delete();

      return response()->json([
          'status' => 'success'
      ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Acá va a llegar un objeto con dos campos, palabras y conectores
        // ambos contienen arrays de modelos palabras y estructura

        $messages = [
            'required'=> 'El campo :attribute es requerido'
        ];

        $validator = Validator::make($request->all(), [
           'palabras' => 'required'
        ], $messages);

        if ($validator->fails()) {
         return response()->json([
             'status' => 'fail',
             'data' => $validator->errors()
         ], 200);
        }else{

         $frase = FraseEstructura::create();
         $frase_id = $frase->id;

         $palabras = $request->palabras;
         foreach($palabras as $palabra){
           $palabra = (object) $palabra;
           $palabra->frase_id = $frase_id;
           PalabraEstructura::create((array) $palabra);
         }

         $conectores = $request->conectores;
         foreach($conectores as $conector){
           $conector = (object) $conector;
           $conector->frase_id = $frase_id;
           ConectorEstructura::create((array) $conector);
         }


         return response()->json([
             'status' => 'success',
             'data' => $frase_id
         ], 200);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FraseEstructura  $fraseEstructura
     * @return \Illuminate\Http\Response
     */
    public function show(FraseEstructura $fraseEstructura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FraseEstructura  $fraseEstructura
     * @return \Illuminate\Http\Response
     */
    public function edit(FraseEstructura $fraseEstructura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FraseEstructura  $fraseEstructura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FraseEstructura $fraseEstructura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FraseEstructura  $fraseEstructura
     * @return \Illuminate\Http\Response
     */
    public function destroy(FraseEstructura $fraseEstructura)
    {
        //
    }
}
