<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Personaje extends Model
{
    protected $table = 'usuario__personajes';

    protected $fillable = [
        'id', 'favorito', 'idUsuario', 'idPersonaje'
    ];
}
