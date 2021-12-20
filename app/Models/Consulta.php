<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Consulta extends Model
{
    protected $table='consulta';
    protected $fillable=[
        'id_medico',
        'id_paciente',
        'id_cita',
        'id_composicion_corporal',
        'id_macros',
        'id_info_paciente',
        'id_dieta_habitual',
        'id_plan_alimenticio',
        'motivo',
        'descripcion_dieta',
        'observaciones',
        'fecha_hora',
        
    ];
    public $timestamps = false;
    public function medico(){
        return $this->hasOne('App\Models\Medico','id','id_medico');
    }
    public function paciente(){
        return $this->hasOne('App\Models\Paciente','rfc','id_paciente');
    }
    public function cita(){
        return $this->hasOne('App\Models\Cita','id','id_cita');
    }
    public function dieta(){
        return $this->hasMany('App\Models\Alimentacion');
    }

    public function info_paciente(){
        return $this->hasOne('App\Models\InfoPaciente','id','id_info_paciente');
    }

    public function composicion_corporal(){
        return $this->hasOne('App\Models\ComposicionCorporal','id','id_composicion_corporal');
    }

    public function macros(){
        return $this->hasOne('App\Models\Macros','id','id_macros');
    }

    public function planAlimenticio(){
        return $this->hasOne('App\Models\Alimentacion','id','id_plan_alimenticio');
    }

    public function dietaHabitual(){
        return $this->hasOne('App\Models\Alimentacion','id','id_plan_alimenticio');
    }

    public function getFechaAttribute(){
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->fecha_hora)->format('d/m/Y');
        // return Carbon::now();
    }
    public function getHoraAttribute(){
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->fecha_hora)->format('H:i');
    }


}

?>