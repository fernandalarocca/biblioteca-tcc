<?php

namespace App\Http\Requests;
use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;
use Closure;

class LoanRequest extends FormRequest
{
    public function rules()
    {
        return [
            'author_id' => ['required', 'integer', 'exists:authors,id'],
            'book_id' => ['required', 'integer', 'exists:books,id'],
            'quantity' => [
                'required',
                'integer',
                'min:1',
                function (string $attribute, mixed $value, Closure $fail) {
                    $book = Book::query()->find($this->book_id);
                    if (!$book || $book->quantity_in_stock < $value) {
                        $fail("The {$attribute} must not be greater than {$book->quantity_in_stock}.");
                    }
                },
            ],
            'clients_name' => ['required', 'string', 'min:3', 'max:255'],
            'cpf' => ['required', 'string', 'min:11', 'max:11'],
            'phone' => ['required', 'string', 'min10', 'max:50'],
            'date_to_return_book' => ['required', 'date'],
            'rebounded_book' => ['boolean', 'nullable']
        ];
    }
}
