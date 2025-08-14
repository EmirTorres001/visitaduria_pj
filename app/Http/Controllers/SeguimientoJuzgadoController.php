<?php

namespace App\Http\Controllers;

use App\Models\SeguimientoJuzgado;
use App\Models\Visitaduria;
use Illuminate\Http\Request;

class SeguimientoJuzgadoController extends Controller
{
    public function index()
    {
        $seguimientos = SeguimientoJuzgado::with('visitaduria.juzgado')->get();
        return view('seguimiento_juzgados.index', compact('seguimientos'));
    }

    public function create()
    {
        $visitadurias = Visitaduria::with('juzgado')->get();
        return view('seguimiento_juzgados.create', compact('visitadurias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'visitaduria_id' => 'required|exists:visitadurias,id',
            'indice_riesgo' => 'required',
            'ultima_visita' => 'nullable|date',
            'recomendaciones' => 'nullable|string',
        ]);

        SeguimientoJuzgado::create($request->all());

        return redirect()->route('seguimiento_juzgados.index')
            ->with('success', 'Seguimiento registrado correctamente');
    }

    public function edit($id)
    {
        $seguimiento = SeguimientoJuzgado::findOrFail($id);
        $visitadurias = Visitaduria::with('juzgado')->get();
        return view('seguimiento_juzgados.edit', compact('seguimiento', 'visitadurias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'visitaduria_id' => 'required|exists:visitadurias,id',
            'indice_riesgo' => 'required',
            'ultima_visita' => 'nullable|date',
            'recomendaciones' => 'nullable|string',
        ]);

        $seguimiento = SeguimientoJuzgado::findOrFail($id);
        $seguimiento->update($request->all());

        return redirect()->route('seguimiento_juzgados.index')
            ->with('success', 'Seguimiento actualizado correctamente');
    }

    public function destroy($id)
    {
        $seguimiento = SeguimientoJuzgado::findOrFail($id);
        $seguimiento->delete();

        return redirect()->route('seguimiento_juzgados.index')
            ->with('success', 'Seguimiento eliminado correctamente');
    }
}
