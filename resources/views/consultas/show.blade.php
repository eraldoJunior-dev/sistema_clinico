
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Consulta</title>
</head>
<body>

    <h1>Detalhes da Consulta</h1>

    <h2>Dados do paciente</h2>

    <p>
        <strong>Nome:</strong>
        {{ $consulta->paciente->nome }}
    </p>

    <p>
        <strong>Consulta nº:</strong>
        {{ $consulta->id }}
    </p>

    <hr>

    <h2>Prontuário médico</h2>

    @if ($consulta->prontuario)
        <p><strong>Anamnese:</strong></p>
        <p>{{ $consulta->prontuario->anamnese ?? 'Não informado' }}</p>

        <p><strong>Exame físico:</strong></p>
        <p>{{ $consulta->prontuario->exame_fisico ?? 'Não informado' }}</p>

        <p><strong>Diagnóstico:</strong></p>
        <p>{{ $consulta->prontuario->diagnostico ?? 'Não informado' }}</p>

        <p><strong>Conduta:</strong></p>
        <p>{{ $consulta->prontuario->conduta ?? 'Não informado' }}</p>
    @else
        <p>Nenhum prontuário registrado para esta consulta.</p>

        <a href="{{ route('prontuarios.create', $consulta->id) }}">
            Registrar prontuário
        </a>
    @endif

</body>
</html>
