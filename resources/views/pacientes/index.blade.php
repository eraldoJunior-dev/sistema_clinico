<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pacientes</title>
</head>
<body>

    <h1>Pacientes</h1>

    <a href="/pacientes/create">Cadastrar paciente</a>

    <hr>

    @foreach ($pacientes as $paciente)
        <div>
            <h3>{{ $paciente->nome }}</h3>
            <p>CPF: {{ $paciente->cpf }}</p>
            <p>Telefone: {{ $paciente->telefone }}</p>
            <a href="{{ route('pacientes.show', $paciente) }}">Ver ficha</a>
        </div>
        <br>
        <a href="{{ route('pacientes.edit', $paciente) }}">
            Editar
        </a>
        <br>
        <br>
        <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">Excluir</button>
        </form>
        <hr>
    @endforeach

</body>
</html>