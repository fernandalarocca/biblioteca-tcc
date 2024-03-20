@include("layouts.partials.navbar")
@include("layouts.assets.bootstrap")
<nav class="navbar bg-dark ms-5 me-5">
    <div class="container-fluid">
        <p class="navbar-brand text-light fs-2 fw-bold">Devoluções</p>
        <div class="navbar-end">
            <a href="{{ route("restocks.create") }}" class="btn btn-success">Nova Devolução</a>
        </div>
    </div>
</nav>
<div class="container mt-2">
    <table class="table bg-body">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome do Cliente</th>
            <th scope="col">CPF</th>
            <th scope="col">Telefone</th>
            <th scope="col">Livro</th>
            <th scope="col">Autor</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Id do Empréstimo</th>
            <th scope="col">Criado em</th>
            <th scope="col">Editado em</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach($restocksResource as $restock)
            <tr>
                <th scope="row">{{ $restock->id }}</th>
                <td>{{ $restock->book->title }}</td>
                <td>{{ $restock->clients_name }}</td>
                <td>{{ $restock->cpf }}</td>
                <td>{{ $restock->phone }}</td>
                <td>{{ $restock->book->author->first_name }} {{ $restock->book->author->last_name }}</td>
                <td>{{ $restock->quantity }}</td>
                <td>{{ $restock->loan->id }}</td>
                <td>{{ $restock->created_at }}</td>
                <td>{{ $restock->updated_at }}</td>
                <td>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('restocks.show', $restock->id) }}" type="button" class="btn btn-info btn-sm ms-2">Ver</a>
                        <a href="{{ route('restocks.edit', $restock->id) }}" type="button" class="btn btn-warning btn-sm ms-2">Editar</a>
                        <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="{{ "#restocksDelete".$restock->id }}">
                            Excluir
                        </button>
                    </div>
                </td>
            </tr>
            <div class="modal fade" id="{{ "restocksDelete".$restock->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Atenção!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('restocks.delete', $restock->id) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                Tem certeza que deseja excluir esta Devolução?
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
