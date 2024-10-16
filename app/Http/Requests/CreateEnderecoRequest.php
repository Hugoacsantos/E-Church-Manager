<?php

namespace App\Http\Requests;

use App\DTO\EnderecoDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateEnderecoRequest extends FormRequest
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
            'rua' => 'required|min:10|max:255',
            'numero' => 'required|min:1',
            'complemento' => 'required|min:10',
            'bairro' => 'required|min:3'
        ];
    }

    public function messages()
    {
        
    }

    public function toDTO() {
        return new EnderecoDTO($this->validated());
    }
}
