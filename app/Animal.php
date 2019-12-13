<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animales';
    protected $fillable = [
        'nombre',
    ];
    public $timestamps = false;
}
