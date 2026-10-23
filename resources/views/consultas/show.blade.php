<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Consulta</title>
</head>
<body>
    <h1>Detalhes da Consulta</h1>

    @include('partials.alerts')

    <h2>Dados da consulta</h2>

    <p><strong>Paciente:</strong>
        <a href="{{ route('pacientes.show', $consulta->paciente) }}">{{ $consulta->paciente->nome }}</a>
    </p>
    <p><strong>Consulta nº:</strong> {{ $consulta->id }}</p>
    <p><strong>Médico:</strong> {{ $consulta->medico }}</p>
    <p><strong>Data:</strong> {{ $consulta->data->format('d/m/Y') }}</p>
    <p><strong>Horário:</strong> {{ substr($consulta->horario, 0, 5) }}</p>
    <p><strong>Motivo:</strong> {{ $consulta->motivo }}</p>

    <p>
        <a href="{{ route('consultas.edit', $consulta) }}">Editar consulta</a>
    </p>

    <form action="{{ route('consultas.destroy', $consulta) }}" method="POST"
          onsubmit="return confirm('Excluir esta consulta e seu prontuário?')">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir consulta</button>
    </form>

    <hr>

    <h2>Prontuário médico</h2>

    @if ($consulta->prontuario)
        <p><strong>Anamnese:</strong></p>
        <p style="white-space: pre-line">{{ $consulta->prontuario->anamnese ?? 'Não informado' }}</p>

        <p><strong>Exame físico:</strong></p>
        <p style="white-space: pre-line">{{ $consulta->prontuario->exame_fisico ?? 'Não informado' }}</p>

        <p><strong>Diagnóstico:</strong></p>
        <p style="white-space: pre-line">{{ $consulta->prontuario->diagnostico ?? 'Não informado' }}</p>

        <p><strong>Conduta:</strong></p>
        <p style="white-space: pre-line">{{ $consulta->prontuario->conduta ?? 'Não informado' }}</p>

        <a href="{{ route('prontuarios.edit', $consulta->prontuario) }}">Editar prontuário</a>
    @else
        <p>Nenhum prontuário registrado para esta consulta.</p>

        <a href="{{ route('prontuarios.create', $consulta->id) }}">Registrar prontuário</a>
    @endif

    <br><br>
    <a href="{{ route('consultas.index') }}">Voltar para consultas</a>
</body>
</html>
