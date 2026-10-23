<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Consulta</title>
</head>
<body>
    <h1>Nova Consulta</h1>

    @include('partials.alerts')

    @include('consultas._form', [
        'action' => route('consultas.store'),
        'method' => 'POST',
        'submit' => 'Agendar consulta',
    ])

    <br>
    <a href="{{ route('consultas.index') }}">Voltar</a>
</body>
</html>
