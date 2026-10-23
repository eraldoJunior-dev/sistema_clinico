<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Prontuário</title>
</head>
<body>
    <h1>Novo Prontuário Médico</h1>

    @include('partials.alerts')

    <p>Consulta nº {{ $consulta->id }}</p>
    <p>Paciente: {{ $consulta->paciente->nome }}</p>

    <hr>

    @include('prontuarios._form', [
        'action' => route('prontuarios.store', ['consultaId' => $consulta->id]),
        'method' => 'POST',
        'submit' => 'Salvar prontuário',
    ])

    <br>
    <a href="{{ route('consultas.show', $consulta) }}">Voltar para a consulta</a>
</body>
</html>
