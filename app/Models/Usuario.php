<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['name', 'email', 'password'];

    public function favoritos()
    {
        return $this->hasMany(Favorito::class);
    }

    public function colunistas()
    {
        return $this->hasMany(Colunista::class);
    }
}
