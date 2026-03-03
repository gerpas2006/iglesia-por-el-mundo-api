<?php

namespace App\Http\Controllers;

use App\Models\Donaciones;
use Illuminate\Http\Request;

class DonacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            return Donaciones::with('tipoDonacion')->get();
        }
        
        return Donaciones::with('tipoDonacion')->where('user_id', auth()->id())->get();
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

        $validated = request(
            [
                'nombre_donante' => ['required', 'string', 'max:255'],
                'apellido_donante' => ['required', 'string', 'max:255'],
                'donacion' => ['required', 'numeric'],
                'mensaje' => ['nullable', 'string'],
                'fecha_donacion' => ['required', 'date_format:Y-m-d H:i:s'],
                'metodo' => ['required', 'string', 'max:255'],
                'tipo_donacion_id' => ['required', 'exists:tipo_donaciones,id']
            ]
        );
        $donaciones = Donaciones::create([
            'nombre_donante' => $request->nombre_donante,
            'apellido_donante' => $request->apellido_donante,
            'donacion' => $request->donacion,
            'mensaje' => $request->mensaje,
            'fecha_donacion' => now(),
            'metodo' => $request->metodo,
            'user_id' => auth()->id(),
            'tipo_donacion_id' => $request->tipo_donacion_id
        ]);
        $donaciones->load('tipoDonacion');
        return response()->json($donaciones, 201);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Donaciones $donaciones)
    {
        //
        $donaciones->load('tipoDonacion');
        return $donaciones;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donaciones $donaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donaciones $donaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $donaciones)
    {
        //
        return Donaciones::destroy($donaciones);
    }
}
