<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    $table='consultas';
    protected $fillable=[
        'observaciones',
        'fechaHora'
    ]
}
