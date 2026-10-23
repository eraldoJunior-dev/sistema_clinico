<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
</head>
<body>
    <h1>Editar Paciente</h1>

    @include('partials.alerts')

    @include('pacientes._form', [
        'action' => route('pacientes.update', $paciente),
        'method' => 'PUT',
        'submit' => 'Salvar alterações',
    ])

    <br>
    <a href="{{ route('pacientes.show', $paciente) }}">Voltar</a>
</body>
</html>
