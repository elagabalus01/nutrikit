@extends('layouts.plantillaLogged')
@section('titulo')
    <title>Crear una nueva cita</title>
@endsection
@section('content')
<div class="container">
    <h1>Buscar nombre</h1>
    {{ csrf_field() }}
    <input id="search" name="search" type="text" class="form-control ui-autocomplete-input" placeholder="Search" />
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    // $("#search").autocomplete({
    //     source:obtenerElementos()
    // });
    // function obtenerElementos(request,response){
    //     $.ajax({
    //         url: '/autocomplete',
    //         dataType: "json",
    //         type:"post",
    //         data: {
    //             text: $("#search").val(),
    //             _token:'{{csrf_token()}}'
    //         }
    //     }).done(function(result) {
    //         var resp=$.map(result,function(obj){
    //             return obj.nombre;
    //         });
    //         response(resp);
    //     });
    // };
    $("#search").autocomplete(
    {
        source: function(request, response){
            $.ajax({
                url: '/api/autocomplete',
                type:"post",
                data: {
                    term : request.term,
                },
                dataType: "json",
                success: function(data){
                    response(data);
                }
            });
        },
        minLength: 2,

    });
</script>
@endsection