<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietaHabitual extends Model
{
    protected $table='dietasHabituales';
    protected $fillable=[
        'verduras',
        'frutas',
        'aoa',
        'cereales',
    ];
    public $timestamps = false;
}
