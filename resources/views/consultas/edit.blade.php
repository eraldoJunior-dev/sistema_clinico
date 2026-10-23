<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Consulta</title>
</head>
<body>
    <h1>Editar Consulta</h1>

    @include('partials.alerts')

    @include('consultas._form', [
        'action' => route('consultas.update', $consulta),
        'method' => 'PUT',
        'submit' => 'Salvar alterações',
    ])

    <br>
    <a href="{{ route('consultas.show', $consulta) }}">Voltar</a>
</body>
</html>
