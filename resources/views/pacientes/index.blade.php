<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
</head>
<body>
    <h1>Pacientes</h1>

    <a href="{{ route('pacientes.create') }}">Cadastrar paciente</a>
    |
    <a href="{{ route('consultas.index') }}">Ver consultas</a>

    <hr>

    @include('partials.alerts')

    @forelse ($pacientes as $paciente)
        <div>
            <h3>{{ $paciente->nome }}</h3>
            <p>CPF: {{ $paciente->cpf }}</p>
            <p>Telefone: {{ $paciente->telefone ?? '-' }}</p>

            <a href="{{ route('pacientes.show', $paciente) }}">Ver ficha</a>
            |
            <a href="{{ route('pacientes.edit', $paciente) }}">Editar</a>
            |
            <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" style="display:inline"
                  onsubmit="return confirm('Excluir este paciente e todas as suas consultas?')">
                @csrf
                @method('DELETE')
                <button type="submit">Excluir</button>
            </form>
        </div>
        <hr>
    @empty
        <p>Nenhum paciente cadastrado.</p>
    @endforelse
</body>
</html>
