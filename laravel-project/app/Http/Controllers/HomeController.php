<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $majors = Major::orderBy('name')->get();
        return view('welcome', compact('majors'));
    }

    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = $request->input('message');

        // Lấy dữ liệu ngành học làm context
        $majors = Major::all();
        $contextText = "Dữ liệu ngành học:\n";
        foreach ($majors as $major) {
            $contextText .= "- " . $major->name . ": " . ($major->description ?? '') . "\n";
        }

        $prompt = "
Bạn là chatbot tư vấn ngành học dựa trên dữ liệu sau:
$contextText

Người dùng hỏi: \"$message\"
Hãy trả lời ngắn gọn, rõ ràng.
";

        $API_KEY = 'AIzaSyDdyQPlin693Vo16vKOWnI38qLJ5U2z5LQ';

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$API_KEY", [
            'contents' => [
                ['parts' => [['text' => $prompt]]]
            ],
        ]);

        if ($response->failed()) {
            $reply = 'Lỗi khi gọi API AI.';
        } else {
            $data = $response->json();
            $rawText = data_get($data, 'candidates.0.content.parts.0.text', '');
            $reply = trim(str_replace(['```json', '```'], '', $rawText));
        }

        return response()->json(['reply' => $reply]);
    }
}
