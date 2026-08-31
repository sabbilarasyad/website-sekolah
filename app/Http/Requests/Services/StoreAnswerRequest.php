<?php

namespace App\Http\Requests\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreAnswerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'content' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'Jawaban tidak boleh kosong.',
        ];
    }
}