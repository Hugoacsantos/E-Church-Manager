<?php

namespace App\Http\Requests;

use App\DTO\EventoDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateEventoRequest extends FormRequest
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
            'titulo' => 'required|min:5|max:255',
            'descricao' => 'required|min:10|max:255',
            'local' => 'required|min:10|max:255',
            'data' => 'required|date|after_or_equal:today'
        ];
    }

    public function toDTO() {
        return new EventoDTO($this->validated());
    }
}
