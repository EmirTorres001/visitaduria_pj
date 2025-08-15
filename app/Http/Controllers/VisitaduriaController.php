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

    $visitaduria = new \App\Models\Visitaduria();
    $visitaduria->folio = 'VST-' . time(); // ejemplo de folio único
    $visitaduria->juzgado_id = $request->juzgado_id;
    $visitaduria->municipio = $request->municipio;
    $visitaduria->tipo_visita = $request->tipo_visita;
    $visitaduria->fecha_visita = $request->fecha_visita;
    $visitaduria->proceso = $request->proceso;
    $visitaduria->save();

    return redirect()->route('visitadurias.index')->with('success', 'Visitaduría registrada correctamente.');
}

    public function edit($id)
{
    $visitaduria = \App\Models\Visitaduria::findOrFail($id);
    $juzgados = \App\Models\Juzgado::all(); // <-- Trae todos los juzgados

    return view('visitadurias.edit', compact('visitaduria', 'juzgados'));
}



    public function update(Request $request, Visitaduria $visitaduria)
    {
        $request->validate([
            'juzgado_id' => 'required|exists:juzgados,id',
            'tipo_visita' => 'required|string|max:255',
            'fecha_visita' => 'required|date',
            'proceso' => 'required|string|max:255',
        ]);

        $juzgado = Juzgado::find($request->juzgado_id);

        $visitaduria->update([
            'juzgado_id' => $request->juzgado_id,
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
