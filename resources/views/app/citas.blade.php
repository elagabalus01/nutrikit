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
    <header>
      <h1>Próximas citas</h1>
    </header>
  </div>
  <div class="row">
    <p>Aqui va la tabla</p>
  </div>
  <div class="row">
    <p>
        ¿Sin previa cita? Haz click
        <a href="/nuevaConsulta">aqui</a>
    </p>
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('api.js') }}"></script>
@endsection