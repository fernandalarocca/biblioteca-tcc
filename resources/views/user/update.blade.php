@include("layouts.partials.navbar")
@include("layouts.assets.bootstrap")

<div class="d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
    <h1 class="text-light mb-4">
        Preencha com as informações do usuário!
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
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label
                for="exampleInputName1"
                class="form-label text-light">
                Nome:
            </label>
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
            <label
                for="exampleInputEmail1"
                class="form-label text-light">
                E-mail:
            </label>
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
</div>
