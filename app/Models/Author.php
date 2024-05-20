<?php

namespace App\Models;

use App\Exceptions\DeletionProhibitedException;
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

    public function books()
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($author) {
            if ($author->books()->count() > 0 || $author->loans()->count() > 0) {
                throw new DeletionProhibitedException("Este autor não pode ser excluído porque está associado a um livro ou empréstimo.");
            }
        });
    }
}
