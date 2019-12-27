<div class="row justify-content-center">
    <div class="col-md-4">
        <h3>Generar reporte por mes</h3>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-4 align-self-end">
        <label>Mes:</label>
        <select id="mes">
            <option value="01">Enero</option>
            <option value="02">Febrero</option>
            <option value="03">Marzo</option>
            <option value="04">Abril</option>
            <option value="05">Mayo</option>
            <option value="06">Junio</option>
            <option value="07">Julio</option>
            <option value="08">Agosto</option>
            <option value="09">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>
        <label>Año:</label>
        <select id="año">
            @php
            $fecha = Carbon\Carbon::Now()->format('Y');
            intval($fecha);
            for ($i = 0; $i <= 10; $i++) {
                printf( "<option value='%s'>%s</option>",strval($fecha-$i),strval($fecha-$i)); 
            }
            @endphp
        </select>
        <button class="btn btn-primary" id="generar">Generar</button>
        <div id="mesReporteValid" class="valid-feedback">Aceptado</div>
        <div id="mesReporteInvalid" class="invalid-feedback">Fecha no valida</div>
    </div>
</div>