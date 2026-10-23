<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Paciente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::with('paciente')
            ->orderBy('data')
            ->orderBy('horario')
            ->get();

        return view('consultas.index', compact('consultas'));
    }

    public function create(Request $request)
    {
        return view('consultas.create', [
            'consulta' => new Consulta(),
            'pacientes' => Paciente::orderBy('nome')->get(),
            'pacienteSelecionado' => $request->paciente_id,
        ]);
    }

    public function store(Request $request)
    {
        $consulta = Consulta::create($this->validated($request));

        return redirect()->route('consultas.show', $consulta)
            ->with('success', 'Consulta agendada com sucesso.');
    }

    public function show(Consulta $consulta)
    {
        $consulta->load(['paciente', 'prontuario']);

        return view('consultas.show', compact('consulta'));
    }

    public function edit(Consulta $consulta)
    {
        return view('consultas.edit', [
            'consulta' => $consulta,
            'pacientes' => Paciente::orderBy('nome')->get(),
            'pacienteSelecionado' => null,
        ]);
    }

    public function update(Request $request, Consulta $consulta)
    {
        $consulta->update($this->validated($request, $consulta));

        return redirect()->route('consultas.show', $consulta)
            ->with('success', 'Consulta atualizada.');
    }

    public function destroy(Consulta $consulta)
    {
        $pacienteId = $consulta->paciente_id;
        $consulta->delete();

        return redirect()->route('pacientes.show', $pacienteId)
            ->with('success', 'Consulta excluída.');
    }

    private function validated(Request $request, ?Consulta $consulta = null): array
    {
        $dados = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico' => 'required|string|max:255',
            'data' => 'required|date',
            'horario' => 'required|date_format:H:i,H:i:s',
            'motivo' => 'required|string|max:255',
        ]);

        $dados['horario'] = Carbon::parse($dados['horario'])->format('H:i:s');

        $conflito = Consulta::where('medico', $dados['medico'])
            ->whereDate('data', $dados['data'])
            ->where('horario', $dados['horario'])
            ->when($consulta, fn ($query) => $query->whereKeyNot($consulta->id))
            ->exists();

        if ($conflito) {
            throw ValidationException::withMessages([
                'horario' => 'Este médico já tem uma consulta marcada neste dia e horário.',
            ]);
        }

        return $dados;
    }
}
