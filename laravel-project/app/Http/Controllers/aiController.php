<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aiController extends Controller
{
     public function Links()
{
    return response()->json([
        [
            'title' => 'Công nghệ thông tin',
            'description' => 'Ngành học về lập trình, phát triển phần mềm và hệ thống máy tính.',
            'image' => 'https://cdn-icons-png.flaticon.com/512/1055/1055687.png',  // icon laptop máy tính
            'url' => 'https://vi.wikipedia.org/wiki/C%C3%B4ng_ngh%E1%BB%87_th%C3%B4ng_tin'
        ],
        [
            'title' => 'Quản trị kinh doanh',
            'description' => 'Ngành học đào tạo kiến thức quản lý, điều hành doanh nghiệp và marketing.',
            'image' => 'https://cdn-icons-png.flaticon.com/512/2838/2838912.png', // icon quản lý
            'url' => 'https://vi.wikipedia.org/wiki/Qu%E1%BA%A3n_tr%E1%BB%8B_kinh_doanh'
        ],
        [
            'title' => 'Kế toán',
            'description' => 'Ngành học liên quan đến ghi chép, tổng hợp và phân tích thông tin tài chính.',
            'image' => 'https://cdn-icons-png.flaticon.com/512/679/679922.png', // icon kế toán
            'url' => 'https://vi.wikipedia.org/wiki/K%E1%BA%BF_to%C3%A1n'
        ],
        [
            'title' => 'Ngôn ngữ Anh',
            'description' => 'Ngành học về tiếng Anh, giao tiếp và dịch thuật.',
            'image' => 'https://cdn-icons-png.flaticon.com/512/197/197484.png', // icon cờ Anh
            'url' => 'https://vi.wikipedia.org/wiki/Ng%C3%B4n_ng%E1%BB%AF_Anh'
        ],
        [
            'title' => 'Du lịch - Nhà hàng - Khách sạn',
            'description' => 'Ngành học đào tạo kỹ năng phục vụ khách du lịch, quản lý khách sạn và nhà hàng.',
            'image' => 'https://cdn-icons-png.flaticon.com/512/609/609803.png', // icon khách sạn
            'url' => 'https://vi.wikipedia.org/wiki/Du_l%E1%BB%8Bch'
        ],
        [
            'title' => 'Y khoa',
            'description' => 'Ngành học về y học, chăm sóc sức khỏe và điều trị bệnh.',
            'image' => 'https://cdn-icons-png.flaticon.com/512/2965/2965567.png', // icon y tế
            'url' => 'https://vi.wikipedia.org/wiki/Y_h%E1%BB%8Dc'
        ],
        [
            'title' => 'Kiến trúc',
            'description' => 'Ngành học thiết kế công trình, quy hoạch đô thị và nội thất.',
            'image' => 'https://cdn-icons-png.flaticon.com/512/893/893257.png', // icon kiến trúc
            'url' => 'https://vi.wikipedia.org/wiki/Ki%E1%BB%81n_tr%C3%BAc_s%E1%BA%BF'
        ],
    ]);
}

}
