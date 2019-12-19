<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanAlimenticio extends Model
{
    protected $table='planesAlimenticios';
    protected $fillable=[
        'consulta_id',
        'cereales',
        'leguminosas',
        'verduras',
        'frutas',
        'carnes',
        'lacteos',
        'grasas',
        'azucares',
    ];
    public $timestamps = false;

}
