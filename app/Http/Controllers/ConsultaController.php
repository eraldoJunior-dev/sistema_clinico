<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Paciente;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::with('paciente')->get();

        return view('consultas.index', compact('consultas'));
    }

    public function create()
    {
        $pacientes = Paciente::all();

        return view('consultas.create', compact('pacientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico' => 'required',
            'data' => 'required|date',
            'horario' => 'required',
            'motivo' => 'required',
        ]);

        $consulta = new Consulta();

        $consulta->paciente_id = $request->paciente_id;
        $consulta->medico = $request->medico;
        $consulta->data = $request->data;
        $consulta->horario = $request->horario;
        $consulta->motivo = $request->motivo;

        $consulta->save();

        return redirect()->route('consultas.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}