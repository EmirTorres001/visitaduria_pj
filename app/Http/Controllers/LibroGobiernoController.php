<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juzgado;
use App\Models\Visitaduria;
use App\Models\SeguimientoJuzgado;
use App\Models\TrabajoPendiente;
use Barryvdh\DomPDF\Facade\Pdf;

class LibroGobiernoController extends Controller
{
    public function index()
    {
        $juzgados = Juzgado::all();
        $visitadurias = Visitaduria::all();
        $seguimientos = SeguimientoJuzgado::all();
        $trabajos = TrabajoPendiente::all();

        return view('libro_gobierno.index', compact('juzgados', 'visitadurias', 'seguimientos', 'trabajos'));
    }

    public function exportPdf()
    {
        $juzgados = Juzgado::all();
        $visitadurias = Visitaduria::all();
        $seguimientos = SeguimientoJuzgado::all();
        $trabajos = TrabajoPendiente::all();

        $pdf = Pdf::loadView('libro_gobierno.pdf', compact('juzgados', 'visitadurias', 'seguimientos', 'trabajos'));
        return $pdf->download('Libro_de_Gobierno.pdf');
    }
}
