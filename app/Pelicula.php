<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $table = 'peliculas';

    protected $fillable = [
        'id', 'nombre', 'idSaga', 'estreno', 'imagen', 'sinopsis'
    ];

    public function guardados()
    {
        return $this->hasMany('App\PersonajeGuardado');
    }

    public function meGusta()
    {
        return $this->hasMany('App\Usuario_Pelicula');
    }
}
