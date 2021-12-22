<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cita;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Alimentacion;
use App\Models\InfoPaciente;
use App\Models\ComposicionCorporal;
use App\Models\Macros;
use App\Http\Controllers\API\ValidatorFactory;
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
        $validator=ValidatorFactory::dietaValidator($input);
        if($validator->fails()){
            return $this->sendErrorResponse($validator->errors()->first(),$validator->errors());
        }

        if(array_key_exists('cita_id',$input)){
            // Si es una cita con cita ya se tienen los datos del usuario
            $cita_id=$input['cita_id'];
            $cita=Cita::find($cita_id);
            $paciente=$cita->paciente;
            $info_paciente=$paciente->info;
            $fecha_hora=$cita->fecha_hora;
            $cita->atendida=true;
            $cita->save();
        }
        else{
            $validator=ValidatorFactory::pacienteValidator($input);
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
            $actividad_fisica='';
            if(array_key_exists('actividad_fisica',$input) && strlen($input['actividad_fisica'])>0){
                $actividad_fisica=$input['actividad_fisica'];
            }
            $alergias='';
            if(array_key_exists('alergias',$input) && strlen($input['alergias'])>0){
                $alergias=$input['alergias'];
            }
            $enfermedades='';
            if(array_key_exists('enfermedades',$input) && strlen($input['enfermedades'])>0){
                $enfermedades=$input['enfermedades'];
            }
            $materno='';
            if(array_key_exists('materno',$input) && strlen($input['materno'])>0){
                $materno=ucwords($input['materno']);
            }
            $paciente=Paciente::create([
                'rfc' => strtoupper($input['rfc']),
                'nombre' => ucwords($input['nombre']),
                'paterno' => ucwords($input['paterno']),
                'materno' => $materno,
                'telefono' => $telefono,
                'correo_electronico' => $correo_electronico,
                'fecha_nacimiento' => $input['fecha_nacimiento'],
                'sexo' => ucwords($input['sexo']),
            ]);
            $info_paciente=InfoPaciente::create([
                'rfc_paciente'=>strtoupper($input['rfc']),
                'estatura'=> $input['estatura'],
                'peso' => $input['peso'],
                'actividad_fisica' => $actividad_fisica,
                'alergias' => $alergias,
                'enfermedades' => $enfermedades,
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
        $macros=Macros::create([
            'proteinas' => $input['proteinas_porcentaje'],
            'hidratos' => $input['hidratos_porcentaje'],
            'lipidos' => $input['lipidos_porcentaje'],
        ]);

        $composicion=ComposicionCorporal::create([
            'rfc_paciente'=>strtoupper($paciente->rfc),
            'grasa_porcentaje' => $input['grasa_porcentaje'],
            'musculo_porcentaje' => $input['musculo_porcentaje'],
            'hueso_kilos' => $input['hueso_kilos'],
            'agua_litros' => $input['agua_litros'],
        ]);

        $dietaHabitual=Alimentacion::create([
            'cereales' => $input['dieta_cereales'],
            'leguminosas' => $input['dieta_leguminosas'],
            'verduras' => $input['dieta_verduras'],
            'frutas' => $input['dieta_frutas'],
            'carnes' => $input['dieta_carnes'],
            'lacteos' => $input['dieta_lacteos'],
            'grasas' => $input['dieta_grasas'],
            'azucares' => $input['dieta_azucares']
        ]);
        $planAlimenticio=Alimentacion::create([
            'cereales' => $input['plan_cereales'],
            'leguminosas' => $input['plan_leguminosas'],
            'verduras' => $input['plan_verduras'],
            'frutas' => $input['plan_frutas'],
            'carnes' => $input['plan_carnes'],
            'lacteos' => $input['plan_lacteos'],
            'grasas' => $input['plan_grasas'],
            'azucares' => $input['plan_azucares']
        ]);
        $consulta = Consulta::create([
            'id_medico' => Auth::user()->id,
            'id_paciente' => $paciente->rfc,
            'id_cita' => $cita_id,
            'id_composicion_corporal' => $composicion->id,
            'id_macros' => $macros->id,
            'id_info_paciente' => $info_paciente->id,
            'id_plan_alimenticio'=> $planAlimenticio->id,
            'id_dieta_habitual'=> $dietaHabitual->id,
            'motivo' => $input['motivo'],
            'descripcion_dieta' => $descripcion_dieta,
            'observaciones' => $observaciones,
            'fecha_hora' => $fecha_hora,
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
