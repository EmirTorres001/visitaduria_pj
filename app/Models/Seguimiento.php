<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitaduria_id',
        'indice_riesgo',
        'ultima_visita',
        'recomendaciones'
    ];

    // Relación con Visitaduría
    public function visitaduria()
    {
        return $this->belongsTo(Visitaduria::class);
    }
}
