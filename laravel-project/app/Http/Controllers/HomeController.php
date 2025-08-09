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
        'message' => 'required|string|max:1000',
    ]);

    $message = $request->input('message');

    $majorsReal = collect($this->Links());

    // Tạo contextText cho prompt
    $contextText = "Danh sách ngành học hiện có:\n";
    foreach ($majorsReal as $major) {
        $contextText .= "- " . $major['title'] . ": " . $major['description'] . "\n";
    }

    $prompt = <<<EOT
Bạn là chatbot tư vấn ngành học dành cho sinh viên cao đẳng FPT Polytechnic - một trường đào tạo thực tiễn, gắn liền với nhu cầu thị trường và phát triển kỹ năng nghề nghiệp.

Dựa trên danh sách ngành học hiện có của trường dưới đây:
$contextText

Người dùng hỏi: "$message"

Hãy trả lời ngắn gọn, rõ ràng, thân thiện, có xuống dòng để dễ đọc. Nội dung trả lời nên tập trung vào:
- Tư vấn ngành học phù hợp với câu hỏi hoặc nguyện vọng người dùng.
- Giải thích sơ lược về ngành học, những điểm mạnh, hoặc kỹ năng phát triển khi học ngành đó.
- Gợi ý cơ hội nghề nghiệp thực tế sau khi tốt nghiệp.
- Không trả về JSON hay định dạng phức tạp, chỉ trả lời dạng văn bản mô tả.

Luôn nhớ rằng đây là tư vấn dành cho sinh viên cao đẳng FPT Polytechnic.

EOT;

    $API_KEY = 'AIzaSyDdyQPlin693Vo16vKOWnI38qLJ5U2z5LQ';

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

    $rawText = data_get($data, 'candidates.0.content.parts.0.text', '');
    $replyText = trim($rawText);

    // Loại bỏ các dấu ``` và ** nếu có
    $replyText = str_replace(['```', '```json', '**'], '', $replyText);

    // Format thêm: thay các dấu chấm + xuống dòng cho rõ ràng hơn
    $replyText = preg_replace('/\.\s*/', ".\n", $replyText);

    return response()->json(['reply' => $replyText]);
}

    // Dữ liệu ngành học cứng
    private function Links()
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
