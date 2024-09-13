<?php

namespace App;

use App\Strategies\ChatStrategy;

class ChatbotContext
{
    protected $strategy;

    public function __construct(ChatStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function respond(string $message)
    {
        return $this->strategy->reply($message);
    }
}
