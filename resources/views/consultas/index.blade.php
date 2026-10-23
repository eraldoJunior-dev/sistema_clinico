<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>
</head>
<body>
    <h1>Consultas</h1>

    <a href="{{ route('consultas.create') }}">Nova consulta</a>
    |
    <a href="{{ route('pacientes.index') }}">Pacientes</a>

    <hr>

    @include('partials.alerts')

    @forelse ($consultas as $consulta)
        <div>
            <h3>{{ $consulta->paciente->nome }}</h3>
            <p>Médico: {{ $consulta->medico }}</p>
            <p>Data: {{ $consulta->data->format('d/m/Y') }} às {{ substr($consulta->horario, 0, 5) }}</p>
            <p>Motivo: {{ $consulta->motivo }}</p>

            <a href="{{ route('consultas.show', $consulta) }}">Ver</a>
            |
            <a href="{{ route('consultas.edit', $consulta) }}">Editar</a>
            |
            <form action="{{ route('consultas.destroy', $consulta) }}" method="POST" style="display:inline"
                  onsubmit="return confirm('Excluir esta consulta e seu prontuário?')">
                @csrf
                @method('DELETE')
                <button type="submit">Excluir</button>
            </form>
        </div>
        <hr>
    @empty
        <p>Nenhuma consulta agendada.</p>
    @endforelse
</body>
</html>
