<?php

namespace App\Http\Controllers;

use App\Actions\Author\CreateAuthorAction;
use App\Actions\Author\UpdateAuthorAction;
use App\Exceptions\DeletionProhibitedException;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Models\Log as LogModel;
use Illuminate\Support\Facades\Log;
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

        LogModel::create([
            'user_email' => Auth::user()->email,
            'method' => 'Criou',
            'item' => 'Autor: ' . $author->first_name . ' ' . $author->last_name,
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

        LogModel::create([
            'user_email' => Auth::user()->email,
            'method' => 'Editou',
            'item' => 'Autor: ' . $author->first_name . ' ' . $author->last_name,
        ]);

        return redirect()->route('authors.list');
    }

    public function delete(Author $author)
    {
        try {
            Log::info('Tentando excluir o autor:', ['author_id' => $author->id]);
            $author->delete();

            LogModel::create([
                'user_email' => Auth::user()->email,
                'method' => 'Excluiu',
                'item' => 'Autor: ' . $author->first_name . ' ' . $author->last_name,
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
