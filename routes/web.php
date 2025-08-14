<?php

use App\Http\Controllers\JuzgadoController;
use App\Http\Controllers\TrabajoPendienteController;
use App\Http\Controllers\VisitaduriaController;
use App\Http\Controllers\SeguimientoJuzgadoController;
use App\Http\Controllers\LibroGobiernoController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\DashboardController;

Route::view('/', 'home')->name('home');

Route::get('/juzgados', [JuzgadoController::class, 'index'])->name('juzgados.index');
Route::get('/juzgados/crear', [JuzgadoController::class, 'create'])->name('juzgados.create');
Route::post('/juzgados', [JuzgadoController::class, 'store'])->name('juzgados.store');

Route::resource('juzgados', JuzgadoController::class)->except(['show']);

#TRABAJO PENDIENTE
Route::resource('trabajo_pendiente', TrabajoPendienteController::class);
Route::resource('visitadurias', VisitaduriaController::class);


#SEGUIMIENTO JUZGADOS

Route::resource('seguimiento_juzgados', SeguimientoJuzgadoController::class);


#LIBRO GOBIERNO

Route::get('/libro-gobierno', [LibroGobiernoController::class, 'index'])->name('libro_gobierno.index');
Route::get('/libro-gobierno/pdf', [LibroGobiernoController::class, 'exportPdf'])->name('libro_gobierno.pdf');


#INFORMES

Route::get('/informes', [DashboardController::class, 'index'])->name('informes.index');
Route::get('/informes/pdf', [DashboardController::class, 'exportPDF'])->name('informes.pdf');