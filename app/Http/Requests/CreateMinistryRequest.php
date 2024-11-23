<?php

namespace App\Http\Requests;

use App\DTO\MinistryDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateMinistryRequest extends FormRequest
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
            'titulo' => 'required|min:3',
            'descricao' => 'required|min:5',
            'status' => 'nullable'
        ];
    }

    public function toDTO(){
        return new MinistryDTO($this->validated());
    }
}
