<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    protected $table = 'personajes';

    protected $fillable = [
        'id', 'nombre', 'descripcion', 'valoracion', 'imagen', 'idSaga'
    ];
}
