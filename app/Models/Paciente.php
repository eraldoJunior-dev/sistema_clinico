<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ['nome', 'data_nascimento', 'cpf', 'telefone', 'email'];

    protected $casts = [
        'data_nascimento' => 'date',
    ];

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}
