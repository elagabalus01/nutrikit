<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\InfoPaciente;

class Paciente extends Model
{
    protected $primaryKey = 'rfc';
    public $incrementing = false;
    protected $keyType='string';
    public $timestamps = false;
    protected $table = 'paciente';
    protected $fillable = [
        'rfc',
        'nombre',
        'paterno',
        'materno',
        'telefono',
        'correo_electronico',
        'fecha_nacimiento',
        'sexo',
    ];
    public function citas(){
        return $this->hasMany('App\Models\Cita');
    }
    public function consultas(){
        return $this->hasMany('App\Models\Consulta');
    }

    public function info_paciente(){
        return $this->hasMany('App\Models\InfoPaciente','rfc_paciente','rfc');
    }

    public function getNombreCompletoAttribute(){
        return $this->nombre." ".$this->paterno." ".$this->materno;
    }

    public function getInfoAttribute(){
        return InfoPaciente::where('rfc_paciente','=',$this->rfc)
            ->orderBy('created_at', 'asc')
            ->get()->first();
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

?>
