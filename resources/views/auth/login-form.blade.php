<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário de Login</title>
    @include("layouts.assets.bootstrap")
</head>
<body class="bg-dark">

<div class="d-flex flex-column align-items-center justify-content-center vh-100">
    <h1 class="text-light mb-4 text-center">
        Formulário de Login
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
    <form action="{{ route('loginPost') }}" method="POST" class="w-75">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-light">Endereço de e-mail:</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text text-info">Nós nunca compartilharemos seu e-mail.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-light">Senha</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-success">Enviar</button>
    </form>
</div>

</body>
</html>
