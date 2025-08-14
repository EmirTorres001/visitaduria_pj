<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrabajoPendiente;
use App\Models\Juzgado;

class TrabajoPendienteController extends Controller
{
    // Mostrar listado
    public function index()
    {
        $trabajos = TrabajoPendiente::with('juzgado')->get();
        return view('trabajo_pendiente.index', compact('trabajos'));
    }

    // Formulario para crear
    public function create()
    {
        $juzgados = Juzgado::all();
        return view('trabajo_pendiente.create', compact('juzgados'));
    }

    // Guardar nuevo trabajo
    public function store(Request $request)
    {
        $request->validate([
            'folio' => 'required',
            'numero_expediente' => 'required',
            'juzgado_id' => 'required|exists:juzgados,id',
            'fecha_registro' => 'required|date',
            'tipo_trabajo' => 'required',
            'estado' => 'required',
            'responsable' => 'required',
            'fecha_limite' => 'nullable|date',
            'tipo_caso' => 'required',
        ]);

        $trabajo = new TrabajoPendiente();
        $trabajo->folio = $request->folio;
        $trabajo->numero_expediente = $request->numero_expediente;
        $trabajo->juzgado_id = $request->juzgado_id;
        $trabajo->municipio = Juzgado::find($request->juzgado_id)->municipio;
        $trabajo->fecha_registro = $request->fecha_registro;
        $trabajo->fecha_audiencia = $request->fecha_audiencia;
        $trabajo->tipo_trabajo = $request->tipo_trabajo;
        $trabajo->estado = $request->estado;
        $trabajo->responsable = $request->responsable;
        $trabajo->fecha_limite = $request->fecha_limite;
        $trabajo->tipo_caso = $request->tipo_caso;
        $trabajo->save();

        return redirect()->route('trabajo_pendiente.index')->with('success', 'Trabajo registrado correctamente.');
    }

    // Formulario para editar
    public function edit($id)
    {
        $trabajo = TrabajoPendiente::findOrFail($id);
        $juzgados = Juzgado::all();
        return view('trabajo_pendiente.edit', compact('trabajo', 'juzgados'));
    }

    // Actualizar trabajo
    public function update(Request $request, $id)
    {
        $trabajo = TrabajoPendiente::findOrFail($id);

        $request->validate([
            'folio' => 'required',
            'numero_expediente' => 'required',
            'juzgado_id' => 'required|exists:juzgados,id',
            'fecha_registro' => 'required|date',
            'tipo_trabajo' => 'required',
            'estado' => 'required',
            'responsable' => 'required',
            'fecha_limite' => 'nullable|date',
            'tipo_caso' => 'required',
        ]);

        $trabajo->folio = $request->folio;
        $trabajo->numero_expediente = $request->numero_expediente;
        $trabajo->juzgado_id = $request->juzgado_id;
        $trabajo->municipio = Juzgado::find($request->juzgado_id)->municipio;
        $trabajo->fecha_registro = $request->fecha_registro;
        $trabajo->fecha_audiencia = $request->fecha_audiencia;
        $trabajo->tipo_trabajo = $request->tipo_trabajo;
        $trabajo->estado = $request->estado;
        $trabajo->responsable = $request->responsable;
        $trabajo->fecha_limite = $request->fecha_limite;
        $trabajo->tipo_caso = $request->tipo_caso;
        $trabajo->save();

        return redirect()->route('trabajo_pendiente.index')->with('success', 'Trabajo actualizado correctamente.');
    }

    // Eliminar trabajo
    public function destroy($id)
    {
        $trabajo = TrabajoPendiente::findOrFail($id);
        $trabajo->delete();

        return redirect()->route('trabajo_pendiente.index')->with('success', 'Trabajo eliminado correctamente.');
    }
}
