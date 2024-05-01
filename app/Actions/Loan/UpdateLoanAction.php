<?php

namespace App\Actions\Loan;

use App\Http\Resources\LoanResource;
use App\Models\Book;
use App\Models\Loan;

class UpdateLoanAction
{
    public function execute(array $data, Loan $loan): LoanResource
    {
        if (isset($data['rebounded_book']) && $data['rebounded_book'] && !$loan->rebounded_book) {
            $book = Book::findOrFail($loan->book_id);
            $book->increment('quantity_in_stock', $loan->quantity);
        }
        $loan->update($data);
        return LoanResource::make($loan);
    }
}
