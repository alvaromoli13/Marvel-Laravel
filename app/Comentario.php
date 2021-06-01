<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';

    protected $fillable = [
        'id', 'descripcion', 'idUsuario', 'idPelicula', 'bloqueado'
    ];

    public function dueño(){
        return $this->belongsTo(User::class, 'idUsuario');
    }
}
