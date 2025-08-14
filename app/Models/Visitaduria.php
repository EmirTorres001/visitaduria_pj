<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitaduria extends Model
{
    use HasFactory;

    protected $fillable = [
        'folio',
        'juzgado_id',
        'municipio',
        'tipo_visita',
        'fecha_visita',
        'proceso'
    ];

    protected $dates = [
    'fecha_visita',
    'created_at',
    'updated_at'
];

    public function juzgado()
    {
        return $this->belongsTo(Juzgado::class);
    }
}
