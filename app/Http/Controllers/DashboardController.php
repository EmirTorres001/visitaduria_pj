<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juzgado;
use App\Models\Visitaduria;
use App\Models\TrabajoPendiente;
use App\Models\Seguimiento;

class DashboardController extends Controller
{
    public function index()
    {
        // Totales
        $totalJuzgados = Juzgado::count();
        $totalVisitadurias = Visitaduria::count();
        $totalTrabajos = TrabajoPendiente::count();
        $totalSeguimientos = Seguimiento::count();

        // Últimas visitadurías (las 5 más recientes)
        $ultimasVisitadurias = Visitaduria::with('juzgado')
                                ->orderBy('created_at', 'desc')
                                ->take(5)
                                ->get();

        // Trabajos pendientes y seguimientos
        $trabajos = TrabajoPendiente::with('juzgado')->orderBy('fecha_registro', 'desc')->get();
        $seguimientos = Seguimiento::with('visitaduria.juzgado')->orderBy('ultima_visita', 'desc')->get();

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
