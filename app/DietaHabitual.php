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

    public function getTotalCaloriasAttribute(){
        return $this->cereales*70+$this->leguminosas*105+
        $this->verduras*25+$this->frutas*60+$this->carnes*75+
        $this->lacteos*145+$this->grasas*45+
        $this->azucares*20;
    }
}
