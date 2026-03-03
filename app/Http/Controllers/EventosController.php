<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Eventos::with('tipoEvento')->get();
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
        $validated = $request->validate([
            'nombre_evento' => ['required', 'string', 'max:255'],
            'fecha_evento' => ['required', 'date_format:Y-m-d H:i:s'],
            'ubicacion' => ['required', 'string', 'max:255'],
            'descripcion_evento' => ['required', 'string'],
            'estado' => ['boolean'],
            'tipo_evento_id' => ['required', 'exists:tipo_eventos,id'],
        ]);
        $eventos = Eventos::create([
            'nombre_evento' => $request->nombre_evento,
            'fecha_evento' => $request->fecha_evento,
            'ubicacion' => $request->ubicacion,
            'descripcion_evento' => $request->descripcion_evento,
            'estado' => $request->estado ?? true,
            'user_id' => auth()->id(),
            'tipo_evento_id' => $request->tipo_evento_id,
        ]);
        $eventos->load('tipoEvento');

        return response()->json($eventos, 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(Eventos $eventos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eventos $eventos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eventos $evento)
    {
        $request->validate([
            'nombre_evento' => ['required', 'string', 'max:255'],
            'fecha_evento' => ['required', 'date_format:Y-m-d H:i:s'],
            'ubicacion' => ['required', 'string', 'max:255'],
            'descripcion_evento' => ['required', 'string'],
            'estado' => ['boolean'],
            'tipo_evento_id' => ['required', 'exists:tipo_eventos,id'],
        ]);
        
        $evento->update($request->all());
        $evento->load('tipoEvento');
        return response()->json($evento, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $eventos)
    {
        return Eventos::destroy($eventos);
        //
    }
}
