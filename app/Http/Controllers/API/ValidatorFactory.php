<?php
namespace App\Http\Controllers\API;
use Validator;

class ValidatorFactory{

    static $messages = [
        'required' => 'El :attribute es un dato requerido.',
        'unique' => ':attribute ya esta registrado.',
    ];

    static function dietaValidator($input){
        return Validator::make($input, [
            // Validar todos los datos de la dieta
            'dieta_cereales'=>'required',
            'dieta_leguminosas'=>'required',
            'dieta_verduras'=>'required',
            'dieta_frutas'=>'required',
            'dieta_carnes'=>'required',
            'dieta_lacteos'=>'required',
            'dieta_grasas'=>'required',
            'dieta_azucares'=>'required',
            // Validar todos los datos del plan
            'plan_cereales'=>'required',
            'plan_leguminosas'=>'required',
            'plan_verduras'=>'required',
            'plan_frutas'=>'required',
            'plan_carnes'=>'required',
            'plan_lacteos'=>'required',
            'plan_grasas'=>'required',
            'plan_azucares'=>'required',
        ],ValidatorFactory::$messages);
    }
    static function pacienteValidator($input){
        return Validator::make($input, [
            'rfc' => 'required|unique:paciente,rfc',
            'nombre' => 'required',
            'paterno' => 'required',
            'estatura' => 'required',
            'peso' => 'required',
            'fecha_nacimiento' => 'required',
            'sexo' => 'required',
            'grasa_porcentaje' => 'required',
            'musculo_porcentaje' => 'required',
            'hueso_kilos' => 'required',
            'agua_litros' => 'required',
            'motivo' => 'required',
            // Se valida que esten los porcentajes
            'proteinas_porcentaje' => 'required',
            'hidratos_porcentaje' => 'required',
            'lipidos_porcentaje' => 'required',
        ],ValidatorFactory::$messages);
    }
}
