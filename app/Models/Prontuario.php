<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Consulta;

class Prontuario extends Model
{

    protected $fillable = [
        'consulta_id',
        'anamnese',
        'exame_fisico',
        'diagnostico',
        'conduta',
    ];

    public function consulta()
    {
        return $this->belongsTo(Consulta::class);
    }
}
