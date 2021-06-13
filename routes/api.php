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


Route::middleware('auth:api')->group( function () {
    Route::resource('sagas', 'SagaController');

    Route::resource('comentarios', 'ComentarioController');
    Route::get('comentariosPeli/{idPelicula}', 'ComentarioController@ComentarioAsociadoPelicula');

    Route::resource('personajes', 'PersonajeController');

    Route::resource('peliculas', 'PeliculaController');

    Route::resource('meGustaPersonajes', 'UsuarioPersonajeController');
    Route::get('meGustaPersonaje/{idPersonaje}', 'UsuarioPersonajeController@meGustasTotales');
    Route::delete('eliminarMPersonaje/{idPersonaje}.{idUsuario}', 'UsuarioPersonajeController@eliminar');

    Route::resource('meGustaPeliculas', 'UsuarioPeliculaController');
    Route::get('meGustaPelicula/{idPelicula}', 'UsuarioPeliculaController@meGustasTotales');
    Route::delete('eliminarMPeli/{idPelicula}.{idUsuario}', 'UsuarioPeliculaController@eliminar');

    Route::resource('guardadoPersonajes', 'PersonajeGuardadoController');
    Route::get('guardadoPersonaje/{idPersonaje}', 'PersonajeGuardadoController@guardadosTotales');
    Route::delete('eliminarGPersonaje/{idPersonaje}.{idUsuario}', 'PersonajeGuardadoController@eliminar');
    Route::get('personajesAsociados/{idUsuario}', 'PersonajeGuardadoController@personajesAsociados');


    Route::resource('guardadoPeliculas', 'PeliculasGuardadasController');
    Route::get('guardadoPelicula/{idPelicula}', 'PeliculasGuardadasController@guardadosTotales');
    Route::delete('eliminarGPelicula/{idPelicula}.{idUsuario}', 'PeliculasGuardadasController@eliminar');
    Route::get('peliculasAsociadas/{idUsuario}', 'PeliculasGuardadasController@peliculasAsociadas');

});