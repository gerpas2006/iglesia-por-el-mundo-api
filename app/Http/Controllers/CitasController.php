<?php

namespace App\Http\Controllers;

use App\Models\citas;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            return citas::with('tipoCita')->get();
        }
        return citas::with('tipoCita')->where('user_id', auth()->id())->get();
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(citas $citas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(citas $citas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, citas $citas)
    {
        $request->validate([
            'nombre_solicitante' => ['required', 'string', 'max:255'],
            'apellido_solicitante' => ['required', 'string', 'max:255'],
            'fecha_y_hora_cita' => ['required', 'date_format:Y-m-d H:i:s'],
            'mensaje' => ['nullable', 'string'],
            'estado' => ['required', 'in:pendiente,aprobada,rechazada'],
            'contacto' => ['required', 'string', 'max:255'],
            'tipo_cita_id' => ['required', 'exists:tipo_citas,id'],
        ]);
        
        $citas->update($request->all());
        $citas->load('tipoCita');
        return response()->json($citas, 200);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $citas)
    {
        return citas::destroy($citas);
        //
    }
}
