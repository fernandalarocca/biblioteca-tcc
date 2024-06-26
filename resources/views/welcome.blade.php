<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca</title>
    @include("layouts.assets.bootstrap")
</head>
<body class="bg-dark">
@yield('content')

<div class="d-flex flex-column align-items-center justify-content-center vh-100">
    <h1 class="text-light text-center fw-bolder mb-4">
        BEM-VINDO!
    </h1>
    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
</div>
</body>
</html>
