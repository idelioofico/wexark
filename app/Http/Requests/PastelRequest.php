<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PastelRequest extends FormRequest
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

        $regra = ',' . ($this->pastel? : 'NULL') . ',id,deleted_at,NULL';

        return [
            'nome' => (empty($this->pastel) ? "required" : "nullable") . "|string|max:100|unique:pastels,nome" . $regra,
            'preco' => (empty($this->pastel) ? "required" : "nullable") . '|numeric',
            'foto' => (empty($this->pastel) ? "required" : "nullable") . '|image|',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'numeric' => 'O campo :attribute deve ser numérico',
            'image' => 'O campo :attribute deve conter uma imagem',
            'unique' => 'O dado introduzido  já existe',
        ];
    }
}
