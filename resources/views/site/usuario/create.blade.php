@extends('site.layouts.basico')

@section('titulo', 'Usuario')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Cadastrar usuário</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('site.login') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div class="form-login">
                @component('site.usuario._components.form_create_edit')
                @endcomponent
            </div>
        </div>

    </div>
@endsection
