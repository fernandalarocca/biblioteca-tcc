@include("layouts.partials.navbar")
@include("layouts.assets.bootstrap")

<div class="d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
    <h1 class="text-light mb-4">
        Verifique seu endereço de e-mail
    </h1>
    @if (session('resent'))
        <div class="alert alert-success">
            Um novo link de verificação foi enviado para seu endereço de e-mail.
        </div>
    @endif
    <div class="text-light mb-4">
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
