<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonajeGuardado extends Model
{
    protected $table = 'personaje_guardados';

    protected $fillable = [
        'id', 'favorito', 'idUsuario', 'idPersonaje'
    ];
}
