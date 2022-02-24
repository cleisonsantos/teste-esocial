<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = 'contatos';

    protected $fillable = [
        'email',
        'nome',
        'telefone',
        'mensagem',
        'anexo',
        'ip'
    ];
}
