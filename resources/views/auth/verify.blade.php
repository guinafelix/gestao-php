@extends('site.layouts.basico')

@section('titulo', 'Verique seu email')

@section('conteudo')
<div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Verique seu email.</h1>
        </div>

        <div class="informacao-pagina">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('Um novo email de verificação foi enviado para o seu email.') }}
                </div>
            @endif

            {{ __('Antes de prosseguir, verifique seu email para acessar o link de verificação.') }}
            {{ __('Se você não recebeu o link') }},
            <form class="form-login" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="borda-preta">{{ __('clique aqui para enviar novamente.') }}</button>.
            </form>
        </div>
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="img/facebook.png">
            <img src="img/linkedin.png">
            <img src="img/youtube.png">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(85) 9 9412-2172</span>
            <br>
            <span>contato@planeja.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection
