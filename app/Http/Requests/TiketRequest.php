<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TiketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Pastikan bisa diakses
    }

    public function rules(): array
    {
        return [
            'film_id' => 'required|exists:films,id',
            'showtime' => 'required|in:12:00,15:00,19:00',
            'studio' => 'required|in:1,2,3,4',
            'type' => 'required|in:Regular,VIP',
            'quantity' => 'required|integer|unique:tikets,quantity',
        ];
    }
}
