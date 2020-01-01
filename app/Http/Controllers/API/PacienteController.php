<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cita;
use App\Paciente;
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
        if(is_null($paciente)){
            return $this->sendErrorResponse([],'El rfc no esta registrado');
        }
        if($campo=='correo' && array_key_exists('correo',$input)){
            $paciente->correo_electronico=strtolower($input['correo']);
            $paciente->save();
            return $this->sendDone('El correo fue actualizado');
        }
        if($campo=='telefono' && array_key_exists('telefono',$input)){
            $paciente->telefono=$input['telefono'];
            $paciente->save();
            return $this->sendDone('El telefono fue actualizado');
        }
        if($campo=='peso' && array_key_exists('peso',$input)){
            $paciente->peso=$input['peso'];
            $paciente->save();
            return $this->sendDone('El peso fue actualizado');
        }
        if($campo=='estatura' && array_key_exists('estatura',$input)){
            $paciente->estatura=$input['estatura'];
            $paciente->save();
            return $this->sendDone('La estatura fue actualizado');
        }
        if($campo=='actividad_fisica' && array_key_exists('actividad_fisica',$input)){
            $paciente->actividad_fisica=$input['actividad_fisica'];
            $paciente->save();
            return $this->sendDone('La actividad fisica fue actualizado');
        }
        if($campo=='alergias' && array_key_exists('alergias',$input)){
            $paciente->alergias=$input['alergias'];
            $paciente->save();
            return $this->sendDone('Las alergias fueron actualizadas');
        }
        if($campo=='enfermedades' && array_key_exists('enfermedades',$input)){
            $paciente->enfermedades=$input['enfermedades'];
            $paciente->save();
            return $this->sendDone('Las enfermedades fueron actualizadas');
        }
        if(array_key_exists('correo',$input) ||
            array_key_exists('telefono',$input) ||
            array_key_exists('peso',$input) ||
            array_key_exists('estatura',$input) ||
            array_key_exists('actividad_fisica',$input) ||
            array_key_exists('enfermedades',$input) ||
            array_key_exists('alergias',$input)){
            return $this->sendErrorResponse([],'La peticion y el campo no coinciden');
        }
        return $this->sendErrorResponse([],$campo.' no es un parametro aceptado');
    }
}