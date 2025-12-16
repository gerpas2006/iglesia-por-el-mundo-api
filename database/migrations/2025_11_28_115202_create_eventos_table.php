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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_evento');
            $table->dateTime('fecha_evento');
            $table->string('ubicacion');
            $table->text('descripcion_evento');
            $table->boolean('estado')->default(true);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('tipo_evento_id')->nullable()->constrained('tipo_eventos')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
