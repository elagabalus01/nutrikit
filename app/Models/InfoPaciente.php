<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class InfoPaciente extends Model
{
    public $timestamps = false;
    protected $table='info_paciente';
    protected $fillable=[
        'rfc_paciente',
        'estatura',
        'peso',
        'actividad_fisica',
        'alergias',
        'enfermedades',
    ];
}

?>