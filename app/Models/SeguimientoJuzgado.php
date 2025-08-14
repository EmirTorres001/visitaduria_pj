<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeguimientoJuzgado extends Model
{
    protected $fillable = [
        'visitaduria_id',
        'indice_riesgo',
        'ultima_visita',
        'recomendaciones'
    ];

    public function visitaduria()
    {
        return $this->belongsTo(Visitaduria::class);
    }
}