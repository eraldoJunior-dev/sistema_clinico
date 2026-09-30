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
        <hr>
    @endforeach

</body>
</html>