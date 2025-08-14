<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juzgado;
use App\Models\Visitaduria;
use App\Models\SeguimientoJuzgado;
use App\Models\TrabajoPendiente;

class LibroGobiernoController extends Controller
{
    public function index()
    {
        // Traemos todos los registros
        $juzgados = Juzgado::all();
        $visitadurias = Visitaduria::with('juzgado')->get();
        $seguimientos = SeguimientoJuzgado::with('visitaduria.juzgado')->get();
        $trabajos = TrabajoPendiente::with('juzgado')->get();

        // Retornamos la vista con todos los datos
        return view('libro_gobierno.index', compact('juzgados', 'visitadurias', 'seguimientos', 'trabajos'));
    }
}
