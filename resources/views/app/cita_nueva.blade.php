@extends('layouts.plantillaLogged')
@section('titulo')
    <title>Crear una nueva cita</title>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h1>Datos del paciente y selección de fecha</h1>
    </div>
  </div>
  <div class="row">
    <br>
  </div>
  <div class="form-group row justify-content-center">
    <label class="col-md-2 col-form-label">RFC del paciente</label>
    <div class="col-md-3">
        <input id="searchRfc" name="rfc" type="text" class="form-control ui-autocomplete-input" placeholder="nombre o rfc del paciente" />
    </div>
  </div>
  <div class="form-group row justify-content-center">
    <label class="col-md-2 col-form-label">Fecha y hora</label>
    <div class="col-md-3">
        <input class="form-control" id="fechaHora" type="datetime-local" min="2019-12-17" value="2019-12-18T13:45:00" id="dia_hora">
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-5">
      <button type="submit" class="btn btn-primary float-right">Aceptar</button>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/nueva_cita.js') }}"></script>
<script type="text/javascript">
  var mydate = new Date().toLocaleString();
  // var mydate = new Date().toUTCString();
  console.log(mydate);
  // var today = new Date().toJSON(); 
  // $('#fechaHora').attr({
  //   'min':today.slice(0,19),
  //   'value':today.slice(0,19)
  // });
</script>
@endsection