<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restock extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_id',
        'book_id',
        'quantity',
        'clients_name',
        'cpf',
        'phone',
        'loan_id'
    ];
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function loan()
    {
        return $this->belongsTo(Loan::class, 'loan_id','id');
    }
}
