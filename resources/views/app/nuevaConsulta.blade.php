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
      <h1>Aqui va la consulta</h1>
    </header>
  </div>
  <div class="row justify-content-end">
    <div class="col col-lg-1">
      <button onclick="window.location.href='/app';" >Cancelar</button>
    </div>
    <div class="col col-lg-1">
      <button onclick="window.location.href='/app';" >Aceptar</button>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('api.js') }}"></script>
@endsection