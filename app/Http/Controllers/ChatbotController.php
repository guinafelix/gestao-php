<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Strategies\ChatGPTStrategy;
use App\ChatbotContext;

class ChatbotController extends Controller
{
    //
    public function chat(Request $request)
    {
        $message = $request->input('message');
        $chatContext = new ChatbotContext(new ChatGPTStrategy());
        
        $response = $chatContext->respond($message);

        return response()->json(['response' => $response]);
    }
}
