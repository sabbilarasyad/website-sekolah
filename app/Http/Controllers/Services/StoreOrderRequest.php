<?php

namespace App\Http\Requests\Services;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth; // <-- Tambahkan ini

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check(); // <-- Gunakan Facade Auth
    }

    public function rules(): array
    {
        return [
            'items' => ['required', 'array', 'min:1'],
            'items.*.product_id' => ['required', 'exists:products,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'items.required' => 'Minimal pilih 1 produk untuk memesan.',
            'items.*.product_id.exists' => 'Produk yang dipilih tidak ditemukan.',
            'items.*.quantity.min' => 'Jumlah pesanan minimal 1.',
        ];
    }
}