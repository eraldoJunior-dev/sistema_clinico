<?php

use Illuminate\Support\Facades\Route;
use App\Models\Paciente;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ProntuarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pacientes', PacienteController::class);
Route::resource('consultas', ConsultaController::class);

Route::get('prontuarios/create/{consultaId}', [ProntuarioController::class, 'create'])->name('prontuarios.create');

Route::post('prontuarios/store/{consultaId}', [ProntuarioController::class, 'store'])->name('prontuarios.store');
