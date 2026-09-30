<?php

use Illuminate\Support\Facades\Route;
use App\Models\Paciente;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pacientes', PacienteController::class);
Route::resource('consultas', ConsultaController::class);
