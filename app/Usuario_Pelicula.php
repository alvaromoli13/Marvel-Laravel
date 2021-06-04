<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Pelicula extends Model
{
    protected $table = 'usuario__peliculas';

    protected $fillable = [
        'id', 'favorito', 'idUsuario', 'idPelicula'
    ];
}
