<?php

namespace App\Strategies;

interface ChatStrategy
{
    public function reply(string $message): string;
}
