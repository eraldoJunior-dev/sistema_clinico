<form action="{{ $action }}" method="POST">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <label for="nome">Nome:</label>
    <input id="nome" type="text" name="nome" value="{{ old('nome', $paciente->nome) }}" required>
    <br><br>

    <label for="data_nascimento">Data de nascimento:</label>
    <input id="data_nascimento" type="date" name="data_nascimento"
           value="{{ old('data_nascimento', $paciente->data_nascimento?->format('Y-m-d')) }}" required>
    <br><br>

    <label for="cpf">CPF:</label>
    <input id="cpf" type="text" name="cpf" value="{{ old('cpf', $paciente->cpf) }}" required>
    <br><br>

    <label for="telefone">Telefone:</label>
    <input id="telefone" type="text" name="telefone" value="{{ old('telefone', $paciente->telefone) }}">
    <br><br>

    <label for="email">E-mail:</label>
    <input id="email" type="email" name="email" value="{{ old('email', $paciente->email) }}">
    <br><br>

    <button type="submit">{{ $submit }}</button>
</form>
