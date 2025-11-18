@extends("layouts.app2")

@section('title', 'Editar Partida Presupuestal')
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

.btn-primary{
border:1px #777777 outset;
background: linear-gradient(0deg, #00aa00, #00ff00);

color: yellow;
}
.btn-info{
border:2px black outset;
background-color: #cfcfcf;
}

.btn-warning{
background: radial-gradient(#ffff00, #777700);
border:2px yellow outset;
}
select{
border: 2px green solid;
}
input{
border: 2px white solid;
border-radius: 3.7px;
color: black;
background: linear-gradient(0deg, #cccccc,  #777777);
}
#fecha_final #fecha_inicial{
border: 1px #ffff00 solid;
}

label{
background: linear-gradient(0deg, #cccccc, #ffffff);
//width:1000px;
}
.text-danger{
color: red;
}
h4{
border: 1px black solid;
}
.d-inline{
//background-color: blue;
}
.card-body{
border: 1px black solid;
background: radial-gradient(#0000ff, #0000aa);
}
.btn-secondary{
color:black;
background: linear-gradient(0deg, #777777, #cccccc);
border: 2px #aaaaaa outset;
}

h4{
color:blue;
}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Editar Partida Presupuestal</h4>
                </div>
                <div class="card-body">
                    
                    <!-- Mostrar errores de validación -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>¡Error!</strong> Por favor corrija los siguientes errores:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Formulario -->
                    <form action="{{ route('partidas_presupuestales.update', $partida_presupuestal->partida) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Clave Aseguradora (Solo lectura) -->
                        <div class="mb-3">
                            <label for="partida" class="form-label">
                                Partida
                            </label>
                            <input 
                                type="text" 
                                class="form-control bg-light" 
                                id="partida" 
                                value="{{ old('partida',$partida_presupuestal->partida) }}"
                                readonly
                                disabled />
                            <small class="text-muted">La clave de la partida no se puede modificar</small>
                        </div>

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre_partida" class="form-label">
                                Nombre <span class="text-danger"></span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('nombre_partida') is-invalid @enderror" 
                                id="nombre_partida" 
                                name="nombre_partida" 
                                value="{{ old('nombre_partida', $partida_presupuestal->nombre_partida) }}"
                                 />
                            @error('nombre_partida')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="descripcion_partida" class="form-label">
                                Descripcion <span class="text-danger"></span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('descripcion_partida') is-invalid @enderror" 
                                id="descripcion_partida" 
                                name="descripcion_partida" 
                                value="{{ old('descripcion_partida', $partida_presupuestal->descripcion_partida) }}"
                                 />
                            @error('descripcion_partida')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="estado_partida" class="form-label">
                                Estado <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('estado_partida') is-invalid @enderror" 
                                id="estado_partida" 
                                name="estado_partida" 
                                value="{{ old('estado_partida', $partida_presupuestal->estado_partida) }}"
                                required />
                            @error('estado_partida')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nivel_partida" class="form-label">
                                Nivel <span class="text-danger"></span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('nivel_partida') is-invalid @enderror" 
                                id="nivel_partida" 
                                name="nivel_partida" 
                                value="{{ old('nivel_partida', $partida_presupuestal->nivel_partida) }}"
                                 />
                            @error('nivel_partida')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>













                        <!-- Botones -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('partidas_presupuestales.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save"></i> Actualizar Partida Presupuestal
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection