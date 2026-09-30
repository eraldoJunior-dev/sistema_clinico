<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Nova Consulta</title>
</head>
<body>

    <h1>Nova Consulta</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('consultas.store') }}" method="POST">

        @csrf

        <label>Paciente:</label>

        <select name="paciente_id">

            <option value="">Selecione o paciente</option>

            @foreach ($pacientes as $paciente)

                <option value="{{ $paciente->id }}">
                    {{ $paciente->nome }}
                </option>

            @endforeach

        </select>

        <br><br>

        <label>Médico:</label>
        <input type="text" name="medico">

        <br><br>

        <label>Data:</label>
        <input type="date" name="data">

        <br><br>

        <label>Horário:</label>
        <input type="time" name="horario">

        <br><br>

        <label>Motivo da consulta:</label>
        <input type="text" name="motivo">

        <br><br>

        <button type="submit">Agendar consulta</button>

    </form>

    <br>

    <a href="/pacientes">Voltar</a>

</body>
</html>