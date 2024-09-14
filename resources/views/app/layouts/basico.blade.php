<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>@yield('titulo')</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/logo-ia.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>  
  @include('app.layouts._partials.topo')
      <!-- Botão flutuante -->
      <!-- <button id="chatbot-btn">Chat</button> -->
      <i id="chatbot-btn" class="fa-regular fa-comments"></i>


      <!-- Janela do chatbot -->
      <div id="chatbot-container">
          <div id="chatbot-header">
            <h3>Chatbot</h3>
            <i class="fa-solid fa-x close-chat" id="close-chat"></i>
          </div>
          <div id="chat-body">
              <!-- Mensagens vão aparecer aqui -->
          </div>
          <div id="chatbot-footer">
              <input type="text" id="chat-input" placeholder="Digite sua mensagem...">
              <button id="send-btn">Enviar</button>
          </div>
      </div>
  @yield('conteudo')
  <script src="{{ asset('js/chatbot.js') }}"></script>
</body>

</html>
