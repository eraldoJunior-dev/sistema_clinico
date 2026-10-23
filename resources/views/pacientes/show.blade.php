<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha do Paciente</title>
</head>
<body>
    <h1>Ficha do Paciente</h1>

    @include('partials.alerts')

    <h2>{{ $paciente->nome }}</h2>
    <p><strong>Data de nascimento:</strong> {{ $paciente->data_nascimento->format('d/m/Y') }}</p>
    <p><strong>CPF:</strong> {{ $paciente->cpf }}</p>
    <p><strong>Telefone:</strong> {{ $paciente->telefone ?? '-' }}</p>
    <p><strong>E-mail:</strong> {{ $paciente->email ?? '-' }}</p>

    <p><a href="{{ route('pacientes.edit', $paciente) }}">Editar dados</a></p>

    <h2>Consultas</h2>

    <a href="{{ route('consultas.create', ['paciente_id' => $paciente->id]) }}">Agendar consulta</a>

    <hr>

    @forelse ($consultas as $consulta)
        <div>
            <p><strong>Data:</strong> {{ $consulta->data->format('d/m/Y') }} às {{ substr($consulta->horario, 0, 5) }}</p>
            <p><strong>Médico:</strong> {{ $consulta->medico }}</p>
            <p><strong>Motivo:</strong> {{ $consulta->motivo }}</p>
            <p>
                <a href="{{ route('consultas.show', $consulta) }}">Ver consulta</a>
                @if ($consulta->prontuario)
                    | <em>Prontuário registrado</em>
                @endif
            </p>
        </div>
        <hr>
    @empty
        <p>Este paciente ainda não possui consultas.</p>
    @endforelse

    <br>
    <a href="{{ route('pacientes.index') }}">Voltar para pacientes</a>
</body>
</html>
