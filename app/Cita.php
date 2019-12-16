<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cita extends Model
{
    protected $table='citas';
    protected $fillable=[
        'fecha_hora',
        'paciente_id',
    ];
    public $timestamps = false;
    public function paciente(){
        return $this->hasOne('App\Paciente','rfc','paciente_id');
    }
    public function getFechaAttribute(){
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->fecha_hora)->format('d/m/Y');
        // return Carbon::now();
    }
    public function getHoraAttribute(){
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->fecha_hora)->format('H:i');
    }
}