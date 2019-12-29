<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Cita;
use App\Consulta;
use App\Paciente;
use App\DietaHabitual;
use App\PlanAlimenticio;
use Carbon\Carbon;
use Validator;

class ConsultaController extends BaseController
{
    public function formulario(){
        $consultas=Consulta::whereDate('fecha_hora','=',Carbon::today()->toDateString())
                        ->orderBy('fecha_hora', 'asc')
                        ->paginate(1);

        return Response::json(View::make('prueba_formulario', array('consultas' => $consultas))->render());
        // return view('prueba_formulario',compact('consultas'));
    }
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
        $messages = [
            'required' => 'El :attribute es un dato requerido.',
        ];
        $validator = Validator::make($input, [
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
        ],$messages);
        if($validator->fails()){
            return $this->sendErrorResponse($validator->errors()->first(),$validator->errors());
        }
        if(array_key_exists('cita_id',$input)){
            $cita_id=$input['cita_id'];
            $cita=Cita::find($cita_id);
            $paciente=$cita->paciente;
            $fecha_hora=$cita->fecha_hora;
            $cita->atendida=true;
            $cita->save();
        }
        else{
            $messages = [
            'required' => ':attribute es un dato requerido.',
            'unique' => ':attribute ya esta registrado.',
            ];
            $validator = Validator::make($input, [
                'rfc' => 'required|unique:pacientes,rfc',
                'nombre' => 'required',
                'estatura' => 'required',
                'peso' => 'required',
                'fecha_nacimiento' => 'required',
                'sexo' => 'required',
                'grasa_porcentaje' => 'required',
                'musculo_porcentaje' => 'required',
                'hueso_kilos' => 'required',
                'agua_litros' => 'required',
                // Se valida que esten los porcentajes
                'proteinas_porcentaje' => 'required',
                'hidratos_porcentaje' => 'required',
                'lipidos_porcentaje' => 'required',
            ],$messages);
            if($validator->fails()){
                return $this->sendErrorResponse($validator->errors()->first(),$validator->errors());
            }
            $telefono='';
            if(array_key_exists('telefono',$input) && strlen($input['telefono'])>0){
                $telefono=$input['telefono'];
            }
            $correo_electronico='';
            if(array_key_exists('correo_electronico',$input) && strlen($input['correo_electronico'])>0){
                $correo_electronico=strtolower($input['correo_electronico']);
            }
            $alergias='';
            if(array_key_exists('alergias',$input) && strlen($input['alergias'])>0){
                $alergias=$input['alergias'];
            }
            $actividad_fisica='';
            if(array_key_exists('actividad_fisica',$input) && strlen($input['actividad_fisica'])>0){
                $actividad_fisica=$input['actividad_fisica'];
            }
            $paciente=Paciente::create([
                'rfc' => strtoupper($input['rfc']),
                'nombre' => ucwords($input['nombre']),
                'telefono' => $telefono,
                'correo_electronico' => $correo_electronico,
                'estatura'=> $input['estatura'],
                'peso' => $input['peso'],
                'fecha_nacimiento' => $input['fecha_nacimiento'],
                'sexo' => ucwords($input['sexo']),
                'alergias' => $alergias,
                'actividad_fisica' => $actividad_fisica,
            ]);
            $fecha_hora=Carbon::now()->format('Y-m-d H:i');
        }
        $descripcion_dieta='';
        if(array_key_exists('descripcion_dieta',$input) && strlen($input['descripcion_dieta'])>0 ){
            $descripcion_dieta=$input['descripcion_dieta'];
        }
        $observaciones='';
        if(array_key_exists('observaciones',$input) && strlen($input['observaciones'])>0){
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
            'grasa_porcentaje' => $input['grasa_porcentaje'],
            'musculo_porcentaje' => $input['musculo_porcentaje'],
            'hueso_kilos' => $input['hueso_kilos'],
            'agua_litros' => $input['agua_litros'],
            // Se valida que esten los porcentajes
            'proteinas_porcentaje' => $input['proteinas_porcentaje'],
            'hidratos_porcentaje' => $input['hidratos_porcentaje'],
            'lipidos_porcentaje' => $input['lipidos_porcentaje'],
        ]);
        $dietaHabitual=DietaHabitual::create([
            'cereales' => $input['dieta_cereales'],
            'leguminosas' => $input['dieta_leguminosas'],
            'verduras' => $input['dieta_verduras'],
            'frutas' => $input['dieta_frutas'],
            'carnes' => $input['dieta_carnes'],
            'lacteos' => $input['dieta_lacteos'],
            'grasas' => $input['dieta_grasas'],
            'azucares' => $input['dieta_azucares'],
            'consulta_id' => $consulta->id,
        ]);
        $planAlimenticio=PlanAlimenticio::create([
            'cereales' => $input['plan_cereales'],
            'leguminosas' => $input['plan_leguminosas'],
            'verduras' => $input['plan_verduras'],
            'frutas' => $input['plan_frutas'],
            'carnes' => $input['plan_carnes'],
            'lacteos' => $input['plan_lacteos'],
            'grasas' => $input['plan_grasas'],
            'azucares' => $input['plan_azucares'],
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
