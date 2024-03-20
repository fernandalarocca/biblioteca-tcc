<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class RestockRequest extends FormRequest
{
    public function rules()
    {
        return [
            'author_id' => ['required', 'integer', 'exists:authors,id'],
            'book_id' => ['required', 'integer', 'exists:books,id'],
            'quantity' => ['required', 'integer', 'min:1'],
            'clients_name' => ['required', 'string', 'min:3', 'max:255'],
            'cpf' => ['required', 'string', 'min:11', 'max:11'],
            'phone' => ['required', 'string', 'min:10', 'max:50'],
            'loan_id' => ['required', 'integer', 'exists:loans,id']
        ];
    }
}
