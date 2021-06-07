<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeliculasGuardadas extends Model
{
    protected $table = 'peliculas_guardadas';

    protected $fillable = [
        'id', 'guardado', 'idUsuario', 'idPelicula'
    ];

    public function pelis(){
        return $this->belongsTo(Pelicula::class, 'idPelicula');
    }
}
