<?php

namespace Tests\Feature;

use App\Models\Consulta;
use App\Models\Paciente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClinicaTest extends TestCase
{
    use RefreshDatabase;

    private function criarPaciente(array $extra = []): Paciente
    {
        return Paciente::create(array_merge([
            'nome' => 'Maria Silva',
            'data_nascimento' => '1990-05-10',
            'cpf' => '123.456.789-00',
        ], $extra));
    }

    private function dadosConsulta(Paciente $paciente, array $extra = []): array
    {
        return array_merge([
            'paciente_id' => $paciente->id,
            'medico' => 'Dr. João',
            'data' => '2030-11-10',
            'horario' => '14:00',
            'motivo' => 'Check-up',
        ], $extra);
    }

    public function test_raiz_redireciona_para_pacientes(): void
    {
        $this->get('/')->assertRedirect('/pacientes');
    }

    public function test_cadastra_paciente(): void
    {
        $this->post('/pacientes', [
            'nome' => 'Ana',
            'data_nascimento' => '1985-01-01',
            'cpf' => '111.111.111-11',
        ])->assertSessionHasNoErrors();

        $this->assertDatabaseHas('pacientes', ['cpf' => '111.111.111-11']);
    }

    public function test_nao_aceita_cpf_duplicado(): void
    {
        $this->criarPaciente();

        $this->post('/pacientes', [
            'nome' => 'Outra pessoa',
            'data_nascimento' => '1985-01-01',
            'cpf' => '123.456.789-00',
        ])->assertSessionHasErrors('cpf');
    }

    public function test_agenda_consulta(): void
    {
        $paciente = $this->criarPaciente();

        $this->post('/consultas', $this->dadosConsulta($paciente))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('consultas', [
            'paciente_id' => $paciente->id,
            'horario' => '14:00:00',
        ]);
    }

    public function test_nao_permite_conflito_de_horario_do_mesmo_medico(): void
    {
        $paciente = $this->criarPaciente();

        $this->post('/consultas', $this->dadosConsulta($paciente));
        $this->post('/consultas', $this->dadosConsulta($paciente, ['motivo' => 'Outro']))
            ->assertSessionHasErrors('horario');

        $this->assertDatabaseCount('consultas', 1);
    }

    public function test_medicos_diferentes_podem_ter_o_mesmo_horario(): void
    {
        $paciente = $this->criarPaciente();

        $this->post('/consultas', $this->dadosConsulta($paciente));
        $this->post('/consultas', $this->dadosConsulta($paciente, ['medico' => 'Dra. Ana']))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseCount('consultas', 2);
    }

    public function test_reagendar_a_propria_consulta_no_mesmo_horario_nao_gera_conflito(): void
    {
        $paciente = $this->criarPaciente();
        $consulta = Consulta::create($this->dadosConsulta($paciente, ['horario' => '14:00:00']));

        $this->put("/consultas/{$consulta->id}", $this->dadosConsulta($paciente, ['motivo' => 'Retorno']))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('consultas', ['id' => $consulta->id, 'motivo' => 'Retorno']);
    }

    public function test_cria_prontuario_sem_duplicar(): void
    {
        $paciente = $this->criarPaciente();
        $consulta = Consulta::create($this->dadosConsulta($paciente, ['horario' => '14:00:00']));

        $this->post("/prontuarios/store/{$consulta->id}", ['anamnese' => 'Dor de cabeça']);
        $this->post("/prontuarios/store/{$consulta->id}", ['anamnese' => 'Outro texto']);

        $this->assertDatabaseCount('prontuarios', 1);
        $this->assertDatabaseHas('prontuarios', [
            'consulta_id' => $consulta->id,
            'anamnese' => 'Dor de cabeça',
        ]);
    }

    public function test_excluir_paciente_remove_consultas_e_prontuarios(): void
    {
        $paciente = $this->criarPaciente();
        $consulta = Consulta::create($this->dadosConsulta($paciente, ['horario' => '14:00:00']));
        $consulta->prontuario()->create(['anamnese' => 'Teste']);

        $this->delete("/pacientes/{$paciente->id}");

        $this->assertDatabaseCount('consultas', 0);
        $this->assertDatabaseCount('prontuarios', 0);
    }
}
