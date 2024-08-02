<div class="topo">
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Home</a></li>
            <li><a href="{{ route('cliente.index') }}">Cliente</a></li>
            <li><a href="{{ route('pedido.index') }}">Pedido</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Fornecedor</a></li>
            <li><a href="{{ route('produto.index') }}">Produto</a></li>
            <li>
                <form id="logout-form" action="{{ route('app.sair') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">Sair</button>
                </form>
            </li>
        </ul>
    </div>
</div>
