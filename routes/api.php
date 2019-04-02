<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('logout', 'Auth\LoginController@logout');
Route::post("register", 'Auth\RegisterController@register');
Route::post("login", 'Auth\LoginController@login');
Route::post('palabra', 'PalabraController@store');
//Route::post('generarFrase', 'GeneradorController@buscarFraseYElegirRandom');


Route::get('fraseEstructura', "FraseEstructuraController@index");
Route::get('count', "PalabraController@count");



Route::post('palabraRandFilter', "PalabraController@showRestricted");

Route::group(['middleware' => 'auth:api'], function() {


    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('frases', "FraseController@index");
    Route::post('frase', "FraseController@store");
    Route::post('fraseUpdate', "FraseController@update");
    Route::post('fraseDelete', "FraseController@delete");

    Route::post('fraseEstructuraStore', "FraseEstructuraController@store");
    Route::post('fraseEstructuraUpdate', "FraseEstructuraController@update");
    Route::post('eliminarFrase', "FraseEstructuraController@eliminar");



});
