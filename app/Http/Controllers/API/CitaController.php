<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cita;
use App\Paciente;
use Carbon\Carbon;
use Validator;

class CitaController extends BaseController
{
    public function autocomplete(Request $request){
        $search = $request->get('term');
        $data = Paciente::where('nombre','LIKE',"%".$search."%")
                ->orWhere('rfc','LIKE',"%".$search."%")
                ->get();
        $items = array();
        foreach($data as $paciente){
            $items[] = array('label'=>$paciente->rfc." ".$paciente->nombre,'value'=>$paciente->rfc);
        }
        return response()->json($items);
    }
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
        if(Carbon::createFromFormat('Y-m-d H:i:s',$input['fecha_hora'])->lessThanOrEqualTo(Carbon::now())){
            return $this->sendErrorResponse("No puede crearse una cita para el pasado",[]);
        }
        $cita_inicio=Carbon::createFromFormat('Y-m-d H:i:s',$input['fecha_hora']);
        $citas_dia=Cita::where('atendida',false)
                        ->whereDate('fecha_hora','=',$cita_inicio)->get();
        
        foreach ($citas_dia as $cita){
            $cita_fin=Carbon::parse($cita_inicio)->addHour();
            $prueba_inicio=Carbon::createFromFormat('Y-m-d H:i:s',$cita->fecha_hora);
            $prueba_fin=Carbon::parse($prueba_inicio)->addHour();
            if($cita_inicio->eq($prueba_inicio)){
                return $this->sendErrorResponse("Ya hay una cita a esa hora",[]);
            }
            elseif($prueba_inicio->lt($cita_inicio) && $cita_inicio->lt($prueba_fin)){
                return $this->sendErrorResponse("La cita se traslapa",[]);
            }
            elseif ($prueba_inicio->lt($cita_fin)&&$cita_fin->lt($prueba_fin)) {
                return $this->sendErrorResponse("La cita se traslapa",[]);
            }
        }
        $cita=Cita::create([
            'paciente_id' => $input['paciente_id'],
            'fecha_hora'=> $input['fecha_hora'],
        ]);
        return $this->sendDone('La cita fue creada correctamente');
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
