<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
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
            'cliente_id' => 'required|exists:clientes,id',
            'data_criacao' => 'required|date|date_format:Y-m-d',
            'items.*.pastel_id'=>'required|exists:pastels,id',
            'items.*.quantidade'=>'required|numeric|integer|min:1'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'exists' => 'O :attribute informado não existe',
            'date' => 'O campo deve ser do tipo data',
            'integer'=>'O :attribute deve ser numérico',
        ];
    }
}
