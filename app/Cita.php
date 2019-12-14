<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table='citas';
    protected $fillable=[
        'fecha_hora',
        'paciente_id',
    ];
    public $timestamps = false;
    public function paciente(){
        return $this->hasOne('App\Paciente','id','paciente_id');
    }
}