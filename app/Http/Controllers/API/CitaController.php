<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cita;
use App\Models\Paciente;
use Carbon\Carbon;
use Validator;

class CitaController extends BaseController
{
    public function autocomplete(Request $request){
        $search = $request->get('term');
        $data = Paciente::where('nombre','LIKE',"%".$search."%")
                ->orWhere('paterno','LIKE',"%".$search."%")
                ->orWhere('materno','LIKE',"%".$search."%")
                ->orWhere('rfc','LIKE',"%".$search."%")
                ->get();
        $items = array();
        foreach($data as $paciente){
            $items[] = array('label'=>$paciente->rfc." ".$paciente->nombre_completo,'value'=>$paciente->rfc);
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
        $messages = [
            'required' => ':attribute es un dato requerido.',
            'exists' => ':attribute no esta registrado.',
        ];
        $rules=[
            'id_paciente' => 'required|exists:paciente,rfc',
            'fecha_hora' => 'required',
        ];
        $validator = Validator::make($input,$rules,$messages);
        if($validator->fails()){
            return $this->sendErrorResponse( $validator->errors()->first(),$validator->errors());
        }
        $id_paciente=$input['id_paciente'];
        try {
            $cita_inicio=Carbon::createFromFormat('Y-m-d H:i',$input['fecha_hora']);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Error en el formato de la fecha',[]);
        }
        if($cita_inicio->lessThanOrEqualTo(Carbon::now())){
            return $this->sendErrorResponse("No puede crearse una cita para el pasado",[]);
        }
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
        $citas_dia=Cita::whereDate('fecha_hora','=',$cita_inicio)->get();
        foreach ($citas_dia as $cita){
            if($id_paciente==$cita->paciente_id)
            {
                return $this->sendErrorResponse("Ya hay una cita hoy para ese paciente",[]);
            }
        }
        $cita=Cita::create([
            'id_paciente' => $id_paciente,
            'fecha_hora'=> $input['fecha_hora'],
        ]);
        return $this->sendDone('La cita fue creada correctamente');
    }
    public function show($id)
    {
        $cita = Cita::find($id);
        if (is_null($cita)) {
            return $this->sendError('No se encontr?? la cita con ese id');
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
