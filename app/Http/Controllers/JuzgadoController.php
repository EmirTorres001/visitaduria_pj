<?php

namespace App\Http\Controllers;

use App\Models\Juzgado;
use Illuminate\Http\Request;

class JuzgadoController extends Controller
{
    public function index()
    {
        $juzgados = Juzgado::all();
        return view('juzgados.index', compact('juzgados'));
    }

    public function create()
    {
        return view('juzgados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
    'nombre' => 'required|string|max:255',
    'tipo' => 'required|in:Civil,Familiar,Penal,Mixto',
    'municipio' => 'required|string|max:255',
]);

        Juzgado::create($request->all());

        return redirect()->route('juzgados.index')
                         ->with('success', 'Juzgado registrado correctamente.');
    }

    public function edit($id)
{
    $juzgado = Juzgado::findOrFail($id);
    return view('juzgados.edit', compact('juzgado'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'tipo' => 'required|in:Civil,Familiar,Penal,Mixto',
        'municipio' => 'required|string|max:255',
    ]);

    $juzgado = Juzgado::findOrFail($id);
    $juzgado->update($request->all());

    return redirect()->route('juzgados.index')->with('success', 'Juzgado actualizado correctamente.');
}

public function destroy($id)
{
    $juzgado = Juzgado::findOrFail($id);
    $juzgado->delete();

    return redirect()->route('juzgados.index')->with('success', 'Juzgado eliminado correctamente.');
}
}
