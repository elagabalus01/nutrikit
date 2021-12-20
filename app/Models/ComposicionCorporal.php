<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ComposicionCorporal extends Model
{
    public $timestamps = false;
    protected $table='composicion_corporal';
    protected $fillable=[
        'rfc_paciente',
        'grasa_porcentaje',
        'musculo_porcentaje',
        'hueso_kilos',
        'agua_litros'
    ];
}

?>