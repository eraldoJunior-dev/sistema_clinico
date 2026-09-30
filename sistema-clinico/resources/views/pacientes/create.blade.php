<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Paciente</title>
</head>
<body>

    <h1>Cadastrar Paciente</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/pacientes" method="POST">

        @csrf

        <label>Nome:</label>
        <input type="text" name="nome">

        <br><br>

        <label>Data de nascimento:</label>
        <input type="date" name="data_nascimento">

        <br><br>

        <label>CPF:</label>
        <input type="text" name="cpf">

        <br><br>

        <label>Telefone:</label>
        <input type="text" name="telefone">

        <br><br>

        <label>E-mail:</label>
        <input type="email" name="email">

        <br><br>

        <button type="submit">Cadastrar</button>

    </form>

    <br>

    <a href="/pacientes">Voltar</a>

</body>
</html>