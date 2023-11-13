<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colunista extends Model
{
    protected $fillable = ['nome', 'email', 'descricao'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
