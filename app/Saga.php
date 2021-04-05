<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saga extends Model
{
    protected $table = 'sagas';

    protected $fillable = [
        'id', 'nombre', 'estreno'
    ];
}
