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
        Schema::create('oraciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_oracion');
            $table->text('texto_oracion');
            $table->foreignId('tipo_oracion_id')->constrained('tipo_oraciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oraciones');
    }
};
