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
            $table->text('autor');
            $table->boolean('estado')->default(true);
            $table->foreignId('tipo_oracion_id')->nullable()->constrained('tipo_oracions')->onDelete("set null");
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
