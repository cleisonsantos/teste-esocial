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
        $response = new \stdClass;
        try {
            Mail::to(env('MAIL_TO'))->send(new SendContactMail($contato));
            $response->mensagem = 'Mensagem enviada com sucesso!';
            $response->status = 200;
            return $response;
        } catch (\Throwable $th) {
            $response->mensagem = 'Contato salvo mas email não enviado';
            $response->status = 201;
            return $response;
        }
    }

    public function salvarAnexo($anexo)
    {
        $file = $anexo->store('anexos');
        return $file;
    }
}
