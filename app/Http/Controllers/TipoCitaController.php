<?php

namespace App\Http\Controllers;

use App\Models\TipoCita;
use Illuminate\Http\Request;

class TipoCitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return TipoCita::all();
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_cita' => ['required', 'string', 'max:50'],
            'descripcion_cita' => ['nullable', 'string']
        ]);
        $tipo_cita = TipoCita::create([
            'nombre_cita' => $request->nombre_cita,
            'descripcion_cita' => $request->descripcion_cita
        ]);
        return response()->json($tipo_cita, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoCita $tipoCita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoCita $tipoCita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tipoCita = TipoCita::findOrFail($id);
        
        $request->validate([
            'nombre_cita' => ['required', 'string', 'max:50'],
            'descripcion_cita' => ['nullable', 'string']
        ]);
        
        $tipoCita->update([
            'nombre_cita' => $request->nombre_cita,
            'descripcion_cita' => $request->descripcion_cita
        ]);
        
        return response()->json([
            'message' => 'Tipo de cita actualizado exitosamente',
            'data' => $tipoCita
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $tipoCita)
    {

        return TipoCita::destroy($tipoCita);
        //
    }
}
