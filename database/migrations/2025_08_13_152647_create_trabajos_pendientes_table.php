<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trabajo_pendientes', function (Blueprint $table) {
            $table->id();
            $table->string('folio');
            $table->string('numero_expediente');
            $table->foreignId('juzgado_id')->constrained('juzgados')->onDelete('cascade');
            $table->string('municipio');
            $table->date('fecha_registro');
            $table->date('fecha_audiencia')->nullable();
            $table->string('tipo_trabajo');
            $table->string('estado');
            $table->string('responsable');
            $table->date('fecha_limite')->nullable();
            $table->string('tipo_caso');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trabajo_pendientes');
    }
};
