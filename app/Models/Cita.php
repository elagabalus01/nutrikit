<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cita extends Model
{
    protected $table='cita';
    protected $fillable=[
        'fecha_hora',
        'id_paciente',
    ];
    public $timestamps = false;
    public function paciente(){
        return $this->hasOne('App\Models\Paciente','rfc','id_paciente');
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