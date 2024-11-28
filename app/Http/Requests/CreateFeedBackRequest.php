<?php

namespace App\Http\Requests;

use App\DTO\FeedbackDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateFeedBackRequest extends FormRequest
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
            'user' => 'required|max:255',
            'titulo' => 'nullable',
            'texto' => 'required',
            'data' => 'required|date',
            'tipo_de_feedback' => 'required|string|max:255'
        ];
    }

    public function toDTO() {
        return new FeedbackDTO($this->validated());
    }
}
