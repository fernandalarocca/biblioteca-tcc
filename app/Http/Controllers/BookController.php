<?php

namespace App\Http\Controllers;

use App\Actions\Book\CreateBookAction;
use App\Actions\Book\UpdateBookAction;
use App\Exceptions\DeletionProhibitedException;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Author;
use App\Models\Book;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $authorsResource = Author::all();
        return view('book.create', compact('authorsResource'));
    }

    public function store(BookRequest $request)
    {
        $data = $request->validated();
        $book = (new CreateBookAction())->execute($data);
        Log::create([
            'user_email' => Auth::user()->email,
            'method' => 'criou',
            'item' => 'livro',
        ]);
        return redirect()->route('books.list');
    }

    public function edit(Book $book)
    {
        $authorsResource = Author::all();
        return view('book.update', compact('book', 'authorsResource'));
    }

    public function update(BookRequest $request, Book $book)
    {
        $data = $request->validated();
        $book = (new UpdateBookAction())->execute($data, $book);
        Log::create([
            'user_email' => Auth::user()->email,
            'method' => 'editou',
            'item' => 'livro',
        ]);
        return redirect()->route('books.list');
    }

    public function delete(Book $book)
    {
        try {
            $book->delete();
            Log::create([
                'user_email' => Auth::user()->email,
                'method' => 'excluiu',
                'item' => 'livro',
            ]);
            return redirect()->back()->with('success', 'Livro excluído com sucesso.');
        } catch (DeletionProhibitedException $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Ocorreu um erro ao excluir o livro.']);
        }
    }
}

