<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualizar Empréstimo</title>
    @include("layouts.assets.bootstrap")
</head>
<body>
@include("layouts.partials.navbar")

<nav class="navbar navbar-expand-lg bg-dark mx-3 my-3">
    <div class="container-fluid">
        <p class="navbar-brand text-light fs-2 fw-bold">Visualizar</p>
        <div class="ms-auto">
            <a href="{{ route('loans.list') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="card mb-3 mx-auto" style="max-width: 700px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5ByYtb7WHNDEgSzQsXqdqBlfnCySI5d1PyAjjFhi9N8yGNk0NPdhCBVsp_xi_762BeHQ&usqp=CAU" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Id do Empréstimo: {{ $loan->id }}</h5>
                    <h5 class="card-title">Nome do Cliente: {{ $loan->clients_name }}</h5>
                    <h5 class="card-title">CPF: {{ $loan->cpf }}</h5>
                    <h5 class="card-title">Telefone: {{ $loan->phone }}</h5>
                    <p class="card-text">Título do Livro: {{ $loan->book->title }} Id: {{ $loan->book->id }}</p>
                    <p class="card-text">Autor: {{ $loan->book->author->first_name }} {{ $loan->book->author->last_name }} Id: {{ $loan->book->author->id }}</p>
                    <p class="card-text">Data de Devolução: {{ $loan->date_to_return_book }}</p>
                    <p class="card-text">Livro devolvido: {{ $loan->rebounded_book ? 'Sim' : 'Não' }}</p>
                    <p class="card-text"><small class="text-muted">Criado em: {{ $loan->created_at }}</small></p>
                    <p class="card-text"><small class="text-muted">Editado em: {{ $loan->updated_at }}</small></p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
