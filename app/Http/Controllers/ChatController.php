<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\TryCatch;

class ChatController extends Controller
{
    function index()
    {
        return view('welcome');
    }

    public function chat(Request $request)
    {

        $question = $request->input('question');
        $apiKey = '<Paste your ChatGPT Key Here>';

        try {
            $data = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $apiKey,
            ])
                ->post("https://api.openai.com/v1/chat/completions", [
                    "model" => "gpt-3.5-turbo",
                    'messages' => [
                        [
                            "role" => "user",
                            "content" => $question
                        ]
                    ],
                    'temperature' => 0.5,
                    "max_tokens" => 200,
                    "top_p" => 1.0,
                    "frequency_penalty" => 0.52,
                    "presence_penalty" => 0.5,
                    "stop" => ["11."],
                ])
                ->json();
            $data = $data['choices'][0]['message']['content'];
            return $res = view('response', compact('data', 'question'))->render();
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
