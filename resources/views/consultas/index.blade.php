<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consultas</title>
</head>
<body>

    <h1>Consultas</h1>

    <a href="{{ route('consultas.create') }}">
        Nova consulta
    </a>

    <hr>

    @foreach ($consultas as $consulta)

        <div>

            <h3>{{ $consulta->paciente->nome }}</h3>

            <p>Médico: {{ $consulta->medico }}</p>

            <p>Data: {{ $consulta->data }}</p>

            <p>Horário: {{ $consulta->horario }}</p>

            <p>Motivo: {{ $consulta->motivo }}</p>

        </div>

        <hr>

    @endforeach

</body>
</html>