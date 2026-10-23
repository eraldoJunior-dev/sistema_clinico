<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = ['paciente_id', 'medico', 'data', 'horario', 'motivo'];

    protected $casts = [
        'data' => 'date',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function prontuario()
    {
        return $this->hasOne(Prontuario::class);
    }
}
