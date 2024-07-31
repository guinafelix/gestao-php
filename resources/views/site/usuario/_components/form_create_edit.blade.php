@if(isset($usuario->id))
    <form method="post" action="{{ route('usuario.update', ['usuario' => $usuario->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('usuario.store') }}">
        @csrf
@endif
        <input type="text" value="{{ old('usuario') }}" name="usuario" placeholder="Usuário" class="borda-preta">
        {{ $errors->has('usuario') ? $errors->first('usuario') :  ''  }}
        <input type="email" value="{{ old('email') }}" name="email" placeholder="Email" class="borda-preta">
        {{ $errors->has('email') ? $errors->first('email') :  ''  }}
        <input type="password" name="senha" placeholder="Senha" class="borda-preta">
        {{ $errors->has('senha') ? $errors->first('senha') :  ''  }}
        <input type="password" name="confirmar-senha" placeholder="Confirmar senha" class="borda-preta">
        {{ $errors->has('confirmar-senha') ? $errors->first('confirmar-senha') :  ''  }}
        <button type="submit" class="borda-preta">Acessar</button>
        </form>
        {{ isset($erro) && $erro != '' ? $erro : '' }}
<form>