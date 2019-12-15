<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    public $incrementing = false;
    protected $fillable = [
        'rfc',
        'nombre',
        'estatura',
        'peso',
        'edad',
        'genero',
        'alergias',
        'actividad_fisica',
    ];
    public function citas(){
        return $this->hasMany('App\Cita');
    }
    public function consultas(){
        return $this->hasMany('App\Consulta');
    }
    public $timestamps = false;
}
