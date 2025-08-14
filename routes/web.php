<?php

use App\Http\Controllers\JuzgadoController;
use App\Http\Controllers\TrabajoPendienteController;
use App\Http\Controllers\VisitaduriaController;
use App\Http\Controllers\SeguimientoJuzgadoController;

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
