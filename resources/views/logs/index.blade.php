<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logs do Sistema</title>
    @include("layouts.assets.bootstrap")
</head>
<body>
@include("layouts.partials.navbar")

<nav class="navbar navbar-expand-lg bg-dark mx-3 my-3">
    <div class="container-fluid">
        <p class="navbar-brand text-light fs-2 fw-bold">Logs do Sistema</p>
    </div>
</nav>

<div class="container mt-4">
    <div class="table-responsive">
        <table class="table table-striped bg-body">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Usuário</th>
                <th scope="col">Método</th>
                <th scope="col">Item</th>
                <th scope="col">Data</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log->user_email }}</td>
                    <td>{{ $log->method }}</td>
                    <td>{{ $log->item }}</td>
                    <td>{{ $log->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
