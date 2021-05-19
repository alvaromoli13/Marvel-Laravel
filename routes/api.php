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


Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\RegisterController@login');

Route::resource('sagas', 'SagaController');
Route::resource('comentarios', 'ComentarioController');
Route::resource('personajes', 'PersonajeController');
Route::resource('peliculas', 'PeliculaController');


Route::middleware('auth:api')->group( function () {
    
});