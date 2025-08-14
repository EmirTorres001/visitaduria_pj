<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visitaduria_id')->constrained('visitadurias')->onDelete('cascade');
            $table->enum('indice_riesgo', ['Alto', 'Medio', 'Bajo']);
            $table->date('ultima_visita');
            $table->text('recomendaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seguimientos');
    }
};
