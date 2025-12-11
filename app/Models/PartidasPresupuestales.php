<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class PartidasPresupuestales extends Model
{
    //

use HasFactory;

protected $table = 'partidas_presupuestales';

protected $primaryKey = 'partida';

protected $keyType = 'string';

public $timestamps = false;

public $autoincrement = false;
public $incrementing = false;

protected $fillable = [
'partida',
'nombre_partida',
'descripcion_partida',
'estado_partida',
'nivel_partida',
];

}
