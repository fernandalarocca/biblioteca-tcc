@include("layouts.partials.navbar")
@include("layouts.assets.bootstrap")

<div class="d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
    <h1 class="text-light mb-4">
        Preencha com as informações do empréstimo!
    </h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('loans.update', $loan->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label
                for="exampleInputClientsName1"
                class="form-label text-light">
                Nome do Cliente:
            </label>
            <input
                type="text"
                class="form-control"
                id="exampleInputClientsName1"
                aria-describedby="clientsNameHelp"
                placeholder="Insira o nome do cliente"
                name="clients_name"
                value="{{ $loan->clients_name }}"
            >
        </div>
        <div class="mb-3">
            <label
                for="exampleInputCPF1"
                class="form-label text-light">
                CPF:
            </label>
            <input
                type="text"
                class="form-control"
                id="exampleInputCPF1"
                aria-describedby="cpfHelp"
                placeholder="Insira o CPF"
                name="cpf"
                value="{{ $loan->cpf }}"
            >
        </div>
        <div class="mb-3">
            <label
                for="exampleInputPhone1"
                class="form-label text-light">
                Telefone:
            </label>
            <input
                type="tel"
                class="form-control"
                id="exampleInputPhone1"
                aria-describedby="phoneHelp"
                placeholder="Insira o telefone"
                name="phone"
                value="{{ $loan->phone }}"
            >
        </div>
        <div class="mb-3">
            <label
                for="exampleInputBook1"
                class="form-label text-light">
                Livro:
            </label>
            <input
                type="text"
                class="form-control"
                id="exampleInputBook1"
                aria-describedby="bookHelp"
                placeholder="Insira o id do livro"
                name="book_id"
                value="{{ $loan->book->id }}"
            >
        </div>
        <div class="mb-3">
            <label
                for="exampleInputAuthor1"
                class="form-label text-light">
                Autor:
            </label>
            <input
                type="text"
                class="form-control"
                id="exampleInputAuthor1"
                aria-describedby="AuthorHelp"
                placeholder="Insira o id do autor"
                name="author_id"
                value="{{ $loan->book->author->id }}"
            >
        </div>
        <div class="mb-3">
            <label
                for="exampleInputQuantity1"
                class="form-label text-light">
                Quantidade:
            </label>
            <input
                type="number"
                class="form-control"
                id="exampleInputQuantity1"
                aria-describedby="QuantityHelp"
                placeholder="Insira a quantidade"
                name="quantity"
                value="{{ $loan->quantity }}"
            >
        </div>
        <div class="mb-3">
            <label
                for="exampleInputReturn1"
                class="form-label text-light">
                Data de Devolução:
            </label>
            <input
                type="date"
                class="form-control"
                id="exampleInputReturn1"
                aria-describedby="ReturnHelp"
                placeholder="Insira a data de devolução"
                name="date_to_return_book"
                value="{{ $loan->date_to_return_book }}"
            >
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('loans.list') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-success">Criar</button>
        </div>
    </form>
</div>
