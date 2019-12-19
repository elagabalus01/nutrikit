<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietaHabitual extends Model
{
    protected $table='dietasHabituales';
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
