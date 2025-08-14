<?php

namespace App\Http\Controllers;

use App\Models\Visitaduria;
use App\Models\Juzgado;
use Illuminate\Http\Request;

class VisitaduriaController extends Controller
{
    public function index()
    {
        $visitadurias = Visitaduria::with('juzgado')->get();
        return view('visitadurias.index', compact('visitadurias'));
    }

    public function create()
    {
        $juzgados = Juzgado::all();
        return view('visitadurias.create', compact('juzgados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'juzgado_id' => 'required|exists:juzgados,id',
            'tipo_visita' => 'required|string',
            'fecha_visita' => 'required|date',
            'proceso' => 'required|string',
        ]);

        // Generar folio automáticamente
        $ultimo = Visitaduria::latest()->first();
        $folio = $ultimo ? 'VST' . str_pad($ultimo->id + 1, 4, '0', STR_PAD_LEFT) : 'VST0001';

        $juzgado = Juzgado::find($request->juzgado_id);

        Visitaduria::create([
            'folio' => $folio,
            'juzgado_id' => $juzgado->id,
            'municipio' => $juzgado->municipio,
            'tipo_visita' => $request->tipo_visita,
            'fecha_visita' => $request->fecha_visita,
            'proceso' => $request->proceso,
        ]);

        return redirect()->route('visitadurias.index')->with('success', 'Visitaduría registrada correctamente');
    }

    public function edit(Visitaduria $visitaduria)
{
    $juzgados = Juzgado::all();
    return view('visitadurias.edit', compact('visitaduria', 'juzgados'));
}

public function update(Request $request, Visitaduria $visitaduria)
{
    $request->validate([
        'juzgado_id' => 'required|exists:juzgados,id',
        'tipo_visita' => 'required|string',
        'fecha_visita' => 'required|date',
        'proceso' => 'required|string',
    ]);

    $juzgado = Juzgado::find($request->juzgado_id);

    $visitaduria->update([
        'juzgado_id' => $juzgado->id,
        'municipio' => $juzgado->municipio,
        'tipo_visita' => $request->tipo_visita,
        'fecha_visita' => $request->fecha_visita,
        'proceso' => $request->proceso,
    ]);

    return redirect()->route('visitadurias.index')->with('success', 'Visitaduría actualizada correctamente');
}

public function destroy(Visitaduria $visitaduria)
{
    $visitaduria->delete();
    return redirect()->route('visitadurias.index')->with('success', 'Visitaduría eliminada correctamente');
}
}
