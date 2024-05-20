@include("layouts.partials.navbar")
@include("layouts.assets.bootstrap")

<nav class="navbar bg-dark ms-5 me-5">
    <div class="container-fluid">
        <p class="navbar-brand text-light fs-2 fw-bold">Logs do Sistema</p>
    </div>
</nav>
<div class="container mt-2">
    <table class="table bg-body">
        <thead>
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
