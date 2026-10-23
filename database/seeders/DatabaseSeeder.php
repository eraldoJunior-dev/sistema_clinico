<?php

namespace Database\Seeders;

use App\Models\Consulta;
use App\Models\Paciente;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $paciente = Paciente::firstOrCreate(
            ['cpf' => '123.456.789-00'],
            [
                'nome' => 'Maria Silva',
                'data_nascimento' => '1990-05-10',
                'telefone' => '11999999999',
                'email' => 'maria@example.com',
            ]
        );

        $consulta = Consulta::firstOrCreate(
            ['paciente_id' => $paciente->id, 'data' => '2030-11-10', 'horario' => '14:00:00'],
            ['medico' => 'Dr. João Souza', 'motivo' => 'Dor de cabeça']
        );

        if (! $consulta->prontuario) {
            $consulta->prontuario()->create([
                'anamnese' => 'Cefaleia há três dias, de intensidade moderada.',
                'exame_fisico' => 'Pressão arterial 12x8 mmHg. Sem alterações neurológicas.',
                'diagnostico' => 'Cefaleia tensional.',
                'conduta' => 'Dipirona 500 mg a cada 6 horas, se necessário. Retorno em 15 dias.',
            ]);
        }
    }
}
