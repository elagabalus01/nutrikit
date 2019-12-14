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
use Validator;

class consultaController extends BaseController
{
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
        }
        else{
            $validator = Validator::make($input, [
                // 'nombre' => 'required|unique:animales,nombre'
                'nombre' => 'required',
                'estatura' => 'required',
                'peso' => 'required',
                'edad' => 'required',
                'genero' => 'required',
            ]);
            if($validator->fails()){
                return $this->sendErrorResponse('Error en la validacion',$validator->errors());
            }
            $alergias='';
            if(array_key_exists('alergias',$input)){
                $alergias=$input['alergias'];
            }
            $actividadFisica='';
            if(array_key_exists('actividadFisica',$input)){
                $actividadFisica=$input['actividadFisica'];
            }
            $paciente=Paciente::create([
                'nombre' => $input['nombre'],
                'estatura'=> $input['estatura'],
                'peso' => $input['peso'],
                'edad' => $input['edad'],
                'genero' => $input['genero'],
                'alergias' => $alergias,
                'actividadFisica' => $actividadFisica,
            ]);
        }
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
        ]);
        $observaciones='';
        if(array_key_exists('observaciones',$input)){
            $actividadFisica=$input['observaciones'];
        }
        $fechaHora='La fecha de ahorita';
        $consulta = Consulta::create([
            'user_id' => Auth::user()->id,
            'paciente_id' => $paciente->id,
            'cita_id' => $cita_id,
            'dietaHabitual_id' => $dietaHabitual->id,
            'planAlimenticio_id' => $planAlimenticio->id,
            'observaciones' => $observaciones,
            'fechaHora' => $fechaHora,
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