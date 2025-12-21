<?php

namespace App\Http\Controllers;

use App\Models\Oraciones;
use Illuminate\Http\Request;

class OracionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return Oraciones::all();
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_oracion' => ['required', 'string', 'max:255'],
            'texto_oracion' => ['required', 'string'],
            'autor' => ['required', 'string', 'max:255'],
            'tipo_oracion_id' => ['nullable', 'exists:tipo_oracions,id']
        ]);
        $oracion = Oraciones::create([
            'nombre_oracion' => $request->nombre_oracion,
            'texto_oracion' => $request->texto_oracion,
            'autor' => $request->autor,
            'tipo_oracion_id' => $request->tipo_oracion_id
        ]);
        return response()->json($oracion, 201);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Oraciones $oraciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Oraciones $oraciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Oraciones $oracione)
    {
        $request->validate([
            'nombre_oracion' => ['required', 'string', 'max:255'],
            'texto_oracion' => ['required', 'string'],
            'autor' => ['required', 'string', 'max:255'],
            'tipo_oracion_id' => ['nullable', 'exists:tipo_oracions,id']
        ]);
        $oracione->update($request->all());
        return response()->json($oracione, 200);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $oraciones)
    {
        //
        return Oraciones::destroy($oraciones);

    }
}
