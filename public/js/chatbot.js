$(document).ready(function() {
    // Função para alternar a visibilidade da janela do chatbot
    $('#chatbot-btn').click(function() {
        var $chatbotContainer = $('#chatbot-container');
        if ($chatbotContainer.css('display') === 'none') {
            $chatbotContainer.css('display', 'flex');  // Mostra o chatbot com display: flex
        } else {
            $chatbotContainer.css('display', 'none');  // Oculta o chatbot
        }
    });

    $('#close-chat').click(function () {
        var $chatbotContainer = $('#chatbot-container');
        $chatbotContainer.css('display', 'none');
    });

    // Função para enviar a mensagem ao clicar no botão "Enviar"
    $('#send-btn').click(function() {
        enviarMensagem();
    });

    // Função para enviar a mensagem quando pressionar "Enter" no campo de input
    $('#chat-input').keypress(function(e) {
        if (e.which == 13) { // Verifica se a tecla pressionada é "Enter"
            enviarMensagem();
        }
    });

    // Função para rolar automaticamente para o final do chat quando uma nova mensagem for enviada
    function scrollToBottom() {
        var chatBody = $('#chat-body');
        chatBody.scrollTop(chatBody[0].scrollHeight);
    }

    // Função principal para enviar a mensagem ao chatbot
    function enviarMensagem() {
        var message = $('#chat-input').val().trim();  // Obtém o valor do input e remove espaços em branco desnecessários

        // Verifica se a mensagem está vazia, se sim, não envia
        if (message === '') return;

        // Adiciona a mensagem do usuário na interface do chat
        $('#chat-body').append('<p><strong>Você:</strong> ' + message + '</p>');

        // Limpa o campo de input após enviar a mensagem
        $('#chat-input').val('');

        // Faz a requisição AJAX para o backend Laravel
        $.ajax({
            url: '/chatbot/send-message',  // Rota que irá processar a mensagem
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // CSRF token para proteção
            },
            data: {
                message: message  // Envia a mensagem digitada pelo usuário
            },
            success: function(response) {
                // Exibe a resposta do chatbot no chat
                $('#chat-body').append('<p><strong>PlanejAI:</strong> ' + response.response + '</p>');

                // Rola o chat para o final
                scrollToBottom();
            },
            error: function(xhr, status, error) {
                // Exibe uma mensagem de erro no caso de falha na requisição
                $('#chat-body').append('<p><strong>Erro:</strong> Não foi possível enviar a mensagem. Tente novamente mais tarde.</p>');

                // Rola o chat para o final
                scrollToBottom();
            }
        });
    }
});
