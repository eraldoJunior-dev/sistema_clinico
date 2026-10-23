<form action="{{ $action }}" method="POST">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <label for="anamnese">Anamnese:</label><br>
    <textarea id="anamnese" name="anamnese" rows="5" cols="50">{{ old('anamnese', $prontuario->anamnese) }}</textarea>
    <br><br>

    <label for="exame_fisico">Exame físico:</label><br>
    <textarea id="exame_fisico" name="exame_fisico" rows="5" cols="50">{{ old('exame_fisico', $prontuario->exame_fisico) }}</textarea>
    <br><br>

    <label for="diagnostico">Diagnóstico:</label><br>
    <textarea id="diagnostico" name="diagnostico" rows="4" cols="50">{{ old('diagnostico', $prontuario->diagnostico) }}</textarea>
    <br><br>

    <label for="conduta">Conduta:</label><br>
    <textarea id="conduta" name="conduta" rows="4" cols="50">{{ old('conduta', $prontuario->conduta) }}</textarea>
    <br><br>

    <button type="submit">{{ $submit }}</button>
</form>
