<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualizar Autor</title>
    @include("layouts.assets.bootstrap")
</head>
<body class="bg-dark">
@include("layouts.partials.navbar")

<nav class="navbar navbar-expand-lg bg-dark mx-3 my-3">
    <div class="container-fluid">
        <p class="navbar-brand text-light fs-2 fw-bold">Visualizar</p>
        <div class="ms-auto">
            <a href="{{ route('authors.list') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="card mb-3 mx-auto" style="max-width: 700px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPwJNsaByzqtFXGfQwtfiuCE3NacABzUZ5GQ&usqp=CAU" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $author->first_name }} {{ $author->last_name }}</h5>
                    <p class="card-text">Descrição: {{ $author->description }}</p>
                    <p class="card-text">Idade: {{ $author->age }}</p>
                    <p class="card-text">Id: {{ $author->id }}</p>
                    <p class="card-text"><small class="text-muted">Criado em: {{ $author->created_at }}</small></p>
                    <p class="card-text"><small class="text-muted">Editado em: {{ $author->updated_at }}</small></p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
