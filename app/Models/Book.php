<?php

namespace App\Models;

use App\Exceptions\DeletionProhibitedException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'synopsis',
        'category',
        'published_at',
        'quantity_in_stock',
        'author_id'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id','id');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($book) {
            if ($book->loans()->count() > 0) {
                throw new DeletionProhibitedException("Este livro não pode ser excluído porque está associado a um empréstimo.");
            }
        });
    }
}
