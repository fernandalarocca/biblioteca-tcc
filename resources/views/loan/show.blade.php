@include("layouts.partials.navbar")
@include("layouts.assets.bootstrap")
<nav class="navbar bg-dark ms-5 me-5">
    <div class="container-fluid">
        <p class="navbar-brand text-light fs-2 fw-bold">Visualizar</p>
        <div class="navbar-end">
            <a href="{{ route('loans.list') }}" type="button" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</nav>
<div class="card mb-3 ms-5 me-5" style="max-width: 700px;">
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
                <p class="card-text"><small>Criado em: {{ $loan->created_at }}</small></p>
                <p class="card-text"><small>Editado em: {{ $loan->updated_at }}</small></p>
            </div>
        </div>
    </div>
</div>
