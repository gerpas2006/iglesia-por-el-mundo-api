<?php

namespace App\Http\Controllers;

use App\Models\Reseneas;
use Illuminate\Http\Request;

class ReseneasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Reseneas::with('user:id,name')->get();
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
            'titulo_reseneas' => ['required', 'string', 'max:255'],
            'calificacion_resenea' => ['required', 'integer', 'min:1', 'max:5'],
            'comentario_resenea' => ['required', 'string'],
        ]);
        
        $reseneas = Reseneas::create([
            'titulo_reseneas' => $request->titulo_reseneas,
            'calificacion_resenea' => $request->calificacion_resenea,
            'comentario_resenea' => $request->comentario_resenea,
            'fecha_resenea' => now(),
            'user_id' => auth()->id()
        ]);
        
        $reseneas->load('user');
        
        return response()->json([
            'message' => 'Reseña creada exitosamente',
            'data' => $reseneas
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $reseneas)
    {

        return Reseneas::destroy($reseneas);
        //
    }
}
