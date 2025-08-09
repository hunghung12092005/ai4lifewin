<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    // Trang chính (nếu cần)
    public function index()
    {
        return view('welcome');
    }

    // Hàm chatbot tư vấn ngành học
    public function chat(Request $request)
{
    $request->validate([
        'message' => 'required|string|max:8000',
    ]);

    $message = $request->input('message');

    $majorsReal = collect($this->Links());

    // Tạo contextText cho prompt
    $contextText = "Danh sách ngành học hiện có:\n";
    foreach ($majorsReal as $major) {
        $contextText .= "- " . $major['title'] . ": " . $major['description'] . "\n";
    }

    $prompt = <<<EOT
Bạn là trợ lý CSKH/Tư vấn tuyển sinh của FPT Polytechnic (Cao đẳng thực hành). Trả lời thân thiện, chính xác, gọn gàng, dễ đọc.

Dựa trên danh sách ngành học của trường dưới đây:
$contextText

Người dùng hỏi: "$message"

Định dạng trả lời:
- Dùng các đoạn ngắn, xuống dòng hợp lý theo câu.
- Có thể dùng tiêu đề ngắn khi cần để phân phần rõ ràng.
- Có thể đính kèm đường link chính thức nếu phù hợp.
- Không trả về JSON hay định dạng phức tạp.
EOT;

    $API_KEY = 'AIzaSyCjQJbHsnVRT-rExPn0MX_grBKnhAySI6M';

    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$API_KEY", [
        'contents' => [
            ['parts' => [['text' => $prompt]]]
        ],
    ]);

    if ($response->failed()) {
        $status = $response->status();
        $body = $response->body();
        return response()->json([
            'reply' => 'Lỗi khi gọi API AI (HTTP ' . $status . ')',
            'error' => $body ?: 'Không có nội dung lỗi'
        ], 500);
    }

    $data = $response->json();

    $rawText = data_get($data, 'candidates.0.content.parts.0.text', '');
    $replyText = trim($rawText);

    // Loại bỏ các khối code fence và các dấu * nếu có
    $replyText = str_replace(['```', '```json', '*'], '', $replyText);

    // Chuẩn hoá xuống dòng (không ép xuống dòng sau mỗi dấu chấm)
    $replyText = str_replace(["\r\n", "\r"], "\n", $replyText);
    $replyText = preg_replace('/\n{3,}/', "\n\n", $replyText);

    return response()->json(['reply' => $replyText]);
}

    // Dữ liệu ngành học cứng
    public function Links()
    {
        return [
            [
                'title' => 'Công nghệ thông tin',
                'description' => 'Ngành học về lập trình, phát triển phần mềm và hệ thống máy tính.',
                'image' => 'https://cdn-icons-png.flaticon.com/512/1055/1055687.png',
                'url' => 'https://vi.wikipedia.org/wiki/Công_nghệ_thông_tin'
            ],
            [
                'title' => 'Quản trị kinh doanh',
                'description' => 'Ngành học đào tạo kiến thức quản lý, điều hành doanh nghiệp và marketing.',
                'image' => 'https://cdn-icons-png.flaticon.com/512/2838/2838912.png',
                'url' => 'https://vi.wikipedia.org/wiki/Quản_trị_kinh_doanh'
            ],
            [
                'title' => 'Kế toán',
                'description' => 'Ngành học liên quan đến ghi chép, tổng hợp và phân tích thông tin tài chính.',
                'image' => 'https://cdn-icons-png.flaticon.com/512/679/679922.png',
                'url' => 'https://vi.wikipedia.org/wiki/Kế_toán'
            ],
            [
                'title' => 'Ngôn ngữ Anh',
                'description' => 'Ngành học về tiếng Anh, giao tiếp và dịch thuật.',
                'image' => 'https://cdn-icons-png.flaticon.com/512/197/197484.png',
                'url' => 'https://vi.wikipedia.org/wiki/Ngôn_ngữ_Anh'
            ],
            [
                'title' => 'Du lịch - Nhà hàng - Khách sạn',
                'description' => 'Ngành học đào tạo kỹ năng phục vụ khách du lịch, quản lý khách sạn và nhà hàng.',
                'image' => 'https://cdn-icons-png.flaticon.com/512/609/609803.png',
                'url' => 'https://vi.wikipedia.org/wiki/Du_lịch'
            ],
            [
                'title' => 'Y khoa',
                'description' => 'Ngành học về y học, chăm sóc sức khỏe và điều trị bệnh.',
                'image' => 'https://cdn-icons-png.flaticon.com/512/2965/2965567.png',
                'url' => 'https://vi.wikipedia.org/wiki/Y_học'
            ],
            [
                'title' => 'Kiến trúc',
                'description' => 'Ngành học thiết kế công trình, quy hoạch đô thị và nội thất.',
                'image' => 'https://cdn-icons-png.flaticon.com/512/893/893257.png',
                'url' => 'https://vi.wikipedia.org/wiki/Kiến_trúc_sư'
            ],
        ];
    }
}
