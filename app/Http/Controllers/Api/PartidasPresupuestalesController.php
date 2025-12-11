<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//use App\Http\Resources\PartidasPresupuestalesResource;
use App\Models\PartidasPresupuestales;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class PartidasPresupuestalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        //
        $partida = PartidasPresupuestales::all();
        return response()->json($partida);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        //
            $request->validate([
            'partida' => 'required|string|max:4|unique:partidas_presupuestales',
            'nombre_partida' => 'nullable|string|max:100',
            'descripcion_partida' => 'string|max:255',
            'estado_partida' => 'required|string|max:1',
            'nivel_partida'=>'string|max:1',
        ]);

        $partida = PartidasPresupuestales::create($request->all());
        return response()->json($partida, 201);
      
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $partida_presupuestal): JsonResponse
    {
        //
        try {
            $partida = PartidasPresupuestales::findOrFail($partida_presupuestal);
            return response()->json($partida);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Partida Presupuestal no encontrada'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $partida_presupuestal): JsonResponse
    {
        //
         $request->validate([
            'nombre_partida' => 'string|max:100',
            'descripcion_partida' => 'string|max:255',
            'estado_partida' => 'required|string|max:1',
            'nivel_partida'=>'string|max:1',
        ]);

        $partida = PartidasPresupuestales::findOrFail($partida_presupuestal);
        $partida->update($request->all());
        return response()->json($partida);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $partida) : JsonResponse
    {
        //
        
    //  PartidasPresupuestales::findOrFail($partida)->delete();
    //  return response()->json(null, 204);
    
       
        $partidas_presupuestales = PartidasPresupuestales::find($partida);
        if(!$partidas_presupuestales)
            {
                return response()->json([
                    'success'=>false,
                    'message'=>'no encontrado'
                ], Response::HTTP_NOT_FOUND);
            }
            else{
        $partidas_presupuestales->delete();
        return response()->json([
            'success'=>true,
            'message'=>'eliminado'
        ], Response::HTTP_OK);
    }
      
    }


}