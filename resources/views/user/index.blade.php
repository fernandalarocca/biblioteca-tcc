<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuários</title>
    @include("layouts.assets.bootstrap")
</head>
<body>
@include("layouts.partials.navbar")

<nav class="navbar navbar-expand-lg bg-dark ms-3 me-3">
    <div class="container-fluid">
        <p class="navbar-brand text-light fs-2 fw-bold">Usuários</p>
        <div class="ms-auto">
            <a href="{{ route("users.create") }}" class="btn btn-success">Novo Usuário</a>
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
    <table class="table table-responsive bg-body">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Criado em</th>
            <th scope="col">Editado em</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach($usersResource as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm ms-1 me-1">Ver</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm ms-1 me-1">Editar</a>
                        <button type="button" class="btn btn-danger btn-sm ms-1 me-1" data-bs-toggle="modal" data-bs-target="{{ "#usersDelete".$user->id }}">
                            Excluir
                        </button>
                    </div>
                </td>
            </tr>
            <div class="modal fade" id="{{ "usersDelete".$user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Atenção!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('users.delete', $user->id) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                Tem certeza que deseja excluir este usuário?
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

</body>
</html>
