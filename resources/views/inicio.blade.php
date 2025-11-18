@extends('layouts.app2')

@section('content')
<style>
table, thead, tbody, th, td, tr, caption{
border: 1px blue solid;
}

</style>
Hola mundo
<table>
<caption>PARTIDAS PRESUPUESTALES</caption>
<thead>
<tr>
<th>Partida</th>
<th>capitulo</th>
<th>Nombre</th>
<th>descripción</th>
<th>Estado</th>
<th>Nivel</th>
</tr>
</thead>
<tbody>
<tr>
<td>uno</td>
<td>dos</td>
<td>tres</td>
</tr>
<tr>
</tbody>
</table>
@endsection
