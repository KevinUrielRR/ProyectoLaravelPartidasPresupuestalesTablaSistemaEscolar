<?php


namespace App\Http\Controllers;
use App\Models\PartidasPresupuestales;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Route;
use Resources\Views\Layouts\app10;
use Resources\Views\Layouts\app2;

class PartidasPresupuestalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //


$partida_presupuestal = PartidasPresupuestales::orderBy('partida')->get();
return view("partidas_presupuestales.index", compact("partida_presupuestal"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //


return view('partidas_presupuestales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       $validatedData = $request->validate([
            'partida' => 'required|string|max:4|unique:partidas_presupuestales,partida',
            'nombre_partida' => 'string|max:100',
            'descripcion_partida' => '',
            'estado_partida' => 'required|max:1',
            'nivel_partida'=>'max:1',
        ], [
            // Mensajes personalizados
            'partida.unique' => 'La partida ya existe, y no se puede repetir',
            'partida.required'=>'La partida es obligatoria',
'partida.max'=>'la partida solo puede tener cuatro caracteres como maximo',
'nombre.max'=>'el nombre de la partida solo puede tener 100 caracteres',
            'capitulo.unique' => 'Esta clave ya existe',
            'estado_partida.required' => 'El estado es obligatorio',
'estado_partida.max'=>' El estado de la partida solo puede tener como máximo un caracter',
 'nivel_partida.max'=>' El nivel de la partida solo puede tener como máximo un caracter',
        ]);

        try {
            // Crear la nueva aseguradora
            PartidasPresupuestales::create($validatedData);

            // Redireccionar con mensaje de éxito
            return redirect()
                ->route('partidas_presupuestales.index')
                ->with('success', 'Partida Presupuestal creada exitosamente');
                
        } catch (\Exception $e) {
            // Redireccionar con mensaje de error
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al crear la partida presupuestal: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($partida)
    {
        //



$partida_presupuestal = PartidasPresupuestales::findOrFail($partida);
return view('partidas_presupuestales.show', compact('partida_presupuestal'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($partida)
    {
        //


   $partida_presupuestal = PartidasPresupuestales::findOrFail($partida);
        return view('partidas_presupuestales.edit', compact('partida_presupuestal'));




    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $partida)
    {
        //
 $partida_presupuestal = PartidasPresupuestales::findOrFail($partida);
$partida_clave = $partida_presupuestal->partida;

       $validatedData = $request->validate([
            'nombre_partida' => 'max:100',
            'descripcion_partida' => '',
            'estado_partida' => 'required|string|max:1',
            'nivel_partida'=>'max:1',
        ], [
            'partida.unique' => 'La partida ya existe, y no se puede repetir',
            'partida.required'=>'La partida es obligatoria',
'partida.max'=>'la partida solo puede tener cuatro caracteres como maximo',
'nombre.max'=>'el nombre de la partida solo puede tener 100 caracteres',
            'capitulo.unique' => 'Esta clave ya existe',
            'estado_partida.required' => 'El estado es obligatorio',
'estado_partida.max'=>' El estado de la partida solo puede tener como máximo un caracter',
 'nivel_partida.max'=>' El nivel de la partida solo puede tener como máximo un caracter',
        ]);

        try {
            // Crear la nueva aseguradora

            $partida_presupuestal->update($validatedData);

            // Redireccionar con mensaje de éxito
            return redirect()
                ->route('partidas_presupuestales.index')
                ->with('success', "Partida Presupuestal con clave '$partida_clave' fue editada/actualizada exitosamente");
                
        } catch (\Exception $e) {
            // Redireccionar con mensaje de error
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al crear la partida presupuestal: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($partida)
    {
        //
try {
            $partida_presupuestal = PartidasPresupuestales::findOrFail($partida);
            $partida = $partida_presupuestal->partida;
            $nombre_partida = $partida_presupuestal->nombre_partida;
            $partida_presupuestal->delete();

            return redirect()
                ->route('partidas_presupuestales.index')
                ->with('success', "La partida presupuestal con la clave '$partida' y el nombre '$nombre_partida' fue eliminada exitosamente");
                
        } catch (\Exception $e) {
            return redirect()
                ->route('partidas_presupuestales.index')
                ->with('error', 'Error al eliminar la partida presupuestal: ' . $e->getMessage());
        }
    }
}
