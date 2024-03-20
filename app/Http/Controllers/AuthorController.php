<?php

namespace App\Http\Controllers;

use App\Actions\Author\CreateAuthorAction;
use App\Actions\Author\UpdateAuthorAction;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;

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
        return redirect()->route('authors.list');
    }

    public function delete(Author $author)
    {
        $author->loans()->delete();
        $author->delete();
        return redirect()->back();
    }
}
