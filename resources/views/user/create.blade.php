<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar Usuário</title>
    @include("layouts.assets.bootstrap")
</head>
<body>
@include("layouts.partials.navbar")

<div class="d-flex flex-column align-items-center justify-content-center vh-100 bg-dark text-light">
    <h1 class="mb-4 text-center">
        Preencha com as informações do usuário!
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
    <form action="{{ route('users.store') }}" method="POST" class="w-75">
        @csrf
        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Nome:</label>
            <input
                type="text"
                class="form-control"
                id="exampleInputName1"
                aria-describedby="nameHelp"
                placeholder="Insira o nome do usuário"
                name="name"
            >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">E-mail:</label>
            <input
                type="email"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="Insira o email do usuário"
                name="email"
            >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Senha:</label>
            <input
                type="password"
                class="form-control"
                id="exampleInputPassword1"
                aria-describedby="passwordHelp"
                placeholder="Insira a senha"
                name="password"
            >
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('users.list') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-success">Criar</button>
        </div>
    </form>
</div>

</body>
</html>
