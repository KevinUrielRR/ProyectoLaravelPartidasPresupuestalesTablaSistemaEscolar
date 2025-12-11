<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PartidasPresupuestalesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'partida' => $this->partida,
            'nombre_partida' => $this->nombre_partida,
            'descripcion_partida' => $this->descripcion_partida,
            'estado_partida' => $this->estado_partida,
            'nivel_partida' => $this->nivel_partida,
        ];
        //return parent::toArray($request);
    }
}
