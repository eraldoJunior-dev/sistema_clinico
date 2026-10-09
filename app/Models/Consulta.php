<?php

namespace App\Models;

use App\Models\Paciente;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    public function paciente() {
        return $this->belongsTo(Paciente::class);
    }

    public function prontuario() {
        return $this->hasOne(Prontuario::class);
    }
}
