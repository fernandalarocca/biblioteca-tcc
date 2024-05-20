<?php

namespace App\Http\Controllers;

use App\Actions\Author\CreateAuthorAction;
use App\Actions\Author\UpdateAuthorAction;
use App\Exceptions\DeletionProhibitedException;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function list()
    {
        $perpage = request()->query('limit', 5);
        $authors = Author::query()->paginate($perpage);
        $authorsResource = AuthorResource::collection($authors);
        return view("author.index", compact("authorsResource"));
    }

    public function show(Author $author)
    {
        $author = AuthorResource::make($author);
        return view('author.show', compact("author"));
    }

    public function create()
    {
        return view('author.create');
    }

    public function store(AuthorRequest $request)
    {
        $data = $request->validated();
        $author = (new CreateAuthorAction())->execute($data);
        Log::create([
            'user_email' => Auth::user()->email,
            'method' => 'criou',
            'item' => 'autor',
        ]);
        return redirect()->route('authors.list');
    }

    public function edit(Author $author)
    {
        return view('author.update', compact("author"));
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $data = $request->validated();
        $author = (new UpdateAuthorAction())->execute($data, $author);
        Log::create([
            'user_email' => Auth::user()->email,
            'method' => 'editou',
            'item' => 'autor',
        ]);
        return redirect()->route('authors.list');
    }

    public function delete(Author $author)
    {
        try {
            Log::info('Tentando excluir o autor:', ['author_id' => $author->id]);
            $author->delete();
            Log::create([
                'user_email' => Auth::user()->email,
                'method' => 'excluiu',
                'item' => 'autor',
            ]);
            Log::info('Autor excluído com sucesso:', ['author_id' => $author->id]);
            return redirect()->back()->with('success', 'Autor excluído com sucesso.');
        } catch (DeletionProhibitedException $e) {
            Log::error('Erro ao excluir o autor (DeletionProhibitedException):', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            Log::error('Erro ao excluir o autor (Exception):', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Ocorreu um erro ao excluir o autor.']);
        }
    }
}

