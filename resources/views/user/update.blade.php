<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Usuário</title>
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
    <form action="{{ route('users.update', $user->id) }}" method="POST" class="w-75">
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
                value="{{ $user->name }}"
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
                value="{{ $user->email }}"
            >
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('users.list') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-success">Editar</button>
        </div>
    </form>
    <div id="newPassword" class="form-text text-info mt-3" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Clique aqui para alterar a senha do usuário.</div>
</div>

<!-- Modal para alterar a senha -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Alterar Senha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.update.password', $user->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="newPasswordInput" class="form-label">Nova Senha</label>
                        <input type="password" class="form-control" id="newPasswordInput" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPasswordInput" class="form-label">Confirmar Nova Senha</label>
                        <input type="password" class="form-control" id="confirmPasswordInput" name="password_confirmation" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
