@extends('layouts.plantillaNoLog')
@section('titulo')
    <title>Consultorio</title>
@endsection
@section('variables')
<script>var api_token = "{{ Auth::user()->api_token }}" </script>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <h1>Aqui va la consulta</h1>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <p>Datos del paciente</p>
    </div>
    <div class="col align-self-end">
      <p class="float-right">Fecha:
      La fecha de hoy ;v
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label>Nombre del paciente</label>
      <input type="text" name="nombre">
    </div>
    <div class="col">
      <label>Alegias</label>
      <input type="text" name="alergias">
    </div>
    <div class="col">
      <label>Actividad física</label>
      <input type="text" name="act_fis">
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label>Edad</label>
      <input type="number" name="nombre">
    </div>
    <div class="col">
      <label>Peso</label>
      <input type="number" name="alergias">
      <p>Kg</p>
    </div>
    <div class="col">
      <label>Estatura</label>
      <input type="number" name="act_fis">
      <p>cm</p>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label>Género</label>
      <select name="genero">
        <option value="masculino">H</option>
        <option value="femenino">M</option>
      </select>
    </div>
    <div class="col">
      <p>IMC: IMC_CALCULADO</p>
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
      <textarea rows="4" style="width:100%"></textarea>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label>Observaciones</label>
      <br>
      <textarea rows="4" style="width:100%"></textarea>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <table class="table">
        <thead>
          <tr>
            <th>Alimento</th>
            <th>Dieta habitual</th>
            <th>Plan de alimentación</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>Verduras</th>
            <td><input type="number" name="habitual_verduras"></td>
            <td>CalculoDeTabla</td>
          </tr>
          <tr>
            <th>Frutas</th>
            <td><input type="number" name="habitual_frutas"></td>
            <td>CalculoDeTabla</td>
          </tr>
          <tr>
            <th>AOA</th>
            <td><input type="number" name="habitual_aoa"></td>
            <td>CalculoDeTabla</td>
          </tr>
          <tr>
            <th>Cerales</th>
            <td><input type="number" name="habitual_cereales"></td>
            <td>CalculoDeTabla</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <table class="table" style="width:100%">
        <thead>
          <th>Grupos de alimentos</th>
          <th>Equivalente</th>
          <th>Energia (Kcal)</th>
          <th>Proteina (g)</th>
          <th>Lipidos (g)</th>
          <th>Hidratos de carbono (g)</th>
        </thead>
        <tbody>
          <tr>
            <th>Cereales y tubérculos</th>
            <td><input type="number" name="cer_tub_pa"></td>
          </tr>
          <tr>
            <th>Leguminosas</th>
            <td><input type="number" name="legum_pa"></td>
          </tr>
          <tr>
            <th>Verduras</th>
            <td><input type="number" name="ver_pa"></td>
          </tr>
          <tr>
            <th>Fruta</th>
            <td><input type="number" name="fru_pa"></td>
          </tr>
          <tr>
            <th>Carne</th>
            <td><input type="number" name="car_pa"></td>
          </tr>
          <tr>
            <th>Leche</th>
            <td><input type="number" name="lec_pa"></td>
          </tr>
          <tr>
            <th>Grasas</th>
            <td><input type="number" name="gra_pa"></td>
          </tr>
          <tr>
            <th>Azúcares</th>
            <td><input type="number" name="azu_pa"></td>
          </tr>
          <tr>
            <th>Total</th>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col">
      <table class="table" style="width:100%">
        <thead>
          <th>Nada</th>
          <th>Gramos</th>
          <th>Porcentajes</th>
          <th>Calorías</th>
        </thead>
        <tbody>
          <tr>
            <th>Proteina</th>
          </tr>
          <tr>
            <th>HdC</th>
          </tr>
          <tr>
            <th>Lípidos</th>
          </tr>
          <tr>
            <th>Total</th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row justify-content-end">
    <div class="col col-lg-1">
      <button onclick="window.location.href='/app';" class="float-right">Cancelar</button>
    </div>
    <div class="col col-lg-1">
      <button onclick="window.location.href='/app';" class="float-right">Aceptar</button>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('api.js') }}"></script>
@endsection