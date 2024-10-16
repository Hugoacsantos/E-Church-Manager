<?php

namespace App\Http\Requests;

use App\DTO\MembroFamiliaDTO;
use Illuminate\Foundation\Http\FormRequest;
use stdClass;

class AddMembroFamilia extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'familia_id' => 'required',
            'user_id' => 'required'
        ];
    }

    public function toDTO() {
        return new MembroFamiliaDTO($this->validate());
    }
}
