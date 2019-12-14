<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table='consultas';
    protected $fillable=[
        'user_id',
        'paciente_id',
        'cita_id',
        'dietaHabitual_id',
        'planAlimenticio_id',
        'observaciones',
        'fecha_hora',
    ];
    public $timestamps = false;
    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function paciente(){
        return $this->hasOne('App\Paciente','id','paciente_id');
    }
    public function cita(){
        return $this->hasOne('App\Cita','id','cita_id');
    }
    public function dietaHabitual(){
        return $this->hasOne('App\DietaHabitual','id','dietaHabitual_id');
    }
    public function planAlimenticio(){
        return $this->hasOne('App\planAlimenticio','id','planAlimenticio_id');
    }
}
