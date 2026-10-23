<form action="{{ $action }}" method="POST">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <label for="paciente_id">Paciente:</label>
    <select id="paciente_id" name="paciente_id" required>
        <option value="">Selecione o paciente</option>
        @foreach ($pacientes as $p)
            <option value="{{ $p->id }}"
                @selected(old('paciente_id', $consulta->paciente_id ?? $pacienteSelecionado) == $p->id)>
                {{ $p->nome }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label for="medico">Médico:</label>
    <input id="medico" type="text" name="medico" value="{{ old('medico', $consulta->medico) }}" required>
    <br><br>

    <label for="data">Data:</label>
    <input id="data" type="date" name="data"
           value="{{ old('data', $consulta->data?->format('Y-m-d')) }}" required>
    <br><br>

    <label for="horario">Horário:</label>
    <input id="horario" type="time" name="horario"
           value="{{ old('horario', $consulta->horario ? substr($consulta->horario, 0, 5) : null) }}" required>
    <br><br>

    <label for="motivo">Motivo da consulta:</label>
    <input id="motivo" type="text" name="motivo" value="{{ old('motivo', $consulta->motivo) }}" required>
    <br><br>

    <button type="submit">{{ $submit }}</button>
</form>
