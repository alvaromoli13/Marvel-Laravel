<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Personaje extends Model
{
    protected $table = 'usuario_personajes';

    protected $fillable = [
        'id', 'valoracion', 'favorito', 'idUsuario', 'idPersonaje'
    ];
}
