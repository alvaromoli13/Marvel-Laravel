<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Pelicula extends Model
{
    protected $table = 'usuario_peliculas';

    protected $fillable = [
        'id', 'valoracion', 'favorito', 'idUsuario', 'idPelicula'
    ];
}
