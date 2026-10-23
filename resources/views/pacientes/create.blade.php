<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Paciente</title>
</head>
<body>
    <h1>Cadastrar Paciente</h1>

    @include('partials.alerts')

    @include('pacientes._form', [
        'action' => route('pacientes.store'),
        'method' => 'POST',
        'submit' => 'Cadastrar',
    ])

    <br>
    <a href="{{ route('pacientes.index') }}">Voltar</a>
</body>
</html>
