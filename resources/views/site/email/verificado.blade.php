@extends('site.layouts.basico')

@section('titulo', 'Email')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>E-mail Verificado</h1>
        </div>

        <div class="informacao-pagina">
            <div class="form-login" style="width: 50%; margin-left: auto; margin-right: auto;">
                <p>Seu e-mail foi verificado com sucesso! Você pode agora <a href="{{ route('login') }}">fazer login</a>.</p>
            </div>
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