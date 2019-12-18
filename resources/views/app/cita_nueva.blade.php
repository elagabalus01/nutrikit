@extends('layouts.plantillaLogged')
@section('titulo')
    <title>Crear una nueva cita</title>
@endsection
@section('content')
<div class="container">
  @if(count(App\Paciente::all())>0)
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
        <input class="form-control" id="fechaHora" type="datetime-local" min="{{ substr(Carbon\Carbon::now()->toAtomString(),0,16) }}" value="{{ substr(Carbon\Carbon::now()->toAtomString(),0,16) }}" id="dia_hora">
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-5">
      <button type="submit" class="btn btn-primary float-right">Aceptar</button>
    </div>
  </div>
  @else
  <div class="row">
    <div class="col-md-8">
      <h1>Aún no hay pacientes</h1>
    </div>
  </div>
  @endif


</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/nueva_cita.js') }}"></script>
<script type="text/javascript">
  function getLocalDateTime(){
    var d = new Date();
    var tz = d.toString().split("GMT")[1].split(" (")[0]; // timezone, i.e. -0700
    console.log(tz);
    console.log(d.toJSON());
  }
  getLocalDateTime();
  // var options={dateStyle:'full',hour:'2-digit'};
  // var mydate = new Date().toLocaleString(options);
  // mydate=mydate.split('/');
  // mydate=mydate.join('-');
  // mydate=mydate.split(' ');
  // mydate=mydate.join('T');
  // console.log(mydate);

  // $('#fechaHora').attr({
  //   'min':today.slice(0,19),
  //   'value':today.slice(0,19)
  // });
</script>
@endsection