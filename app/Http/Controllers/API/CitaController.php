<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cita;
use App\Paciente;
use Validator;

class CitaController extends BaseController
{
    public function index()
    {
        $cita = Cita::all();
        return $this->sendResponse($cita->toArray(), 'Todas las citas fueron enviadas');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'paciente_id' => 'required|exists:pacientes,rfc',
            'fecha_hora' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendErrorResponse('Error en la validacion',$validator->errors());
        }
        $cita=Cita::create([
            'paciente_id' => $input['paciente_id'],
            'fecha_hora'=> $input['fecha_hora'],
        ]);
        return $this->sendDone('Consulta almacenada correctamente');
    }
    public function show($id)
    {
        $cita = Cita::find($id);
        if (is_null($cita)) {
            return $this->sendError('No se encontró la cita con ese id');
        }
        
        return $this->sendResponse($cita->toArray(), 'Cita encontrada');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'nombre' => 'required|unique:animales,nombre'
        ]);

        if($validator->fails()){
            return $this->sendErrorResponse('Error de validacion',$validator->errors());
        }
         $cita=Consulta::where('id', $id)->update($request->all());
        return $this->sendDone('Cita actualizada');
    }

    public function destroy($id)
    {
        $cita=Cita::where('id', $id);
        $cita->delete();
        return $this->sendResponse([], 'La cita fue eliminada correctamente');
    }
}