<?php

namespace App\Factories;
use App\Http\Services\ChatGPTService;

class ChatServiceFactory
{
    public static function createChatGPTService()
    {
        return new ChatGPTService();;
    }
}
