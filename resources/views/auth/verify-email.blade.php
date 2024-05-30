<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifique seu endereço de e-mail</title>
    @include("layouts.assets.bootstrap")
</head>
<body class="bg-dark">
@include("layouts.partials.navbar")

<div class="d-flex flex-column align-items-center justify-content-center vh-100">
    <h1 class="text-light mb-4 text-center">
        Verifique seu endereço de e-mail
    </h1>
    @if (session('resent'))
        <div class="alert alert-success w-75 text-center">
            Um novo link de verificação foi enviado para seu endereço de e-mail.
        </div>
    @endif
    <div class="text-light mb-4 text-center w-75">
        Antes de continuar, por favor verifique seu e-mail para o link de verificação.
        <br>
        Se você não recebeu o e-mail,
    </div>
    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-info">
            clique aqui para solicitar outro
        </button>.
    </form>
</div>

</body>
</html>
