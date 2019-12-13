@extends('layouts.plantillaLogged')
@section('titulo')
    <title>Crear una nueva cita</title>
@endsection
@section('content')
<div class="container">
    <h1>Buscar nombre</h1>
    {{ csrf_field() }}
    <div class="input-group">
        <input id="search" name="search" type="text" class="form-control" placeholder="Search" />
    </div>
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
    $("#search").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '/autocomplete',
                type:"post",
                data: {
                    term : request.term,
                    _token: '{{csrf_token()}}'
                },
                dataType: "json",
                success: function(data){
                    var resp = $.map(data,function(obj){
                        return obj.nombre;
                    });  
                    response(resp);
                }
            });
        },
        minLength: 1
    });
</script>
@endsection