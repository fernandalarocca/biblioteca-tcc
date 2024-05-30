<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Autor</title>
    @include("layouts.assets.bootstrap")
</head>
<body class="bg-dark">
@include("layouts.partials.navbar")

<div class="d-flex flex-column align-items-center justify-content-center">
    <h1 class="text-light mb-4 text-center mt-4">
        Preencha com as informações do autor!
    </h1>
    @if ($errors->any())
        <div class="alert alert-danger w-75">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('authors.update', $author->id) }}" method="POST" class="w-75">
        @csrf
        <div class="mb-3">
            <label for="exampleInputFirstName1" class="form-label text-light">Nome:</label>
            <input
                type="text"
                class="form-control"
                id="exampleInputFirstName1"
                aria-describedby="firstNameHelp"
                placeholder="Insira o nome"
                name="first_name"
                value="{{ $author->first_name }}"
            >
        </div>
        <div class="mb-3">
            <label for="exampleInputLastName1" class="form-label text-light">Sobrenome:</label>
            <input
                type="text"
                class="form-control"
                id="exampleInputLastName1"
                aria-describedby="lastNameHelp"
                placeholder="Insira o sobrenome"
                name="last_name"
                value="{{ $author->last_name }}"
            >
        </div>
        <div class="form-floating mb-3">
            <textarea
                class="form-control"
                placeholder="Deixe uma descrição aqui"
                id="floatingTextarea"
                name="description"
            >{{ $author->description }}</textarea>
            <label for="floatingTextarea">Descrição:</label>
        </div>
        <div class="mb-3">
            <label for="exampleInputAge1" class="form-label text-light">Idade:</label>
            <input
                type="number"
                class="form-control"
                id="exampleInputAge1"
                aria-describedby="ageHelp"
                placeholder="Insira a idade"
                name="age"
                value="{{ $author->age }}"
            >
        </div>
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('authors.list') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-success">Editar</button>
        </div>
    </form>
</div>

</body>
</html>
