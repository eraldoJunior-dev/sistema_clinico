<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\Prontuario;

class ProntuarioController extends Controller
{
    public function create($consultaId)
    {
        $consulta = Consulta::findOrFail($consultaId);

        return view('prontuarios.create', compact('consulta'));
    }

        public function store (Request $request, $consultaId)
    {
        $consulta = Consulta::findOrFail($consultaId);

        $dados = $request->validate([
            'anamnese' => 'nullable|string',
            'exame_fisico' => 'nullable|string',
            'diagnostico' => 'nullable|string',
            'conduta' => 'nullable|string',
        ]);

        $consulta->prontuario()->create($dados);

        return redirect()->route('consultas.show', $consultaId)->with('success', 'Prontuário criado com sucesso.');
    }

}

