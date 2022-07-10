<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCliente extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome'        => 'required',
            'cpf'         => 'required|regex:/^((\d{3}).(\d{3}).(\d{3})-(\d{2}))*$/',
            'telefone'    => 'required',
            'placa_carro' => 'required|max:7|regex:/[A-Z]{3}[0-9][0-9A-Z][0-9]{2}/'
        ];
    }

    /**
     * Custom messages for Cliente Request
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required'        => 'O campo nome é obrigatório.',
            'cpf.required'         => 'O campo CPF é obrigatório.',
            'cpf.regex'            => 'CPF informado inválido.',
            'telefone.required'    => 'O campo telefone é obrigatório.',
            'placa_carro.required' => 'O campo placa do carro é obrigatório.',
            'placa_carro.regex'    => 'Placa do carro informada é inválida.',
            'placa_carro.max'      => 'Placa do carro informada é inválida.'
        ];
    }
}
