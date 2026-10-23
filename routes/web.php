<?php

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProntuarioController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/pacientes');

Route::resource('pacientes', PacienteController::class);
Route::resource('consultas', ConsultaController::class);

Route::get('prontuarios/create/{consultaId}', [ProntuarioController::class, 'create'])->name('prontuarios.create');
Route::post('prontuarios/store/{consultaId}', [ProntuarioController::class, 'store'])->name('prontuarios.store');
Route::get('prontuarios/{prontuario}/edit', [ProntuarioController::class, 'edit'])->name('prontuarios.edit');
Route::put('prontuarios/{prontuario}', [ProntuarioController::class, 'update'])->name('prontuarios.update');
