<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::orderBy('nome')->get();

        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create', ['paciente' => new Paciente()]);
    }

    public function store(Request $request)
    {
        $paciente = Paciente::create($this->validated($request));

        return redirect()->route('pacientes.show', $paciente)
            ->with('success', 'Paciente cadastrado com sucesso.');
    }

    public function show(Paciente $paciente)
    {
        $consultas = $paciente->consultas()
            ->with('prontuario')
            ->orderByDesc('data')
            ->orderByDesc('horario')
            ->get();

        return view('pacientes.show', compact('paciente', 'consultas'));
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        $paciente->update($this->validated($request, $paciente));

        return redirect()->route('pacientes.show', $paciente)
            ->with('success', 'Dados do paciente atualizados.');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente excluído.');
    }

    private function validated(Request $request, ?Paciente $paciente = null): array
    {
        return $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date|before:today',
            'cpf' => ['required', 'string', 'max:14', Rule::unique('pacientes', 'cpf')->ignore($paciente?->id)],
            'telefone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);
    }
}
