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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*APIREST */
Route::resource('pais'     , 'PaisController');
Route::resource('actor'    , 'ActorController');
Route::resource('heroe'    , 'SuperHeroeController');
Route::resource('peliculas', 'PeliculaController');
