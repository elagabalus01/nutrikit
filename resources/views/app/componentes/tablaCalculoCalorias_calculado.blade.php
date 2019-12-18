<table class="table table-responsive fcol">
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
      <td>{{}}</td>
      <td>{{$consulta->planAlimenticio->cereales*70+}}</td>
    </tr>
  </tbody>
</table>