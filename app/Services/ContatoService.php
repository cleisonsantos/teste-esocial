<?php

namespace App\Services;

use App\Repositories\ContatoRepository;

class ContatoService
{
    public function salvarContato($dados)
    {
        $anexo = $this->salvarAnexo($dados['anexo']);
        $dados['anexo'] = $anexo;
        (new ContatoRepository)->registraContato($dados);
    }

    public function enviaEmail($dados)
    {
        
    }

    public function salvarAnexo($anexo)
    {
        $file = $anexo->store('anexos');
        return $file;
    }
}
