<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
       

        $regra = ',' . (!empty($this->cliente) ? $this->cliente->id : 'Null') . ',id,deleted_at,NULL';

        return [
            'nome' => 'required|string|max:100|unique:clientes,nome' . $regra,
            'email' => 'required|email|max:40|unique:clientes,email' . $regra,
            'telefone' => 'required|string|max:15|unique:clientes,telefone' . $regra,
            'data_nascimento' => 'nullable|date|date_format:Y-m-d',
            'endereco' => 'required|string|max:200',
            'bairro' => 'required|string|max:100',
            'complemento_endereco' => 'nullable|string|max:100',
            'cep' => 'required|max:4',
            'data_cadastro' => 'required|date|date_format:Y-m-d'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'string' => 'O campo deve ser composto por caracteres',
            'email' => 'Deve introduzir um email válido, ex:utilizador@dominio.com',
            'max' => 'O campo não pode ultrapassar :max caracteres',
            'unique' => 'O dado introduzido  já existe',
            'date_format' => 'Introduza um formato válido para data(Y-m-d)',
            'date' => 'O campo deve ser do tipo data',
        ];
    }
}
