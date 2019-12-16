<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cita;
use App\Consulta;
use App\Paciente;
use App\DietaHabitual;
use App\PlanAlimenticio;
use Carbon\Carbon;
use Validator;

class consultaController extends BaseController
{
    public function consultasPaciente($id){
        $consultas=Paciente::find($id)->consultas;
        return $this->sendResponse($consultas->toArray(),'Todas las consultas del paciente');
    }
    public function index()
    {
        $consulta = Consulta::all();
        return $this->sendResponse($consulta->toArray(), 'Todas las consultas fueron enviadas');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $cita_id=Null;
        if(array_key_exists('cita_id',$input)){
            $cita_id=$input['cita_id'];
            $paciente=Cita::find($cita_id)->paciente;
            $fecha_hora=Cita::find($cita_id)->fecha_hora;
        }
        else{
            $validator = Validator::make($input, [
                // 'nombre' => 'required|unique:animales,nombre'
                'rfc' => 'required|unique:pacientes,rfc',
                'nombre' => 'required',
                'estatura' => 'required',
                'peso' => 'required',
                'fecha_nacimiento' => 'required',
                'genero' => 'required',
            ]);
            if($validator->fails()){
                return $this->sendErrorResponse('Error en la validacion',$validator->errors());
            }
            $alergias='';
            if(array_key_exists('alergias',$input)){
                $alergias=$input['alergias'];
            }
            $actividad_fisica='';
            if(array_key_exists('actividad_fisica',$input)){
                $actividad_fisica=$input['actividad_fisica'];
            }
            $paciente=Paciente::create([
                'rfc' => $input['rfc'],
                'nombre' => $input['nombre'],
                'estatura'=> $input['estatura'],
                'peso' => $input['peso'],
                'fecha_nacimiento' => $input['fecha_nacimiento'],
                'genero' => $input['genero'],
                'alergias' => $alergias,
                'actividad_fisica' => $actividad_fisica,
            ]);
            $fecha_hora=Carbon::now()->format('Y-m-d');
        }
        $descripcion_dieta='';
        if(array_key_exists('descripcion_dieta',$input)){
            $descripcion_dieta=$input['descripcion_dieta'];
        }
        $observaciones='';
        if(array_key_exists('observaciones',$input)){
            $observaciones=$input['observaciones'];
        }
        $consulta = Consulta::create([
            'user_id' => Auth::user()->id,
            'paciente_id' => $paciente->rfc,
            'cita_id' => $cita_id,
            'descripcion_dieta' => $descripcion_dieta,
            'observaciones' => $observaciones,
            'fecha_hora' => $fecha_hora,
            'edad_actual' => $paciente->edad,
            'peso_actual' => $paciente->peso,
            'estatura_actual' => $paciente->estatura,
            'actividad_fisica_actual' => $paciente->actividad_fisica,
        ]);
        $validator = Validator::make($input, [
            'verduras'=> 'required',
            'frutas'=> 'required',
            'aoa'=> 'required',
            'cereales'=> 'required',
        ]);
        if($validator->fails()){
            return $this->sendErrorResponse('Error en la validacion',$validator->errors());
        }
        $dietaHabitual=DietaHabitual::create([
            'verduras'=> $input['verduras'],
            'frutas'=> $input['frutas'],
            'aoa'=> $input['aoa'],
            'cereales'=> $input['cereales'],
            'consulta_id' => $consulta->id,
        ]);
        $validator = Validator::make($input,[
            'cereales' => 'required',
            'leguminosas' => 'required',
            'verdura' => 'required',
            'frutas' => 'required',
            'carne' => 'required',
            'leche' => 'required',
            'grasas' => 'required',
            'azucares' => 'required',
        ]);
        $planAlimenticio=PlanAlimenticio::create([
            'cereales' => $input['cereales'],
            'leguminosas' => $input['leguminosas'],
            'verdura' => $input['verdura'],
            'frutas' => $input['frutas'],
            'carne' => $input['carne'],
            'leche' => $input['leche'],
            'grasas' => $input['grasas'],
            'azucares' => $input['azucares'],
            'consulta_id' => $consulta->id,
        ]);
        return $this->sendResponse($consulta->toArray(), 'Consulta almacenada correctamente');
    }
    public function show($id)
    {
        $consulta = Consulta::find($id);
        if (is_null($consulta)) {
            return $this->sendError('No se encontró la consulta con ese id');
        }
        
        return $this->sendResponse($consulta->toArray(), 'Consulta encontrada');
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
         $consulta=Consulta::where('id', $id)->update($request->all());
        return $this->sendDone('Consulta actualizada');
    }

    public function destroy($id)
    {
        $consulta=Consulta::where('id', $id);
        $consulta->delete();
        return $this->sendResponse([], 'La consulta fue eliminada correctamente');
    }
}
