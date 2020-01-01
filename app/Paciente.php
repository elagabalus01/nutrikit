<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Paciente extends Model
{
    protected $primaryKey = 'rfc';
    public $incrementing = false;
    protected $keyType='string';
    public $timestamps = false;
    protected $table = 'pacientes';
    protected $fillable = [
        'rfc',
        'nombre',
        'telefono',
        'correo_electronico',
        'estatura',
        'peso',
        'fecha_nacimiento',
        'sexo',
        'actividad_fisica',
        'alergias',
        'enfermedades',
    ];
    public function citas(){
        return $this->hasMany('App\Cita');
    }
    public function consultas(){
        return $this->hasMany('App\Consulta');
    }
    public function getEdadAttribute(){
        $fechaDeNacimiento=Carbon::createFromFormat('Y-m-d',$this->fecha_nacimiento);
        $fechaActual=Carbon::now();
        return $fechaDeNacimiento->diffInYears($fechaActual);
    }
    public function getCumpleañosAttribute(){
        $fechaDeNacimiento=Carbon::createFromFormat('Y-m-d',$this->fecha_nacimiento)->format('d/m/Y');
        return $fechaDeNacimiento;
    }
}
