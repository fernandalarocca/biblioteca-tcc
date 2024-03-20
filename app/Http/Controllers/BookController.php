<?php

namespace App\Http\Controllers;

use App\Actions\Book\CreateBookAction;
use App\Actions\Book\UpdateBookAction;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    public function list()
    {
        $perpage = request()->query('limit', 5);
        $books = Book::query()->paginate($perpage);
        $booksResource = BookResource::collection($books);
        return view("book.index", compact("booksResource"));
    }

    public function show(Book $book)
    {
        $book = BookResource::make($book);
        return view('book.show', compact("book"));
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(BookRequest $request)
    {
        $data = $request->validated();
        $book = (new CreateBookAction())->execute($data);
        return redirect()->route('books.list');
    }

    public function edit(Book $book)
    {
        return view('book.update', compact("book"));
    }

    public function update(BookRequest $request, Book $book)
    {
        $data = $request->validated();
        $book = (new UpdateBookAction())->execute($data, $book);
        return redirect()->route('books.list');
    }

    public function delete(Book $book)
    {
        $book->loans()->delete();
        $book->delete();
        return redirect()->back();
    }
}
