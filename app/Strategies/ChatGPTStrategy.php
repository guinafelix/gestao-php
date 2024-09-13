<?php

namespace App\Strategies;

use App\Factories\ChatServiceFactory;

class ChatGPTStrategy implements ChatStrategy
{
    protected $chatService;

    public function __construct()
    {
        $this->chatService = ChatServiceFactory::createChatGPTService();
    }

    public function reply(string $message): string
    {
        $response = $this->chatService->sendMessage($message);
        return $response['choices'][0]['message']['content'] ?? 'No response';
    }
}
