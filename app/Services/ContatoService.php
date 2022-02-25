<?php

namespace App\Services;

use App\Mail\SendContactMail;
use App\Repositories\ContatoRepository;
use Illuminate\Support\Facades\Mail;

class ContatoService
{
    public function salvarContato($dados)
    {
        $anexo = $this->salvarAnexo($dados['anexo']);
        $dados['anexo'] = $anexo;
        $contato = (new ContatoRepository)->registraContato($dados);
        Mail::to(env('MAIL_TO'))->send(new SendContactMail($contato));
    }

    public function salvarAnexo($anexo)
    {
        $file = $anexo->store('anexos');
        return $file;
    }
}
