@extends('layouts.plantillaLogged')
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
      <h1>Próximas citas</h1>
    </div>
  </div>
  <div class="row">
    <p>Aqui va la tabla</p>
  </div>
  <div class="row justify-content-start">
    <div class="col">
      <p>
          ¿Sin previa cita? Haz click
          <a href="/nuevaConsulta">aqui</a>
      </p>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('api.js') }}"></script>
@endsection