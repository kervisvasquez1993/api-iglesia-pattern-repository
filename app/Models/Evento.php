<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    
    protected $table = 'eventos';

    protected $fillable = [
        'nome',
        'descricao',
        'data_inicio',
        'data_fim',
        'localizacao',
        'status',
    ];
}
