<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualizar Usuário</title>
    @include("layouts.assets.bootstrap")
</head>
<body>
@include("layouts.partials.navbar")

<nav class="navbar navbar-expand-lg bg-dark mx-3 my-3">
    <div class="container-fluid">
        <p class="navbar-brand text-light fs-2 fw-bold">Visualizar</p>
        <div class="ms-auto">
            <a href="{{ route('users.list') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="card mb-3 mx-auto" style="max-width: 700px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="https://www.svgrepo.com/show/105517/user-icon.svg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Nome: {{ $user->name }}</h5>
                    <p class="card-text">Id: {{ $user->id }}</p>
                    <p class="card-text">E-mail: {{ $user->email }}</p>
                    <p class="card-text"><small class="text-muted">Criado em: {{ $user->created_at }}</small></p>
                    <p class="card-text"><small class="text-muted">Editado em: {{ $user->updated_at }}</small></p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
