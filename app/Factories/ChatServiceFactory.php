<?php

namespace App\Factories;

use App\Services\ChatGPTService;

class ChatServiceFactory
{
    public static function createChatGPTService()
    {
        return new ChatGPTService();
    }
}
