<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'description',
    ];

    public function book()
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
