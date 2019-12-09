@extends('layouts.plantillaPrincipal')
@section('titulo')
<title>Prueba</title>
@endsection
@section('content')
<div class="container">
    <h1>Hola mundo</h1>
    <div class="row">
        <div class="col-md-3">
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Animal</th>
                </thead>
                    @forelse($animales as $animal)
                <tr>
                    <td>{{$animal->id}}</td>
                    <td>{{$animal->nombre}}</td>
                </tr>
                    @empty
                    Aun no hay nada
                    @endforelse
                <tr>
                <td>{{$animales->links()}}</td>
                </tr>
            </table>
        </div>
    </div>

</div>
@endsection