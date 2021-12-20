<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Alimentacion extends Model
{
    public $timestamps = false;
    protected $table='alimentacion';
    protected $fillable=[
        'cereales',
        'leguminosas',
        'verduras',
        'frutas',
        'carnes',
        'lacteos',
        'grasas',
        'azucares',
    ];

    public function getTotalCaloriasAttribute(){
        return $this->cereales*70+$this->leguminosas*105+
        $this->verduras*25+$this->frutas*60+$this->carnes*75+
        $this->lacteos*145+$this->grasas*45+
        $this->azucares*20;
    }
}

?>