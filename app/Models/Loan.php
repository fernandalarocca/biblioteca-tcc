<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_id',
        'book_id',
        'quantity',
        'clients_name',
        'cpf',
        'phone',
        'date_to_return_book'
    ];
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
