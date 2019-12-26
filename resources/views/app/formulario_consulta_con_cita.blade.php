@extends('layouts.plantillaNoLog')
@section('titulo')
<title>NUTRIKIT</title>
@endsection
@section('variables')
<script>var api_token = "{{ Auth::user()->api_token }}" </script>
<script>var citaID = "{{$cita->id}}" </script>
<script>var rfc = "{{$cita->paciente->rfc}}" </script>
@endsection
@section('content')

<div class="container">
    <div class="row">
      <div class="col align-self-end">
        <label class="float-right">Fecha:
        {{ $cita->fecha }}
        </label>
      </div>
    </div>

<!-- Datos del paciente --> 

    <div class="row">
      <div class="col">
        <h1>Datos del paciente</h1>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label>RFC: {{ $cita->paciente->rfc }}</label>
      </div>
      <div class="col">
        <label>Nombre: {{ $cita->paciente->nombre}}</label>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label>Sexo: {{ $cita->paciente->sexo }}</label>
      </div>
      <div class="col">
        <label>Fecha de nacimiento: 
          {{ $cita->paciente->cumpleaños }} 
        </label>
      </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Edad: {{ $cita->paciente->edad }}</label>
          <label>Años</label>
        </div>
        <div class="col">
          <label id="imc">IMC: {{ number_format($cita->paciente->peso/pow($cita->paciente->estatura/100,2),2) }}</label>
       </div>
    </div>

    <div class="form-group row">
        <div class="col">
          <label id="correo">Correo:
            {{ $cita->paciente->correo_electronico }}
          </label>
          <input style="display:none;" id='correo_electronico' placeholder='correo'></input>
          <button id="editarCorreo">Editar</button>
          <button style="display:none;" id='aceptarCorreo'>Aceptar</button>
          <div id="correo_electronicoValid" class="valid-feedback">Aceptado</div>
          <div id="correo_electronicoInvalid" class="invalid-feedback">Correo no valido</div>
        </div>        
        <div class="col">
          <label id="tel">Telefono:
            {{ $cita->paciente->telefono }}
          </label>
          <input style="display:none;" maxlength="10" placeholder='telefono' type="tel" id="telefono">
          <button id="editarTel">Editar</button>
          <button style="display:none;" id='aceptarTel'>Aceptar</button>
          <div id="telefonoValid" class="valid-feedback">Aceptado</div>
          <div id="telefonoInvalid" class="invalid-feedback">Telefono no valido</div>
        </div>
    </div>

   <!-- Características del paciente --> 
    
    <div class="row">
      <div class="col">
        <h1>Características del paciente</h1>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label id="peso_old">Peso:
          {{ $cita->paciente->peso }}
        </label>
        <input style="display:none;" min='0.5' max='500' step="0.01" type="number" id="peso">
        <label>Kg</label>
        
        <button id="editarPeso">Editar</button>
        <button style="display:none;" id='aceptarPeso'>Aceptar</button>

        <div id="pesoValid" class="valid-feedback">Aceptado</div>
        <div id="pesoInvalid" class="invalid-feedback">Peso no valido</div>
      </div>
      <div class="col">
        <label id="estatura_lab">Talla:
          {{ $cita->paciente->estatura }}
        </label>
        <input style="display:none;" min='1' max='255' step="1" type="number" id="estatura">
        <label>cm</label>

        <button style="display:none;" id='aceptarEstatura'>Aceptar</button>
        <button id="editarEstatura">Editar</button>

        <div id="estaturaValid" class="valid-feedback">Aceptado</div>
        <div id="estaturaInvalid" class="invalid-feedback">Estatura no valida</div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label id="actividad_fisica_lab">Actividad física:
          {{ $cita->paciente->actividad_fisica }}
        </label>
        <input style="display:none;" maxlength="100" type="text" id="actividad_fisica">
        
        <button id='editar_actividad_fisica'>Editar</button>
        <button style="display:none;" id='aceptar_actividad_fisica'>Aceptar</button>
        
        <div id="actividad_fisicaValid" class="valid-feedback">Aceptado</div>
        <div id="actividad_fisicaInvalid" class="invalid-feedback">Texto no valido</div>
      </div>
      <div class="col">
        <label id="alergias_lab">Alergias:
          {{ $cita->paciente->alergias }}
        </label>
        <input style="display:none;" maxlength="100" type="text" id="alergias">
        
        <button id="editarAlergias">Editar</button>
        <button style="display:none;" id='aceptarAlergias'>Aceptar</button>
        
        <div id="alergiasValid" class="valid-feedback">Aceptado</div>
        <div id="alergiasInvalid" class="invalid-feedback">Texto no valido</div>
      </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Porcentaje de grasa:</label>
          <input min='0' max='100' type="number" id="grasa_porcentaje">
          <label>%</label>
          <div id="grasa_porcentajeValid" class="valid-feedback">Aceptado</div>
          <div id="grasa_porcentajeInvalid" class="invalid-feedback">Porcentaje no valido</div>
        </div>
        <div class="col">
          <label>Porcentaje de músculo:</label>
          <input min='0' max='100' type="number" id="musculo_porcentaje">
          <label>%</label>
          <div id="musculo_porcentajeValid" class="valid-feedback">Aceptado</div>
          <div id="musculo_porcentajeInvalid" class="invalid-feedback">Porcentaje no valido</div>
        </div>
    </div>

    <div class="row">
        <div class="col">
          <label>Hueso:</label>
          <input min='1' max='100' type="number" id="hueso_kilos">
          <label>kg</label>
          <div id="hueso_kilosValid" class="valid-feedback">Aceptado</div>
          <div id="hueso_kilosInvalid" class="invalid-feedback">Peso no valido</div>
        </div>
        <div class="col">
          <label>Agua:</label>
          <input min='1' max='100' type="number" id="agua_litros">
          <label>L</label>
          <div id="agua_litrosValid" class="valid-feedback">Aceptado</div>
          <div id="agua_litrosInvalid" class="invalid-feedback">Cantidad no valida</div>
        </div>
    </div>    


  <div class="row">
    <div class="col">
      <h1>Consulta</h1>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label>Dieta habitual</label>
      <br>
      <textarea rows="4" style="width:100%" id="descripcion_dieta"></textarea>
      <div id="descripcion_dietaValid" class="valid-feedback">Aceptado</div>
      <div id="descripcion_dietaInvalid" class="invalid-feedback">Sólo se aceptan hasta 1024 carácteres</div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label>Observaciones</label>
      <br>
      <textarea rows="4" style="width:100%" id="observaciones"></textarea>
      <div id="observacionesValid" class="valid-feedback">Aceptado</div>
      <div id="observacionesInvalid" class="invalid-feedback">Sólo se aceptan hasta 1024 carácteres</div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      @include('app.componentes.tablas_formularios.tablaHabitualPlan')
    </div>
  </div>
  <div class="row">
    <div class="col-md-7">
      @include('app.componentes.tablas_formularios.tablaCalculoCalorias')
    </div>
    <div class="col-md-5">
      @include('app.componentes.tablas_formularios.tabla_cal_res_final')
    </div>
  </div>
  <div class="row justify-content-end">
    <div class="col col-lg-1">
      <button onclick="window.location.href='/citas';" class="btn btn-danger float-right">Cancelar</button>
    </div>
    <div class="col col-lg-1">
      <button disabled="true" id="crearConsulta" class="btn btn-primary float-right">Aceptar</button>
    </div>
  </div>
  <div>
    <br>
  </div>
</div>
@include('app.componentes.mensajes.modalError')
@include('app.componentes.mensajes.modalSuccess')
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/consulta_cita.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/calculos_tablas.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/actualizaciones.js') }}"></script>
@endsection
