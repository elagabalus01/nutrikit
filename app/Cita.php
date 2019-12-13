<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table='citas';
    protected $fillable=[
        'fecha_hora',
        'id_paciente',
    ];
    public funtion paciente(){
        return $this->hasOne('App\Paciente','id','id_paciente');
    }
}
