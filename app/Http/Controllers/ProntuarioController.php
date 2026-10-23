<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Prontuario;
use Illuminate\Http\Request;

class ProntuarioController extends Controller
{
    public function create($consultaId)
    {
        $consulta = Consulta::with(['paciente', 'prontuario'])->findOrFail($consultaId);

        if ($consulta->prontuario) {
            return redirect()->route('prontuarios.edit', $consulta->prontuario)
                ->with('info', 'Esta consulta já possui prontuário. Você pode editá-lo aqui.');
        }

        return view('prontuarios.create', [
            'consulta' => $consulta,
            'prontuario' => new Prontuario(),
        ]);
    }

    public function store(Request $request, $consultaId)
    {
        $consulta = Consulta::with(['paciente', 'prontuario'])->findOrFail($consultaId);

        if ($consulta->prontuario) {
            return redirect()->route('prontuarios.edit', $consulta->prontuario)
                ->with('info', 'Esta consulta já possui prontuário.');
        }

        $consulta->prontuario()->create($this->validated($request));

        return redirect()->route('consultas.show', $consulta)
            ->with('success', 'Prontuário criado com sucesso.');
    }

    public function edit(Prontuario $prontuario)
    {
        $prontuario->load('consulta.paciente');

        return view('prontuarios.edit', [
            'prontuario' => $prontuario,
            'consulta' => $prontuario->consulta,
        ]);
    }

    public function update(Request $request, Prontuario $prontuario)
    {
        $prontuario->update($this->validated($request));

        return redirect()->route('consultas.show', $prontuario->consulta_id)
            ->with('success', 'Prontuário atualizado.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'anamnese' => 'nullable|string',
            'exame_fisico' => 'nullable|string',
            'diagnostico' => 'nullable|string',
            'conduta' => 'nullable|string',
        ]);
    }
}
