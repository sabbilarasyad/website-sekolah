<?php

namespace App\Http\Requests\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul pertanyaan wajib diisi.',
            'content.required' => 'Isi pertanyaan tidak boleh kosong.',
        ];
    }
}