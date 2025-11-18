
@extends("layouts.app2")


@section('content')
<style>
.card{
//border:1px black solid;
}
table, tr, th, tbody, td{
border:1px solid cyan;
background-color: ;
}
thead, th{
background: linear-gradient(180deg, #0000ff, #00ccff, #ffffff);
border:1px #0077ff solid;
}
tbody, td{
background: linear-gradient(0deg, #cccccc, #ffffff);
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
background: linear-gradient(45deg, #ffff00, gold);
border:2px #cccc00 outset;
color: gray;
}

.d-inline{
//background-color: blue;
}
.ver{
border: 1px #00ffff solid;
border-radius: 100%;
background: radial-gradient(#00cccc, #007777);
color: #00ffff;
}
.btn-primary {
background-color: blue;
color: white;
width: 200px;
height: 57px;

}
</style>
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Lista de partidas presupuestales</h2>
        </div>


        <div class="col text-end">
 <a href="{{ route('partidas_presupuestales.create') }}" class="btn btn-primary">
  <i class="bi bi-plus-circle"></i> Nueva Partida Presupuestal  
</a>
        </div>
    </div>

<!-- Mensajes de éxito/error -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Tabla de aseguradoras -->
    <div class="card">
        <div class="card-body">
            @if($partida_presupuestal->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Partida</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>nivel</th>
<th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partida_presupuestal as $partidas_presupuestales)
                                <tr>
                                  <td>{{ $partidas_presupuestales->partida }}</td>
                                    <td>{{ $partidas_presupuestales->nombre_partida }}</td>
                                    <td>{{ $partidas_presupuestales->descripcion_partida }}</td>
                                    <td>{{ $partidas_presupuestales->estado_partida }}</td>
                                    <td>{{ $partidas_presupuestales->nivel_partida }}</td>
<td>
    <div class="btn-group" role="group">
        <a href="{{ route('partidas_presupuestales.show', $partidas_presupuestales->partida) }}" 
           title="Ver detalle" class="ver">
            <i class="bi bi-eye"></i> Ver
        </a>
        <a href="{{ route('partidas_presupuestales.edit', $partidas_presupuestales->partida) }}" 
           class="btn btn-sm btn-warning"
           title="Editar">
            <i class="bi bi-pencil"></i> Editar
        </a>
        <form action="{{ route('partidas_presupuestales.destroy', $partidas_presupuestales->partida) }}" 
              method="POST" 
              class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="btn btn-sm btn-danger" 
                    title="Eliminar"
                    onclick="return confirm('¿Está seguro de eliminar la partida presupuestal {{ $partidas_presupuestales->partida }}?')">
                <i class="bi bi-trash"></i> Eliminar
            </button>
        </form>
    </div>
</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> No hay partidas presupuestales registradas.
                    <a href="{{ route('partidas_presupuestales.create') }}">Crear la primera</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection