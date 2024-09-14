<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Strategies\ChatGPTStrategy;
use App\Strategies\Context\ChatbotContext;

class ChatbotController extends Controller
{
    //
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $chatContext = new ChatbotContext(new ChatGPTStrategy());
        
        $response = $chatContext->respond($message);

        return response()->json(['response' => $response]);
    }
}
