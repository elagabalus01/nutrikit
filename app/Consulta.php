<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Consulta extends Model
{
    protected $table='consultas';
    protected $fillable=[
        'user_id',
        'paciente_id',
        'cita_id',
        'descripcion_dieta',
        'observaciones',
        'fecha_hora',
        'edad_actual',
        'peso_actual',
        'estatura_actual',
        'actividad_fisica_actual',
        'grasa_porcentaje',
        'musculo_porcentaje',
        'hueso_kilos',
        'agua_litros',
    ];
    public $timestamps = false;
    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function paciente(){
        return $this->hasOne('App\Paciente','rfc','paciente_id');
    }
    public function cita(){
        return $this->hasOne('App\Cita','id','cita_id');
    }
    public function dietaHabitual(){
        return $this->hasOne('App\DietaHabitual');
    }
    public function planAlimenticio(){
        return $this->hasOne('App\planAlimenticio');
    }
    public function getFechaAttribute(){
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->fecha_hora)->format('d/m/Y');
        // return Carbon::now();
    }
    public function getHoraAttribute(){
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->fecha_hora)->format('H:i');
    }
}
