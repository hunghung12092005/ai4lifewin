<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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
    $profile = $request->input('profile'); // optional structured data from form

    $majorsReal = collect($this->Links());

    // Tạo contextText cho prompt
    $contextText = "Danh sách ngành học hiện có:\n";
    foreach ($majorsReal as $major) {
        $contextText .= "- " . $major['title'] . ": " . $major['description'] . "\n";
    }

    $prompt = <<<EOT
Bạn là trợ lý CSKH/Tư vấn tuyển sinh của FPT Polytechnic (Cao đẳng thực hành). Trả lời thân thiện, chính xác, gọn gàng, dễ đọc, LUÔN định hướng về FPT Polytechnic (không tư vấn trường khác).

Dựa trên danh sách ngành học của trường dưới đây (khi đề cập, vui lòng dùng đúng tên ngành như trong danh sách):
$contextText

Người dùng hỏi: "$message"

Định dạng trả lời:
- Dùng các đoạn ngắn, xuống dòng hợp lý theo câu.
- Có thể dùng tiêu đề ngắn khi cần để phân phần rõ ràng.
- Có thể đính kèm đường link chính thức (website FPT Polytechnic) khi phù hợp.
- Không trả về JSON hay định dạng phức tạp.
- Nếu câu hỏi ngoài phạm vi nhà trường, hướng người dùng về các kênh chính thức của FPT Polytechnic.
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

    // Ghép thêm hình ảnh/ngành liên quan nếu phát hiện tên ngành trong câu trả lời
    $matchedMajors = [];
    foreach ($majorsReal as $major) {
        if (!empty($major['title']) && stripos($replyText, $major['title']) !== false) {
            $matchedMajors[] = $major;
        }
        if (count($matchedMajors) >= 3) {
            break;
        }
    }

    // Tính điểm phù hợp theo hồ sơ (nếu có)
    $ranking = [];
    if (is_array($profile)) {
        $ranking = $this->computeSuitabilityRanking($profile, $majorsReal->all());
    }

    return response()->json([
        'reply' => $replyText,
        'majors' => $matchedMajors,
        'ranking' => $ranking,
    ]);
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

    /**
     * Tính điểm phù hợp theo hồ sơ người dùng cho từng ngành (0-100)
     * Đơn giản hoá: dùng trọng số theo slider + khớp từ khoá interests/skills/subjects
     */
    private function computeSuitabilityRanking(array $profile, array $majors): array
    {
        $interests = mb_strtolower((string)($profile['interests'] ?? ''));
        $skills = mb_strtolower((string)($profile['skills'] ?? ''));
        $favoriteSubjects = mb_strtolower((string)($profile['favoriteSubjects'] ?? ''));
        $scoresStr = (string)($profile['scores'] ?? '');
        $aff = $profile['affinity'] ?? [];
        $tech = (int)($aff['technology'] ?? 0);
        $cre = (int)($aff['creativity'] ?? 0);
        $com = (int)($aff['communication'] ?? 0);
        $log = (int)($aff['logic'] ?? 0);

        // Parse điểm môn học: "Toán:8; Lý:7; Hóa:6; Văn:7; Anh:8"
        $scores = [];
        if ($scoresStr !== '') {
            foreach (preg_split('/[;,]+/', $scoresStr) as $chunk) {
                if (preg_match('/\s*([\p{L}A-Za-z]+)\s*[:\-]\s*(\d+(?:\.\d+)?)\s*/u', $chunk, $m)) {
                    $subject = mb_strtolower(trim($m[1]));
                    $value = (float)$m[2];
                    $scores[$subject] = $value;
                }
            }
        }

        // Từ khoá cho từng ngành
        $kw = [
            'Công nghệ thông tin' => ['công nghệ','lập trình','phần mềm','it','data','mạng','khoa học máy tính','ai'],
            'Quản trị kinh doanh' => ['kinh doanh','marketing','quản trị','bán hàng','thương mại','startup','quản lý'],
            'Kế toán' => ['kế toán','tài chính','sổ sách','thuế','kiểm toán','báo cáo tài chính'],
            'Ngôn ngữ Anh' => ['tiếng anh','giao tiếp','phiên dịch','biên dịch','ielts','toeic'],
            'Du lịch - Nhà hàng - Khách sạn' => ['du lịch','nhà hàng','khách sạn','dịch vụ','lễ tân','hướng dẫn viên'],
            'Y khoa' => ['y','bác sĩ','điều dưỡng','sức khỏe','y tế','dược'],
            'Kiến trúc' => ['kiến trúc','xây dựng','nội thất','thiết kế kiến trúc','quy hoạch'],
        ];

        $ranking = [];
        foreach ($majors as $m) {
            $title = $m['title'];
            $score = 0.0;

            // Trọng số theo slider
            switch ($title) {
                case 'Công nghệ thông tin':
                    $score += 0.45 * $tech + 0.35 * $log + 0.20 * $cre;
                    break;
                case 'Quản trị kinh doanh':
                    $score += 0.4 * $com + 0.35 * $cre + 0.25 * $log;
                    break;
                case 'Kế toán':
                    $score += 0.55 * $log + 0.25 * $com + 0.20 * $tech;
                    break;
                case 'Ngôn ngữ Anh':
                    $score += 0.6 * $com + 0.25 * $cre + 0.15 * $log;
                    break;
                case 'Du lịch - Nhà hàng - Khách sạn':
                    $score += 0.55 * $com + 0.25 * $cre + 0.20 * $log;
                    break;
                case 'Y khoa':
                    $score += 0.5 * $log + 0.25 * $com + 0.25 * $tech;
                    break;
                case 'Kiến trúc':
                    $score += 0.5 * $cre + 0.3 * $log + 0.2 * $tech;
                    break;
                default:
                    $score += 0.25 * ($tech + $cre + $com + $log);
            }

            // Điểm cộng theo từ khoá trong interests/skills/subjects
            $bonus = 0;
            $hay = $interests . ' ' . $skills . ' ' . $favoriteSubjects;
            foreach ($kw[$title] ?? [] as $k) {
                if (mb_stripos($hay, $k) !== false) {
                    $bonus += 6; // mỗi từ khớp cộng 6 điểm
                }
            }
            $score += $bonus;

            // Điểm cộng theo điểm môn học nổi trội
            $subjectBonus = 0; $strongSubjects = [];
            $addSubject = function(array $keys, float $weight = 4.0) use (&$scores, &$subjectBonus, &$strongSubjects) {
                foreach ($keys as $k) {
                    foreach ($scores as $subject => $val) {
                        if (mb_stripos($subject, $k) !== false) {
                            // cộng điểm theo mức vượt 5.0
                            $subjectBonus += max(0.0, ($val - 5.0) * $weight);
                            if ($val >= 7.5) { $strongSubjects[$k] = true; }
                        }
                    }
                }
            };

            switch ($title) {
                case 'Công nghệ thông tin':
                    $addSubject(['toán','toan','lý','ly','tin','cntt']);
                    break;
                case 'Quản trị kinh doanh':
                    $addSubject(['anh','văn','van','toán','toan']);
                    break;
                case 'Kế toán':
                    $addSubject(['toán','toan','lý','ly','tin']);
                    break;
                case 'Ngôn ngữ Anh':
                    $addSubject(['anh','tiếng anh','english']);
                    break;
                case 'Du lịch - Nhà hàng - Khách sạn':
                    $addSubject(['anh','văn','van','địa','dia']);
                    break;
                case 'Y khoa':
                    $addSubject(['sinh','hóa','hoa']);
                    break;
                case 'Kiến trúc':
                    $addSubject(['vẽ','ve','hình','hinh','toán','toan']);
                    break;
            }
            $score += $subjectBonus;

            // Chuẩn hoá 0..100
            $score = max(0, min(100, round($score)));

            // Lý do ngắn gọn (top yếu tố nổi bật + số từ khoá khớp)
            $factors = [
                'Công nghệ' => $tech,
                'Sáng tạo' => $cre,
                'Giao tiếp' => $com,
                'Logic' => $log,
            ];
            arsort($factors);
            $top2 = array_slice(array_keys($factors), 0, 2);
            $matchCount = 0;
            foreach (($kw[$title] ?? []) as $k) {
                if (mb_stripos($hay, $k) !== false) $matchCount++;
            }
            $reasons = [];
            $reasons[] = 'Yếu tố nổi bật: ' . implode(', ', $top2);
            if ($matchCount > 0) $reasons[] = 'Khớp ' . $matchCount . ' từ khoá sở thích/kỹ năng/môn yêu thích.';
            if (!empty($strongSubjects)) $reasons[] = 'Môn nổi trội: ' . implode(', ', array_keys($strongSubjects));

            $ranking[] = [
                'title' => $title,
                'score' => $score,
                'reasons' => $reasons,
                'factors' => [
                    'technology' => $tech,
                    'creativity' => $cre,
                    'communication' => $com,
                    'logic' => $log,
                ],
            ];
        }

        // Sắp xếp giảm dần theo điểm
        usort($ranking, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        return $ranking;
    }

    // Lưu câu trả lời để chia sẻ (dùng cache TTL)
    public function share(Request $request)
    {
        $data = $request->validate([
            'reply' => 'required|string',
            'majors' => 'nullable|array',
        ]);

        // Tạo id ngắn
        $id = substr(bin2hex(random_bytes(8)), 0, 12);
        $payload = [
            'reply' => $data['reply'],
            'majors' => $data['majors'] ?? [],
            'ts' => now()->toIso8601String(),
        ];
        // Lưu 7 ngày
        cache()->put('share:' . $id, $payload, now()->addDays(7));

        return response()->json(['id' => $id, 'url' => route('share.view', ['id' => $id])]);
    }

    // Xem nội dung chia sẻ
    public function viewShare(string $id)
    {
        $payload = cache()->get('share:' . $id);
        if (!$payload) {
            abort(404);
        }
        return view('share', ['data' => $payload]);
    }

    // --------- Lưu trữ hồ sơ form (file JSON trong storage/app/forms) ---------
    public function saveForm(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'cohort' => 'nullable|string|max:50',
            'interests' => 'nullable|string',
            'skills' => 'nullable|string',
            'scores' => 'nullable|string',
            'favoriteSubjects' => 'nullable|string',
            'careerGoal' => 'nullable|string',
            'studyHabits' => 'nullable|string',
            'affinity' => 'nullable|array',
        ]);

        $id = substr(bin2hex(random_bytes(8)), 0, 12);
        $record = [
            'id' => $id,
            'data' => $data,
            'created_at' => now()->toIso8601String(),
        ];
        Storage::disk('local')->makeDirectory('forms');
        Storage::disk('local')->put('forms/' . $id . '.json', json_encode($record, JSON_UNESCAPED_UNICODE));
        return response()->json(['id' => $id]);
    }

    public function listForms()
    {
        Storage::disk('local')->makeDirectory('forms');
        $files = Storage::disk('local')->files('forms');
        $items = [];
        foreach ($files as $file) {
            if (str_ends_with($file, '.json')) {
                $json = json_decode(Storage::disk('local')->get($file), true);
                if (is_array($json)) {
                    $items[] = [
                        'id' => $json['id'] ?? basename($file, '.json'),
                        'name' => $json['data']['name'] ?? '(không tên)',
                        'cohort' => $json['data']['cohort'] ?? null,
                        'created_at' => $json['created_at'] ?? null,
                    ];
                }
            }
        }
        // sắp xếp mới nhất trước
        usort($items, fn($a,$b) => strcmp($b['created_at'] ?? '', $a['created_at'] ?? ''));
        return response()->json(['items' => $items]);
    }

    public function getForm(string $id)
    {
        $path = 'forms/' . $id . '.json';
        if (!Storage::disk('local')->exists($path)) {
            return response()->json(['error' => 'Not found'], 404);
        }
        $json = json_decode(Storage::disk('local')->get($path), true);
        return response()->json($json);
    }

    public function deleteForm(string $id)
    {
        $path = 'forms/' . $id . '.json';
        if (Storage::disk('local')->exists($path)) {
            Storage::disk('local')->delete($path);
        }
        return response()->json(['ok' => true]);
    }
}
