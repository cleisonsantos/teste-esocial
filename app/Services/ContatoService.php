<?php

namespace App\Services;

use App\Repositories\ContatoRepository;

class ContatoService
{
    public function salvarContato($dados)
    {
        (new ContatoRepository)->registraContato($dados);
    }

    public function enviaEmail($dados)
    {
        
    }
}
