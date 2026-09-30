<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Paciente</title>
</head>
<body>

    <h1>Editar Paciente</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pacientes.update', $paciente) }}" method="POST">

        @csrf
        @method('PUT')

        <label>Nome:</label>
        <input type="text" name="nome" value="{{ $paciente->nome }}">

        <br><br>

        <label>Data de nascimento:</label>
        <input
            type="date"
            name="data_nascimento"
            value="{{ $paciente->data_nascimento }}"
        >

        <br><br>

        <label>CPF:</label>
        <input type="text" name="cpf" value="{{ $paciente->cpf }}">

        <br><br>

        <label>Telefone:</label>
        <input type="text" name="telefone" value="{{ $paciente->telefone }}">

        <br><br>

        <label>E-mail:</label>
        <input type="email" name="email" value="{{ $paciente->email }}">

        <br><br>

        <button type="submit">Salvar alterações</button>

    </form>

    <br>

    <a href="{{ route('pacientes.index') }}">Voltar</a>

</body>
</html>