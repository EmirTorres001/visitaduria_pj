<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabajoPendiente extends Model
{
    use HasFactory;

    protected $table = 'trabajos_pendientes';
    #protected $table = 'trabajos_pendientes';

    protected $fillable = [
        'folio',
        'numero_expediente',
        'juzgado_id',
        'municipio',
        'fecha_registro',
        'fecha_audiencia',
        'tipo_trabajo',
        'estado',
        'responsable',
        'fecha_limite',
        'tipo_caso'
    ];

    protected $casts = [
    'fecha_registro' => 'datetime',
    'fecha_audiencia' => 'datetime',
    'fecha_limite' => 'datetime',
];

    public function juzgado()
    {
        return $this->belongsTo(Juzgado::class);
    }
}

