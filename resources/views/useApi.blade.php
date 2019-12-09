@extends('layouts.plantillaBarras')
@section('titulo')
    <title>Manejador de animales</title>
@endsection
@section('variables')
<script>var api_token = "{{ Auth::user()->api_token }}" </script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <header>
                <h1>Animales</h1>
            </header>
        </div>
        <h3>Hola {{ Auth::user()->name }} </h3>
        <div class="row">
            <div class="col-md-3">
                <table class="table" id="displayTable">
                    <thead>
                        <th>ID</th>
                        <th>Animal</th>
                    </thead>
                        @forelse($animales as $animal)
                    <tr>
                      <td><button id="{{$animal->id}}" class="eliminar">Eliminar</button></td>
                      <td>{{$animal->id}}</td>
                      <td id="{{$animal->id}}" class="nombre">{{$animal->nombre}}</td>
                      <td><button id="{{$animal->id}}" class="editar">Actualizar</button></td>
                    </tr>
                        @empty
                        <tr>
                        <td>Aun no hay nada</td>
                        </tr>
                        @endforelse
                    <tr>
                    <td>{{$animales->links()}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- <div class="row">
            <section>
                <div class="col-md-12">
                    <h2>Aqui se despliegan los animales</h2>
                    <p id="listarAnimales"></p>
                    <button id="mostrarAnimales">
                        Mostrar animales
                    </button>
                </div>
            </section>
        </div> -->
       <div class="row">
                <section>
                    <div class="col-md-12">
                        <h2>Aqui se agregan los animales</h2>
                        <section id="crearAnimales">
                            <label>Nombre</label>
                            <input id="inputNombre" type="text" name="nombre">
                            <div class="valid-feedback">Looks good!</div>
                            <input id="inputCita" type="datetime-local" name="citaDate">
                            <button id="guardarAnimal">Crear animal</button>
                        </section>
                    </div>
                </section>
            </div>
   </div>
        <div class="container">
            <div class="modal" tabindex="-1" role="dialog" id="error">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>El animal agregado ya esta registrado</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>    
            <div class="modal" tabindex="-1" role="dialog" id="errorVacio">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>El animal agregado ya esta registrado</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div> 
        </div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('api.js') }}"></script>
@endsection