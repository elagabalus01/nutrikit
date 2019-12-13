<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    $table='consultas';
    protected $fillable=[
        'user_id',
        'paciente_id',
        'cita_id',
        'dietaHabitual_id',
        'planAlimenticio_id',
        'observaciones',
        'fechaHora',
    ];
    public $timestamps = false;
    public funtion user(){
        return $this->hasOne('App\User','id','user_id');
    }
    public funtion paciente(){
        return $this->hasOne('App\Paciente','id','paciente_id');
    }
    public funtion cita(){
        return $this->hasOne('App\Cita','id','cita_id');
    }
    public funtion dietaHabitual(){
        return $this->hasOne('App\DietaHabitual','id','dietaHabitual_id');
    }
    public funtion planAlimenticio(){
        return $this->hasOne('App\planAlimenticio','id','planAlimenticio_id');
    }
}
