<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FPT Polytechnic - Ứng dụng tư vấn chọn ngành dựa trên AI</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <style>
        :root {
            --primary: #f37021;
            --dark: #1b1b18;
        }

        body {
            background: #fafafa;
            color: #1b1b18;
        }

        .hero {
            background: linear-gradient(135deg, rgba(243, 112, 33, .08), rgba(255, 204, 153, .18));
            border-bottom: 1px solid #eee;
        }

        .card {
            border: 1px solid #eee;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .04);
        }

        .section-title {
            font-weight: 700;
            letter-spacing: .2px;
        }

        .badge-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--primary);
            margin-right: 8px;
        }

        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            filter: brightness(.95);
        }

        .muted {
            color: #6b7280;
        }

        #chatbot-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 320px;
            max-width: 90vw;
            font-family: Arial, sans-serif;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            overflow: hidden;
            background: #fff;
            display: flex;
            flex-direction: column;
            height: 400px;
            z-index: 9999;
        }

        #chatbot-header {
            background: var(--primary);
            color: #fff;
            padding: 12px 16px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            user-select: none;
        }

        #chatbot-close {
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            user-select: none;
        }

        #chatbot-body {
            flex-grow: 1;
            padding: 10px;
            overflow-y: auto;
            background: #f5f5f5;
            display: flex;
            flex-direction: column;
        }

        .message {
            margin-bottom: 10px;
            padding: 8px 12px;
            border-radius: 12px;
            max-width: 80%;
            word-wrap: break-word;
            white-space: pre-line;
        }

        .message.user {
            align-self: flex-end;
            background-color: var(--primary);
            color: white;
        }

        .message.bot {
            align-self: flex-start;
            background-color: #e0e0e0;
            color: #333;
        }

        #chatbot-form {
            display: flex;
            border-top: 1px solid #ddd;
        }

        #chatbot-input {
            flex-grow: 1;
            border: none;
            padding: 10px 12px;
            font-size: 1rem;
            outline: none;
        }

        #chatbot-send {
            background: var(--primary);
            border: none;
            color: white;
            padding: 0 16px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.2s;
        }

        #chatbot-send:disabled {
            background: #ffa366;
            cursor: default;
        }
    </style>
</head>

