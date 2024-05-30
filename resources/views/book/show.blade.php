<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualizar Livro</title>
    @include("layouts.assets.bootstrap")
</head>
<body class="bg-dark">
@include("layouts.partials.navbar")

<nav class="navbar navbar-expand-lg bg-dark mx-3 my-3">
    <div class="container-fluid">
        <p class="navbar-brand text-light fs-2 fw-bold">Visualizar</p>
        <div class="ms-auto">
            <a href="{{ route('books.list') }}" type="button" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="card mb-3 mx-auto" style="max-width: 700px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Book_icon_%28closed%29_-_Blue_and_gold.svg/1170px-Book_icon_%28closed%29_-_Blue_and_gold.svg.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="card-text">Sinopse: {{ $book->synopsis }}</p>
                    <p class="card-text">Categoria: {{ $book->category }}</p>
                    <p class="card-text">Data de Publicação: {{ $book->published_at }}</p>
                    <p class="card-text">Id: {{ $book->id }}</p>
                    <p class="card-text">Autor: {{ $book->author->first_name }} {{ $book->author->last_name }}</p>
                    <p class="card-text"><small class="text-muted">Criado em: {{ $book->created_at }}</small></p>
                    <p class="card-text"><small class="text-muted">Editado em: {{ $book->updated_at }}</small></p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
