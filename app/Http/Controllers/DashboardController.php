<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juzgado;
use App\Models\Visitaduria;
use App\Models\TrabajoPendiente;
use App\Models\Seguimiento;
use App\Models\SeguimientoJuzgado;

class DashboardController extends Controller
{
    public function index()
{
    $totalJuzgados = Juzgado::count();
    $totalVisitadurias = Visitaduria::count();
    $totalTrabajos = TrabajoPendiente::count();
    $totalSeguimientos = SeguimientoJuzgado::count(); // 👈 Asegúrate que sea este modelo

    $ultimasVisitadurias = Visitaduria::latest()->take(5)->get();
    $trabajos = TrabajoPendiente::latest()->take(5)->get();
    $seguimientos = SeguimientoJuzgado::with('visitaduria.juzgado')->latest()->take(5)->get();

    return view('informes.index', compact(
        'totalJuzgados',
        'totalVisitadurias',
        'totalTrabajos',
        'totalSeguimientos',
        'ultimasVisitadurias',
        'trabajos',
        'seguimientos'
    ));
}
}
