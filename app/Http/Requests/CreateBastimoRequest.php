<?php

namespace App\Http\Requests;

use App\DTO\BaptismDTO;
use App\DTO\BatismoDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateBastimoRequest extends FormRequest
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
            'data_batismo' => 'required|date|after_or_equal:today',
            'membro_id' => 'required',
            'batizado_por' => 'required'
        ];
    }

    public function toDTO() {
        return new BaptismDTO($this->validated());
    }
}
