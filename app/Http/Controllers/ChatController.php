<?php

namespace App\Http\Controllers;

use App\AiAgents\EduHelperAgent;
use Exception;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'question' => 'required|string'
        ]);

        $reply = EduHelperAgent::handleChat(
            $request->input('question')
        );

        return response()->json([
            'reply' => $reply
        ]);
    }



}
