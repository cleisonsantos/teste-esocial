<?php

namespace App\Repositories;

use App\Models\Contato;

class ContatoRepository
{
    protected $model = Contato::class;

    public function registraContato($dados)
    {
        return $this->model::create($dados);
    }
}
