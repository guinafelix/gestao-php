<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>@yield('titulo')</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{ asset('img/logo-ia.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}" type="text/css">
</head>

<body>
  @include('site.layouts._partials.topo')
  @yield('conteudo')
</body>

</html>
