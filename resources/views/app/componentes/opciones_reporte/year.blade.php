<div class="row justify-content-center">
    <div class="col-md-4">
        <h3>Generar reporte por año</h3>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-4 align-self-end">
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