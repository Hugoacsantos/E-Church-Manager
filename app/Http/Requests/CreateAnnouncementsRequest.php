<?php

namespace App\Http\Requests;

use App\DTO\AnnouncementsDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateAnnouncementsRequest extends FormRequest
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
            'criado_por' => 'required',
            'titulo' => 'nullable',
            'aviso' => 'required',
            'status' => 'nullable',
            'criado_em' => 'required|date'
        ];
    }

    public function toDTO() {
        return new AnnouncementsDTO($this->validated());
    }
}
