<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:255',
            'email' => 'required|email',
            'telefone' => 'required',
            'mensagem' => 'required',
            'anexo' => 'max:500|mimes:pdf,doc,docx,odt,txt',
        ];
    }

    public function messages()
    {
        return [            
            'nome.required' => 'O nome de contato é requerido!',
            'email.required' => 'O e-mail de contato é requerido!',
            'email.email' => 'O e-mail é inválido!',
            'telefone.required' => 'O telefone de contato é requerido!',
            'mensagem.required' => 'O mensagem é requerida!',
            'anexo.max' => 'O anexo é maior que 500KB!',
            'anexo.mimetypes' => 'O anexo precisa ser do formato pdf, doc, docx, odt, txt!',
        ];
    }
}
