<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    protected $fillable = [
        'nombre',
        'estatura',
        'peso',
        'edad',
        'genero',
        'alergias',
        'actividadFisica',
    ];
    public $timestamps = false;
}
