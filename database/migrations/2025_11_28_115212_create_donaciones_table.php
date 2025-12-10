<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_donante');
            $table->string('apellido_donante');
            $table->float('donacion');
            $table->text('mensaje');
            $table->date('fecha_donacion');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('metodo_pago_id')->constrained('metodo_pagos');
            $table->foreignId('tipo_donacion_id')->constrained('tipo_donacions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donaciones');
    }
};
