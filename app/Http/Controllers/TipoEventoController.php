<?php

namespace App\Http\Controllers;

use App\Models\TipoEvento;
use Illuminate\Http\Request;

class TipoEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            return TipoEvento::all();
        }

        return TipoEvento::where('user_id', auth()->id())->get();
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
            'nombre_evento' => ['required', 'string', 'max:50'],
            'descripcion_evento' => ['nullable', 'string']
        ]);
        $tipo_evento = TipoEvento::create([
            'nombre_evento' => $request->nombre_evento,
            'descripcion_evento' => $request->descripcion_evento
        ]);
        return response()->json($tipo_evento, 201);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoEvento $tipoEvento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoEvento $tipoEvento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoEvento $tipoEvento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoEvento $tipoEvento)
    {
        //
    }
}
