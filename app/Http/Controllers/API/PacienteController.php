<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\InfoPaciente;

use Carbon\Carbon;
use Validator;

class PacienteController extends BaseController
{
    public function check($rfc){
        if(!is_null(Paciente::find($rfc))){
            return $this->sendDone('RFC encontrado');
        }
        else{
            return $this->sendErrorResponse('RFC no registrado',[]);
        }
    }
    public function datos($rfc,$campo)
    {
        $paciente=Paciente::find($rfc);
        if(is_null($paciente)){
            return $this->sendErrorResponse([],'El rfc no esta registrado');
        }
        if($campo=='correo'){
            return $this->sendResponse($paciente->correo_electronico, 'Correo recuperado exitosamente');
        }
        if($campo=='telefono'){
            return $this->sendResponse($paciente->telefono, 'Telefono recuperado exitosamente');
        }
        if($campo=='peso'){
            return $this->sendResponse($paciente->peso, 'Peso recuperado exitosamente');
        }
        if($campo=='estatura'){
            return $this->sendResponse($paciente->estatura, 'Estatura recuperada exitosamente');
        }
        if($campo=='actividad_fisica'){
            return $this->sendResponse($paciente->actividad_fisica, 'Estatura recuperada exitosamente');
        }
        if($campo=='alergias'){
            return $this->sendResponse($paciente->alergias, 'Alergias recuperadas exitosamente');
        }
        if($campo=='enfermedades'){
            return $this->sendResponse($paciente->enfermedades, 'Enfermedades recuperadas exitosamente');
        }
        return $this->sendErrorResponse([],$campo.' no es un parametro aceptado');
    }
    public function actualizar(Request $request,$rfc,$campo){
        $input = $request->all();
        $paciente=Paciente::find($rfc);
        $info_paciente=InfoPaciente::where('rfc_paciente','=',$paciente->rfc)
            ->orderBy('created_at', 'asc')
            ->get()->first();
        if(is_null($paciente)){
            return $this->sendErrorResponse([],'El rfc no esta registrado');
        }
        if(!array_key_exists($campo,$input)){
            return $this->sendErrorResponse([],'No se envió el dato correspondiente al campo');
        }
        $dato=$input[$campo];
        switch ($campo) {
            case 'correo':
                $paciente->correo_electronico=strtolower($dato);
                break;
            case 'telefono':
                $paciente->telefono=$dato;
                break;
            case 'peso':
                $info_paciente->peso=$dato;
                // $paciente->info->peso=$dato;
                break;
            case 'estatura':
                $info_paciente->estatura=$dato;
                // $paciente->info->estatura=$dato;
                break;
            case 'actividad_fisica':
                $info_paciente->actividad_fisica=$dato;
                // $paciente->info->actividad_fisica=$dato;
                break;
            case 'alergias':
                $info_paciente->alergias=$dato;
                // $paciente->info->alergias=$dato;
                break;
            case 'enfermedades':
                $info_paciente->enfermedades=$dato;
                // $paciente->info->enfermedades=$dato;
                break;
            default:
                return $this->sendErrorResponse([],$campo.' no es un parametro aceptado');
                break;
        }
        $paciente->save();
        $info_paciente->save();
        return $this->sendDone('El campo '.$campo.' fue actualizado');
        
    }
}