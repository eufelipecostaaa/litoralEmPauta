<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colunista extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'email', 'descricao',
        // Adicione outros campos conforme necessário
    ];
}
