<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Consulta;

class Paciente extends Model
{
    public function consultas() {
        return $this->hasMany(Consulta::class);
    }
}


