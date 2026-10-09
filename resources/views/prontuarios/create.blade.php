
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Prontuário</title>
</head>
<body>

    <h1>Novo Prontuário Médico</h1>

    <h2>Dados da consulta</h2>

    <p>
        Consulta nº: {{ $consulta->id }}
    </p>

    <p>
        Paciente: {{ $consulta->paciente->nome }}
    </p>

    <hr>

    <form action="{{ route('prontuarios.store', ['consultaId' => $consulta->id]) }}" method="POST">
        @csrf
        <label for="anamnese">Anamnese:</label><br>
        <textarea id="anamnese" name="anamnese"
            rows="5" cols="50"></textarea>

        <br><br>

        <label for="exame_fisico">Exame físico:</label><br>
        <textarea id="exame_fisico" name="exame_fisico"
            rows="5" cols="50"></textarea>

        <br><br>

        <label for="diagnostico">Diagnóstico:</label><br>
        <textarea id="diagnostico" name="diagnostico"
            rows="4" cols="50"></textarea>

        <br><br>

        <label for="conduta">Conduta:</label><br>
        <textarea id="conduta" name="conduta"
            rows="4" cols="50"></textarea>

        <br><br>

        <button type="submit">Salvar prontuário</button>
    </form>

</body>
</html>
