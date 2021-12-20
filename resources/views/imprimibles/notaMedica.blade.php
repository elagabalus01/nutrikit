<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<style type="text/css">
    /*p{
        font-size: 20px;
    }*/
    th, td {
        text-align: center;
        /*font-size: 20px;*/
    }
    table{
        margin-left:auto; 
        margin-right:auto;
    }
    body{
        margin-bottom: 48px;
        margin-top: 48px;
        margin-right:50px;
        margin-left:50px;
    }
</style>
<body>
    <p>
        P: Paciente {{ strtolower($consulta->paciente->sexo) }} de {{ $consulta->paciente->edad }} años que acude a consulta de nutrición<br>
        S: {{ $consulta->motivo }} <br>
        O: con un peso de {{ $consulta->info_paciente->peso }} kg y un IMC de {{ number_format($consulta->info_paciente->peso/pow($consulta->info_paciente->estatura/100,2),2) }} kg/m2.<br>
        Enfermedades: {{ $consulta->info_paciente->enfermedades }}<br>
        Intolerancia o alergia: {{ $consulta->info_paciente->alergias }}<br>
        Actividad física: {{ $consulta->info_paciente->actividad_fisica }}<br>
    </p>
    <p>
        A: dieta habitual de {{ $consulta->dietaHabitual->total_calorias }} kcal.
    </p>
    <p>
        Dieta habitual: 
        {{ $consulta->descripcion_dieta }}
    </p>
    <p>
        @include('app.componentes.tablas_calculada.tablaHabitualPlan_calculado')
    </p>
    <p>
        P: Se le da plan de alimentación de {{ $consulta->planAlimenticio->total_calorias }} kcal.
    </p>

    <p>
        OBSERVACIONES:
        {{ $consulta->observaciones }}
    </p>
    <p>
        Se le explicó al paciente la importancia de: <br>
        - Consumir todos los grupos de alimentos durante todo el día en los distintos tiempos de comida. <br>
        - Evitar saltarse las colaciones o algún tiempo de comida <br>
        - Evitar y de ser posible eliminar los alimentos con alto contenido de azúcar simple y/o grasas saturadas <br>
        - No cocinar alimentos fritos, capeados, empanizados o dorados, siempre preferir lo asado, al horno, a la parrilla o a la plancha <br>
        - Preferir alimentos naturales en vez de los enlatados o embolsados ya que tienen un alto contenido en sodio y conservadores.<br>
        - Tomar de 1.5 a 2 litros de agua natural.<br>
        - Realizar mínimo 30 minutos de ejercicio al día <br>
    </p>
</body>
</html>
