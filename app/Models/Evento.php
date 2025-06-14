<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    
    protected $table = 'eventos';

    protected $fillable = [
        'nome',
        'descricao',
        'imagem',
        'data_inicio',
        'localizacao',
        'status',
    ];
}