<body>
    <header class="hero py-4">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <img src="https://vuainnhanh.com/wp-content/uploads/2023/02/logo-fpt-polytechnic.png"
                    alt="FPT Polytechnic" height="50">
                <span class="fw-semibold">Định hướng ngành học cho tân sinh viên</span>
            </div>
            <nav class="d-none d-md-flex gap-4">
                <a class="text-decoration-none" href="#features">Tính năng</a>
                <a class="text-decoration-none" href="#form">Tư vấn ngay</a>
                <a class="text-decoration-none" href="#about">Giới thiệu</a>
            </nav>
        </div>
    </header>
    <div id="chatbot-container" aria-label="Chatbot tư vấn ngành học">
        <div id="chatbot-header" role="button" aria-expanded="true" tabindex="0" aria-controls="chatbot-body">
            <span>Tư vấn ngành học AI</span>
            <span id="chatbot-close" aria-label="Đóng chatbot">×</span>
        </div>
        <div id="chatbot-body" role="log" aria-live="polite"></div>
        <form id="chatbot-form" autocomplete="off" aria-label="Gửi câu hỏi chatbot">
            <input type="text" id="chatbot-input" placeholder="Nhập câu hỏi của bạn..." aria-required="true" />
            <button type="submit" id="chatbot-send" disabled>Gửi</button>
        </form>
    </div>
    <main class="container py-5">
        <!-- Hero copy -->
        <div class="row align-items-center g-4 mb-4">
            <div class="col-lg-7">
                <h1 class="display-6 mb-3">Xây dựng ứng dụng tư vấn chọn ngành học dựa trên AI</h1>
                <p class="lead muted mb-4">Hỗ trợ học sinh, sinh viên khóa 2007 xác định ngành học phù hợp với sở thích,
                    năng lực và định hướng nghề nghiệp của bản thân. Ứng dụng sử dụng mô hình AI (OpenAI/Gemini) để phân
                    tích dữ liệu và gợi ý ngành học trong danh mục của FPT Polytechnic.</p>
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <span class="badge text-bg-light"><span class="badge-dot"></span>Sáng tạo</span>
                    <span class="badge text-bg-light"><span class="badge-dot"></span>Giao diện dễ sử dụng</span>
                    <span class="badge text-bg-light"><span class="badge-dot"></span>Xử lý dữ liệu rõ ràng</span>
                </div>
                <a href="#form" class="btn btn-primary btn-lg">Bắt đầu tư vấn</a>
            </div>
            <div class="col-lg-5">
                <div class="card p-3">
                    <img class="w-100 rounded" src="https://caodang.fpt.edu.vn/wp-content/uploads/kn.webp"
                        alt="FPT Polytechnic" />
                </div>
            </div>
        </div>

        <!-- Features -->
        <section id="features" class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card h-100 p-4">
                    <h3 class="h5 section-title">Tiếp nhận dữ liệu đầu vào</h3>
                    <p class="muted mb-2">Thu thập đầy đủ các trường thông tin cần thiết từ người dùng.</p>
                    <ul class="mb-0 small">
                        <li>Sở thích; Kỹ năng / Tố chất</li>
                        <li>Điểm số các môn; Môn học yêu thích</li>
                        <li>Định hướng nghề nghiệp; Thói quen học tập</li>
                        <li>Mức độ yêu thích: công nghệ / sáng tạo / giao tiếp / logic</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-4">
                    <h3 class="h5 section-title">Phân tích bằng AI</h3>
                    <p class="muted mb-2">Gọi API AI (OpenAI/Gemini) để suy luận mức độ phù hợp.</p>
                    <ul class="mb-0 small">
                        <li>Gợi ý 3–5 ngành phù hợp (điểm phù hợp, lý do)</li>
                        <li>Khuyến nghị học phần/kỹ năng cần bổ sung</li>
                        <li>Lộ trình/nghề nghiệp tham khảo sau tốt nghiệp</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-4">
                    <h3 class="h5 section-title">Lưu trữ & Theo dõi</h3>
                    <p class="muted mb-2">Lưu kết quả tư vấn để theo dõi và so sánh.</p>
                    <ul class="mb-0 small">
                        <li>Quản lý các lần tư vấn gần đây</li>
                        <li>Tải về hoặc chia sẻ kết quả</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Advisor form -->
        <section id="form" class="row g-4">
            <div class="col-lg-7">
                <div class="card p-4">
                    <h2 class="h4 mb-3">Nhập thông tin để tư vấn bằng AI</h2>
                    <form id="advisor-form" class="row g-3" method="GET" action="/chat">
                        <div class="col-md-6">
                            <label class="form-label">Họ tên</label>
                            <input type="text" class="form-control" id="name" placeholder="Nguyễn Văn A">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Khóa</label>
                            <input type="text" class="form-control" id="cohort" value="2007">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Sở thích</label>
                            <textarea class="form-control" id="interests" rows="2"
                                placeholder="VD: thích công nghệ, thiết kế, làm việc nhóm..."></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Kỹ năng / Tố chất</label>
                            <textarea class="form-control" id="skills" rows="2" placeholder="VD: tư duy logic, sáng tạo, giao tiếp..."></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Điểm số các môn</label>
                            <textarea class="form-control" id="scores" rows="2" placeholder="VD: Toán:8; Lý:7; Hóa:6; Văn:7"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Môn học yêu thích</label>
                            <input class="form-control" id="favorite_subjects"
                                placeholder="VD: Lập trình, Thiết kế đồ họa, Marketing...">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Định hướng nghề nghiệp</label>
                            <textarea class="form-control" id="career_goal" rows="2"
                                placeholder="VD: Lập trình viên, Designer, Marketer..."></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Thói quen học tập</label>
                            <textarea class="form-control" id="study_habits" rows="2"
                                placeholder="VD: tự học, thích dự án thực tế, học nhóm..."></textarea>
                        </div>

                        <div class="col-12">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label">Công nghệ</label>
                                    <input type="range" class="form-range" id="aff_tech" min="0"
                                        max="100" value="70">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Sáng tạo</label>
                                    <input type="range" class="form-range" id="aff_creativity" min="0"
                                        max="100" value="70">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Giao tiếp</label>
                                    <input type="range" class="form-range" id="aff_communication" min="0"
                                        max="100" value="50">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Logic</label>
                                    <input type="range" class="form-range" id="aff_logic" min="0"
                                        max="100" value="60">
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="q" id="q">
                        <div class="col-12 d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Phân tích bằng AI</button>
                            <a href="#features" class="btn btn-outline-secondary">Xem yêu cầu</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card p-4">
                    <h2 id="about" class="h5 mb-3">Ứng dụng làm được gì?</h2>
                    <ul class="small mb-3">
                        <li><strong>Phân tích hồ sơ</strong>: tổng hợp sở thích, kỹ năng, điểm số, thói quen...</li>
                        <li><strong>Xếp hạng phù hợp</strong> từng ngành trong danh sách FPT Polytechnic</li>
                        <li><strong>Giải thích lý do</strong> + đề xuất môn/kỹ năng nên học</li>
                        <li><strong>Lưu kết quả</strong> để so sánh giữa các lần tư vấn</li>
                    </ul>
                    <div class="rounded overflow-hidden border">
                        <img class="w-100"
                            src="https://vuainnhanh.com/wp-content/uploads/2023/02/logo-fpt-polytechnic.png"
                            alt="FPT Polytechnic">
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="py-4 border-top">
        <div class="container small d-flex justify-content-between flex-wrap gap-2">
            <span>© {{ date('Y') }} FPT Polytechnic – AI tư vấn chọn ngành</span>
            <span class="muted">Phiên bản demo phục vụ cuộc thi</span>
        </div>
    </footer>
   

    <script>
        const form = document.getElementById('advisor-form');
        if (form) {
            form.addEventListener('submit', (e) => {
                // Biến dữ liệu form thành prompt duy nhất (tham số q) để gửi tới /chat
                const data = {
                    name: document.getElementById('name').value.trim(),
                    cohort: document.getElementById('cohort').value.trim(),
                    interests: document.getElementById('interests').value.trim(),
                    skills: document.getElementById('skills').value.trim(),
                    scores: document.getElementById('scores').value.trim(),
                    favoriteSubjects: document.getElementById('favorite_subjects').value.trim(),
                    careerGoal: document.getElementById('career_goal').value.trim(),
                    studyHabits: document.getElementById('study_habits').value.trim(),
                    affinity: {
                        technology: document.getElementById('aff_tech').value,
                        creativity: document.getElementById('aff_creativity').value,
                        communication: document.getElementById('aff_communication').value,
                        logic: document.getElementById('aff_logic').value,
                    }
                };
                const instruction =
                    `Bạn là cố vấn học tập của FPT Polytechnic. Dựa trên hồ sơ JSON dưới đây, hãy đề xuất 3–5 ngành phù hợp trong danh mục ngành của FPT Polytechnic. Trả về dạng gọn gàng: (1) danh sách ngành với điểm phù hợp/100 và lý do; (2) học phần/kỹ năng khuyến nghị; (3) lộ trình/ nghề nghiệp gợi ý; (4) tóm tắt 2–3 câu.`;
                document.getElementById('q').value = instruction + "\n\nHỒ SƠ:\n" + JSON.stringify(data);
            });
        }
    </script>
</body>

</html>
