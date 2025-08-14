<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitadurias', function (Blueprint $table) {
            $table->id();
            $table->string('folio')->unique();
            $table->foreignId('juzgado_id')->constrained('juzgados')->onDelete('cascade');
            $table->string('municipio');
            $table->string('tipo_visita');
            $table->date('fecha_visita');
            $table->string('proceso');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitadurias');
    }
};
