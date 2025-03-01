<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $table = 'pages';
    protected $fillable = ['name', 'type', 'config'];

    protected $casts = [
        'config' => 'array',
    ];
}
