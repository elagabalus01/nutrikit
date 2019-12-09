<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'nombre',
    ];
    protected $table = 'animales';
    public $timestamps = false;
}
