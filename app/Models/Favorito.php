<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    protected $fillable = ['usuario_id', 'colunista_id'];
    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function colunista()
    {
        return $this->belongsTo(Colunista::class);
    }
}
