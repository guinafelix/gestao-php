@extends('site.layouts.basico')

@section('titulo', 'Contato')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
              <form action="{{ route('site.login') }}" method="POST">
                @csrf
                <input type="text" name="usuario" placeholder="Usuário" class="borda-preta">
                <input type="password" name="senha" placeholder="Senha" class="borda-preta">
                <button type="submit" class="borda-preta">Acessar</button>
              </form>
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
            <span>guinafelixdev.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection
