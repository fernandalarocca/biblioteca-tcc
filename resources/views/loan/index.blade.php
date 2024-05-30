<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empréstimos</title>
    @include("layouts.assets.bootstrap")
</head>
<body>
@include("layouts.partials.navbar")

<nav class="navbar navbar-expand-lg bg-dark mx-3 my-3">
    <div class="container-fluid">
        <p class="navbar-brand text-light fs-2 fw-bold">Empréstimos</p>
        <div class="ms-auto">
            <a href="{{ route("loans.create") }}" class="btn btn-success">Novo Empréstimo</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped bg-body">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome do Cliente</th>
                <th scope="col">CPF</th>
                <th scope="col">Telefone</th>
                <th scope="col">Livro</th>
                <th scope="col">Autor</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Data de Devolução</th>
                <th scope="col">Livro devolvido?</th>
                <th scope="col">Criado em</th>
                <th scope="col">Editado em</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($loansResource as $loan)
                <tr>
                    <th scope="row">{{ $loan->id }}</th>
                    <td>{{ $loan->clients_name }}</td>
                    <td>{{ $loan->cpf }}</td>
                    <td>{{ $loan->phone }}</td>
                    <td>{{ $loan->book->title }}</td>
                    <td>{{ $loan->book->author->first_name }} {{ $loan->book->author->last_name }}</td>
                    <td>{{ $loan->quantity }}</td>
                    <td>{{ $loan->date_to_return_book }}</td>
                    <td>{{ $loan->rebounded_book ? 'Sim' : 'Não' }}</td>
                    <td>{{ $loan->created_at }}</td>
                    <td>{{ $loan->updated_at }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('loans.show', $loan->id) }}" type="button" class="btn btn-info btn-sm ms-1 me-1">Ver</a>
                            <a href="{{ route('loans.edit', $loan->id) }}" type="button" class="btn btn-warning btn-sm ms-1 me-1">Editar</a>
                            <button type="button" class="btn btn-danger btn-sm ms-1 me-1" data-bs-toggle="modal" data-bs-target="{{ "#loansDelete".$loan->id }}">
                                Excluir
                            </button>
                        </div>
                    </td>
                </tr>
                <div class="modal fade" id="{{ "loansDelete".$loan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Atenção!</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('loans.delete', $loan->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    Tem certeza que deseja excluir este empréstimo?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
