<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ficha do Paciente</h1>
    <h2>{{ $paciente->nome}}</h2>
    <p>Data de Nascimento:
        {{ $paciente->data_nascimento }}
    </p>

    <p>CPF:
        {{ $paciente->cpf }}
    </p>

    <p>Telefone:
        {{ $paciente->telefone }}
    </p>

    <p>E-mail:
        {{ $paciente->email }}
    </p>

    <br>

    <a href="/pacientes">Voltar para pacientes</a>
</body>
</html>