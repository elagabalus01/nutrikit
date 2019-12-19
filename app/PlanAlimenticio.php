<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanAlimenticio extends Model
{
    protected $table='planesAlimenticios';
    protected $fillable=[
        'cereales',
        'leguminosas',
        'verdura',
        'frutas',
        'carne',
        'leche',
        'grasas',
        'azucares',
        'consulta_id',
    ];
    public $timestamps = false;

}
