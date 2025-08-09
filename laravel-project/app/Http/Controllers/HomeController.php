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

        // Lấy dữ liệu ngành học thật từ Links()
        $responseLinks = $this->Links();
        $majorsReal = collect($responseLinks->getData());

        // Lấy dữ liệu ngành học trong DB (nếu bạn muốn thêm mô tả...)
        $majorsDB = Major::all();
        $contextText = "Dữ liệu ngành học:\n";
        foreach ($majorsDB as $major) {
            $contextText .= "- " . $major->name . ": " . ($major->description ?? '') . "\n";
        }

        // Tạo prompt cho AI
        $prompt = <<<EOT
Bạn là chatbot tư vấn ngành học dựa trên dữ liệu sau:
$contextText

Người dùng hỏi: "$message"
Hãy trả lời ngắn gọn, rõ ràng. Nếu có thể, hãy trả về danh sách ngành học theo định dạng JSON gồm các trường: title, description, image, url.
EOT;

        $API_KEY = 'AIzaSyDdyQPlin693Vo16vKOWnI38qLJ5U2z5LQ'; // lưu key trong .env

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$API_KEY", [
            'contents' => [
                ['parts' => [['text' => $prompt]]]
            ],
        ]);

        if ($response->failed()) {
            return response()->json(['reply' => 'Lỗi khi gọi API AI.'], 500);
        }

        $data = $response->json();

        // Lấy text trả về
        $rawText = data_get($data, 'candidates.0.content.parts.0.text', '');
        $replyText = trim(str_replace(['```json', '```'], '', $rawText));

        // Thử decode JSON
        $json = json_decode($replyText, true);

        if (json_last_error() === JSON_ERROR_NONE && is_array($json)) {
            // Ghép bổ sung image + url từ dữ liệu thật
            $jsonComplete = [];
            foreach ($json as $item) {
                $title = $item['title'] ?? null;
                if ($title) {
                    // So sánh không phân biệt hoa thường, không dấu có thể thêm nếu muốn
                    $match = $majorsReal->first(function ($major) use ($title) {
                        return mb_strtolower($major->title) === mb_strtolower($title);
                    });

                    if ($match) {
                        $jsonComplete[] = [
                            'title' => $title,
                            'description' => $item['description'] ?? $match->description,
                            'image' => $match->image,
                            'url' => $match->url,
                        ];
                    } else {
                        $jsonComplete[] = $item;
                    }
                } else {
                    $jsonComplete[] = $item;
                }
            }

            return response()->json(['reply' => $jsonComplete]);
        }

        // Nếu không trả về JSON, trả về text thông thường
        return response()->json(['reply' => $replyText]);
    }

    public function Links()
    {
        return response()->json([
            [
                'title' => 'Công nghệ thông tin',
                'description' => 'Ngành học về lập trình, phát triển phần mềm và hệ thống máy tính.',
                'image' => 'https://cdn-icons-png.flaticon.com/512/1055/1055687.png',
                'url' => 'https://vi.wikipedia.org/wiki/C%C3%B4ng_ngh%E1%BB%87_th%C3%B4ng_tin'
            ],
            [
                'title' => 'Quản trị kinh doanh',
                'description' => 'Ngành học đào tạo kiến thức quản lý, điều hành doanh nghiệp và marketing.',
                'image' => 'https://cdn-icons-png.flaticon.com/512/2838/2838912.png',
                'url' => 'https://vi.wikipedia.org/wiki/Qu%E1%BA%A3n_tr%E1%BB%8B_kinh_doanh'
            ],
            [
                'title' => 'Kế toán',
                'description' => 'Ngành học liên quan đến ghi chép, tổng hợp và phân tích thông tin tài chính.',
                'image' => 'https://cdn-icons-png.flaticon.com/512/679/679922.png',
                'url' => 'https://vi.wikipedia.org/wiki/K%E1%BA%BF_to%C3%A1n'
            ],
            [
                'title' => 'Ngôn ngữ Anh',
                'description' => 'Ngành học về tiếng Anh, giao tiếp và dịch thuật.',
                'image' => 'https://cdn-icons-png.flaticon.com/512/197/197484.png',
                'url' => 'https://vi.wikipedia.org/wiki/Ng%C3%B4n_ng%E1%BB%AF_Anh'
            ],
            [
                'title' => 'Du lịch - Nhà hàng - Khách sạn',
                'description' => 'Ngành học đào tạo kỹ năng phục vụ khách du lịch, quản lý khách sạn và nhà hàng.',
                'image' => 'https://cdn-icons-png.flaticon.com/512/609/609803.png',
                'url' => 'https://vi.wikipedia.org/wiki/Du_l%E1%BB%8Bch'
            ],
            [
                'title' => 'Y khoa',
                'description' => 'Ngành học về y học, chăm sóc sức khỏe và điều trị bệnh.',
                'image' => 'https://cdn-icons-png.flaticon.com/512/2965/2965567.png',
                'url' => 'https://vi.wikipedia.org/wiki/Y_h%E1%BB%8Dc'
            ],
            [
                'title' => 'Kiến trúc',
                'description' => 'Ngành học thiết kế công trình, quy hoạch đô thị và nội thất.',
                'image' => 'https://cdn-icons-png.flaticon.com/512/893/893257.png',
                'url' => 'https://vi.wikipedia.org/wiki/Ki%E1%BB%81n_tr%C3%BAc_s%E1%BA%BF'
            ],
        ]);
    }
}
