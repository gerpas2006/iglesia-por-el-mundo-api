<?php

namespace App\Http\Controllers;

use App\Models\TipoOracion;
use Illuminate\Http\Request;

class TipoOracionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TipoOracion::all();
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
            'nombre_oracion' => ['required', 'string', 'max:50'],
            'descripcion_oracion' => ['nullable', 'string']
        ]);
        $tipo_oracion = TipoOracion::create([
            'nombre_oracion' => $request->nombre_oracion,
            'descripcion_oracion' => $request->descripcion_oracion
        ]);
        return response()->json($tipo_oracion, 201);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoOracion $tipoOracion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoOracion $tipoOracion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoOracion $tipoOracion)
    {
        $request->validate([
            'nombre_oracion' => ['required', 'string', 'max:50'],
            'descripcion_oracion' => ['nullable', 'string']
        ]);
        $tipoOracion->update($request->all());
        return response()->json($tipoOracion, 200);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $tipoOracion)
    {
        return TipoOracion::destroy($tipoOracion);


        //
    }
}
