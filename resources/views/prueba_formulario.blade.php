@if(count($consultas)>0)
<div class="row justify-content-center">
    <div class="col-md-9">
        <table class="table">
            <thead>
                <tr>
                    <th>Paciente</th>
                    <th>Fecha</th>
                    <th>Atendido por</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultas as $consulta)
                <tr>
                    <td>
                        <a href="#" onclick="consultasAnteriores('{{ $consulta->paciente->rfc }}')">{{ $consulta->paciente->nombre }}</a>
                    </td>

                    <td>{{ $consulta->fecha }} {{ $consulta->hora }}</td>
                    <td>{{ $consulta->user->nombre }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $consultas->links() }}
    </div>
</div>
@else
<div class="row">
    <div class="col">
        <h3>Aún no se han realizado consultas</h3>
    </div>
</div>
@endif