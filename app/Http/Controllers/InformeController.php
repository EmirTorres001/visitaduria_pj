<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juzgado;
use App\Models\Visitaduria;
use App\Models\Seguimiento;
use App\Models\TrabajoPendiente;
use PDF; // si usas barryvdh/laravel-dompdf

class InformesController extends Controller
{
    public function index()
    {
        // Métricas generales
        $totalJuzgados = Juzgado::count();
        $totalVisitadurias = Visitaduria::count();
        $totalSeguimientos = Seguimiento::count();
        $totalTrabajos = TrabajoPendiente::count();

        // Últimos registros
        $ultimasVisitadurias = Visitaduria::latest()->take(5)->get();
        $ultimosTrabajos = TrabajoPendiente::latest()->take(5)->get();
        $ultimosSeguimientos = Seguimiento::latest()->take(5)->get();

        // Datos para gráficos
        $trabajosPorTipo = TrabajoPendiente::selectRaw('tipo_caso, COUNT(*) as total')
            ->groupBy('tipo_caso')
            ->pluck('total', 'tipo_caso');

        $riesgoJuzgados = Seguimiento::selectRaw('indice_riesgo, COUNT(*) as total')
            ->groupBy('indice_riesgo')
            ->pluck('total', 'indice_riesgo');

        return view('informes.index', compact(
            'totalJuzgados', 'totalVisitadurias', 'totalSeguimientos', 'totalTrabajos',
            'ultimasVisitadurias', 'ultimosTrabajos', 'ultimosSeguimientos',
            'trabajosPorTipo', 'riesgoJuzgados'
        ));
    }

    public function exportPDF()
    {
        $juzgados = Juzgado::all();
        $visitadurias = Visitaduria::all();
        $seguimientos = Seguimiento::all();
        $trabajos = TrabajoPendiente::all();

        $pdf = PDF::loadView('informes.pdf', compact('juzgados','visitadurias','seguimientos','trabajos'));
        return $pdf->download('informes_sistema.pdf');
    }
}
