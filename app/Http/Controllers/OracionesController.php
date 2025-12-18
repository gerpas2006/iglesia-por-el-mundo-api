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
    public function update(Request $request, Oraciones $oraciones)
    {
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
