<table id="calculoCalorias" class="table table-responsive fcol">
  <thead>
    <th>Grupos de alimentos</th>
    <th>Equivalente</th>
    <th>Energía (Kcal)</th>
    <th>Proteina (g)</th>
    <th>Lípidos (g)</th>
    <th>Hidratos de carbono (g)</th>
  </thead>
  <tbody>
    <tr>
      <th>Cereales y tubérculos</th>
      <td id="plan_cereales">{{$consulta->planAlimenticio->cereales}}</td>
      <td id="energia_cereales">-</td>
      <td id="proteina_cereales">-</td>
      <td id="lipidos_cereales">-</td>
      <td id="hidratos_cereales">-</td>
    </tr>
    <tr>
      <th>Leguminosas</th>
      <td id="plan_leguminosas">{{$consulta->planAlimenticio->leguminosas}}</td>
      <td id="energia_leguminosas">-</td>
      <td id="proteina_leguminosas">-</td>
      <td id="lipidos_leguminosas">-</td>
      <td id="hidratos_leguminosas">-</td>
    </tr>
    <tr>
      <th>Verduras</th>
      <td id="plan_verduras">{{$consulta->planAlimenticio->verduras}}</td>
      <td id="energia_verduras">-</td>
      <td id="proteina_verduras">-</td>
      <td id="lipidos_verduras">-</td>
      <td id="hidratos_verduras">-</td>
    </tr>
    <tr>
      <th>Frutas</th>
      <td id="plan_frutas">{{$consulta->planAlimenticio->frutas}}</td>
      <td id="energia_frutas">-</td>
      <td id="proteina_frutas">-</td>
      <td id="lipidos_frutas">-</td>
      <td id="hidratos_frutas">-</td>
    </tr>
    <tr>
      <th>Carnes</th>
      <td id="plan_carnes">{{$consulta->planAlimenticio->carnes}}</td>
      <td id="energia_carnes">-</td>
      <td id="proteina_carnes">-</td>
      <td id="lipidos_carnes">-</td>
      <td id="hidratos_carnes">-</td>
    </tr>
    <tr>
      <th>Lácteos</th>
      <td id="plan_lacteos">{{$consulta->planAlimenticio->lacteos}}</td>
      <td id="energia_lacteos">-</td>
      <td id="proteina_lacteos">-</td>
      <td id="lipidos_lacteos">-</td>
      <td id="hidratos_lacteos">-</td>
    </tr>
    <tr>
      <th>Grasas</th>
      <td id="plan_grasas">{{$consulta->planAlimenticio->grasas}}</td>
      <td id="energia_grasas">-</td>
      <td id="proteina_grasas">-</td>
      <td id="lipidos_grasas">-</td>
      <td id="hidratos_grasas">-</td>
    </tr>
    <tr>
      <th>Azúcares</th>
      <td id="plan_azucares">{{$consulta->planAlimenticio->azucares}}</td>
      <td id="energia_azucares">-</td>
      <td id="proteina_azucares">-</td>
      <td id="lipidos_azucares">-</td>
      <td id="hidratos_azucares">-</td>
    </tr>
    <tr>
      <th>Total</th>
      <td></td>
      <td id="energia_suma">-</td>
      <td id="proteina_suma">-</td>
      <td id="lipidos_suma">-</td>
      <td id="hidratos_suma">-</td>
    </tr>
  </tbody>
</table>
<!-- <table class="table table-responsive fcol">
  <thead>
    <th>Grupos de alimentos</th>
    <th>Equivalente</th>
    <th>Energia (Kcal)</th>
    <th>Proteina (g)</th>
    <th>Lipidos (g)</th>
    <th>Hidratos de carbono (g)</th>
  </thead>
  <tbody>
    <tr>
      <th>Cereales y tubérculos</th>
      <td>{{$consulta->planAlimenticio->cereales}}</td>
      <td>{{$consulta->planAlimenticio->cereales*70}}</td>
      <td>{{$consulta->planAlimenticio->cereales*2}}</td>
      <td>{{$consulta->planAlimenticio->cereales*2}}</td>
      <td>{{$consulta->planAlimenticio->cereales*15}}</td>
    </tr>
    <tr>
      <th>Leguminosas</th>
      <td>{{$consulta->planAlimenticio->leguminosas}}</td>
      <td>{{$consulta->planAlimenticio->leguminosas*105}}</td>
      <td>{{$consulta->planAlimenticio->leguminosas*6}}</td>
      <td>{{$consulta->planAlimenticio->leguminosas*1}}</td>
      <td>{{$consulta->planAlimenticio->leguminosas*18}}</td>
    </tr>
    <tr>
      <th>Verduras</th>
      <td>{{$consulta->planAlimenticio->verdura}}</td>
      <td>{{$consulta->planAlimenticio->verdura*25}}</td>
      <td>{{$consulta->planAlimenticio->verdura*2}}</td>
      <td>{{$consulta->planAlimenticio->verdura*0}}</td>
      <td>{{$consulta->planAlimenticio->verdura*4}}</td>
    </tr>
    <tr>
      <th>Fruta</th>
      <td>{{$consulta->planAlimenticio->frutas}}</td>
      <td>{{$consulta->planAlimenticio->frutas*60}}</td>
      <td>{{$consulta->planAlimenticio->frutas*0}}</td>
      <td>{{$consulta->planAlimenticio->frutas*0}}</td>
      <td>{{$consulta->planAlimenticio->frutas*12}}</td>
    </tr>
    <tr>
      <th>Carne</th>
      <td>{{$consulta->planAlimenticio->carne}}</td>
      <td>{{$consulta->planAlimenticio->carne*75}}</td>
      <td>{{$consulta->planAlimenticio->carne*7}}</td>
      <td>{{$consulta->planAlimenticio->carne*5}}</td>
      <td>{{$consulta->planAlimenticio->carne*0}}</td>
    </tr>
    <tr>
      <th>Leche</th>
      <td>{{$consulta->planAlimenticio->leche}}</td>
      <td>{{$consulta->planAlimenticio->leche*145}}</td>
      <td>{{$consulta->planAlimenticio->leche*9}}</td>
      <td>{{$consulta->planAlimenticio->leche*8}}</td>
      <td>{{$consulta->planAlimenticio->leche*12}}</td>
    </tr>
    <tr>
      <th>Grasas</th>
      <td>{{$consulta->planAlimenticio->grasas}}</td>
      <td>{{$consulta->planAlimenticio->grasas*45}}</td>
      <td>{{$consulta->planAlimenticio->grasas*0}}</td>
      <td>{{$consulta->planAlimenticio->grasas*5}}</td>
      <td>{{$consulta->planAlimenticio->grasas*0}}</td>
    </tr>
    <tr>
      <th>Azúcares</th>
      <td>{{$consulta->planAlimenticio->azucares}}</td>
      <td>{{$consulta->planAlimenticio->azucares*20}}</td>
      <td>{{$consulta->planAlimenticio->azucares*0}}</td>
      <td>{{$consulta->planAlimenticio->azucares*0}}</td>
      <td>{{$consulta->planAlimenticio->azucares*10}}</td>
    </tr>
    <tr>
      <th>Total</th>
    </tr>
  </tbody>
</table> -->