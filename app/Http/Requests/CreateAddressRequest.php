<?php

namespace App\Http\Requests;

use App\DTO\AddressDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'rua' => 'required|min:3|max:255',
            'numero' => 'required|min:1',
            'complemento' => 'required|min:3',
            'bairro' => 'required|min:3',
            'cidade' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'O campo usuário é obrigatório.',
            'rua.required' => 'O campo rua é obrigatório.',
            'numero.required' => 'O campo número é obrigatório.',
            'bairro.required' => 'O campo bairro é obrigatório.',
        ];
    }

    public function toDTO() {
        return new AddressDTO($this->validated());
    }
}
