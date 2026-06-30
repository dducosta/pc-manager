<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peca extends Model
{
    protected $fillable = [
        'nome',
        'categoria',
        'fabricante',
        'modelo',
        'quantidade',
        'preco',
        'descricao'
    ];
}