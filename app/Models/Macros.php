<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Macros extends Model
{
    public $timestamps = false;
    protected $table='macros';
    protected $fillable=[
        'proteinas',
        'hidratos',
        'lipidos'
    ];
}

?>