@extends("layouts.app2")

@section('title', 'Partida Presupuestal')
<style>
.card{
//border:1px black solid;
}
table, tr, th, tbody, td{
border:1px solid cyan;
background-color: ;
}
thead, th{
background: linear-gradient(-90deg, #0000ff, #00ccff, #ffffff);
border:1px #0077ff solid;
}
tbody, td{
background: linear-gradient(90deg, #cccccc, #ffffff);
border:1px solid;
border-image: 1px linear-gradient(0deg, #000000, #aaaaaa); 
}

.btn-danger{
border:1px #777777 outset;
background:radial-gradient(#ff0000, #000000);

color: yellow;
}
.btn-info{
border:2px black outset;
background-color: #cfcfcf;
}

.btn-warning{
background-color: #cccccc;
border:2px cyan outset;
}

.d-inline{
//background-color: blue;
}
.btn-secondary{
background: linear-gradient(0deg, #0000ff, #00ffff);
color: #00ff00;
border: 1px black solid;
}
h4{
color: #00ff00;
border: 1px yellow solid;
background: linear-gradient(0deg, orange, #ff7700);
}
.card-body {
background: radial-gradient(white, silver);
}
.card{
background: linear-gradient(0deg, cyan, silver);
}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Detalle de Partida Presupuestal</h4>
                    <div>

                        <a href="{{ route('partidas_presupuestales.index') }}" 
                           class="btn btn-sm btn-secondary">
                            <i class="bi bi-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>


                            <tr>
                                <th width="30%" class="bg-light">Partida</th>
                                <td>{{ $partida_presupuestal->partida }}</td>
                            </tr>

                            <tr>
                                <th class="bg-light">Nombre</th>
                                <td>{{ $partida_presupuestal->nombre_partida }}
                       
                                </td>
                            </tr>

                            <tr>
                                <th class="bg-light">Descripcion</th>
                                <td>
                                    {{ $partida_presupuestal->descripcion_partida }}
                                </td>
                            </tr>


                            <tr>
                                <th class="bg-light">Estado</th>
                                <td>{{ $partida_presupuestal->estado_partida }}</td>
                            </tr>

                            <tr>
                                <th class="bg-light">Nivel</th>
                                <td>{{ $partida_presupuestal->nivel_partida }}</td>
                            </tr>
<tr>

                            
                        </tbody>
                    </table>

                    <!-- Botón de eliminar -->
                    <div class="mt-3">
                        <form action="{{ route('partidas_presupuestales.destroy', $partida_presupuestal->partida) }}" 
                              method="POST" 
                              onsubmit="return confirm('¿Está seguro de eliminar esta aseguradora?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Eliminar Partida Presupuestal
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection