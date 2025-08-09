<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FPT Polytechnic - Ứng dụng tư vấn chọn ngành dựa trên AI</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="icon" type="image/png" href="https://reviewedu.net/wp-content/uploads/2021/11/truong-cao-dang-fpt-polytechnic-1.png">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" />
    <style>
        :root {
            --primary: #f37021;
            --primary-light: #ff8c4b;
            --primary-dark: #d65a1a;
            --background: #f8fafc;
            --text: #1f2a44;
            --muted: #6b7280;
            --accent: #4b6cb7;
        }

        body {
            font-family: "Inter", sans-serif;
            background: var(--background);
            color: var(--text);
            line-height: 1.6;
        }

        .hero {
            background: linear-gradient(135deg, #fff3e6 0%, #ffe8cc 100%);
            border-bottom: 1px solid #e5e7eb;
            padding: 2rem 0;
        }

        .card {
            border: 1px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border-radius: 12px;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-4px);
        }

        .section-title {
            font-weight: 600;
            letter-spacing: 0.3px;
            color: var(--text);
        }

        .badge-dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--primary);
            margin-right: 10px;
            border: 1px solid var(--primary-light);
        }

        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
            border-radius: 8px;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            transition: background 0.2s ease;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-outline-secondary {
            border-color: var(--accent);
            color: var(--accent);
            border-radius: 8px;
            font-weight: 500;
        }

        .btn-outline-secondary:hover {
            background: var(--accent);
            color: #fff;
        }

        .muted {
            color: var(--muted);
        }

        a.text-decoration-none {
            color: var(--accent);
            font-weight: 500;
            transition: color 0.2s ease;
        }

        a.text-decoration-none:hover {
            color: var(--primary);
        }

        .form-control,
        .form-range {
            border-radius: 8px;
            border: 1px solid #d1d5db;
            transition: border-color 0.2s ease;
        }

        .form-control:focus,
        .form-range:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(243, 112, 33, 0.1);
        }

        .container {
            max-width: 1200px;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .row.g-4 {
            margin-bottom: 2rem;
        }

        footer {
            background: var(--background);
            border-top: 1px solid #e5e7eb;
            padding: 2rem 0;
        }
    </style>
</head>

<body>
    <header class="hero py-4">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <img src="https://vuainnhanh.com/wp-content/uploads/2023/02/logo-fpt-polytechnic.png"
                    alt="FPT Polytechnic" height="50" />
                <span class="fw-semibold">Định hướng ngành học cho tân sinh viên</span>
            </div>
            <nav class="d-none d-md-flex gap-4">
                <a class="text-decoration-none" href="#features">Tính năng</a>
                <a class="text-decoration-none" href="#form">Tư vấn ngay</a>
                <a class="text-decoration-none" href="#about">Giới thiệu</a>
            </nav>
        </div>
    </header>

    <main class="container py-5">
        <!-- Hero copy -->
        <div class="row align-items-center g-4 mb-4">
            <div class="col-lg-7">
                <h1 class="display-6 mb-3">
                    Ứng dụng tư vấn chọn ngành học dựa trên AI
                </h1>
                <p class="lead muted mb-4">
                    Hỗ trợ học sinh, sinh viên xác định ngành học phù hợp với
                    sở thích, năng lực và định hướng nghề nghiệp của bản thân và gợi ý ngành
                    học phù hợp tại FPT Polytechnic.
                </p>
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
                    <p class="muted mb-2">
                        Thu thập đầy đủ các trường thông tin cần thiết từ người dùng.
                    </p>
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
                    <p class="muted mb-2">
                        Gọi API AI (OpenAI/Gemini) để suy luận mức độ phù hợp.
                    </p>
                    <ul class="mb-0 small">
                        <li>Gợi ý 3–5 ngành phù hợp (điểm phù hợp, lý do)</li>
                        <li>Khuyến nghị học phần/kỹ năng cần bổ sung</li>
                        <li>Lộ trình/nghề nghiệp tham khảo sau tốt nghiệp</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-4">
                    <h3 class="h5 section-title">Lưu trữ &amp; Theo dõi</h3>
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
                    <form id="advisor-form" class="row g-3" method="POST" action="{{ route('home.chat') }}"
                        autocomplete="off">
                        @csrf

                        <div class="col-md-6">
                            <label class="form-label" for="name">Họ tên</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nguyễn Văn A" required />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="cohort">Khóa</label>
                            <input type="text" class="form-control" id="cohort" name="cohort" value="2007"
                                required />
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="interests">Sở thích</label>
                            <textarea class="form-control" id="interests" name="interests" rows="2"
                                placeholder="VD: thích công nghệ, thiết kế, làm việc nhóm..." required></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="skills">Kỹ năng / Tố chất</label>
                            <textarea class="form-control" id="skills" name="skills" rows="2"
                                placeholder="VD: tư duy logic, sáng tạo, giao tiếp..." required></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="scores">Điểm số các môn</label>
                            <textarea class="form-control" id="scores" name="scores" rows="2"
                                placeholder="VD: Toán:8; Lý:7; Hóa:6; Văn:7" required></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="favorite_subjects">Môn học yêu thích</label>
                            <input class="form-control" id="favorite_subjects" name="favorite_subjects"
                                placeholder="VD: Lập trình, Thiết kế đồ họa, Marketing..." required />
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="career_goal">Định hướng nghề nghiệp</label>
                            <textarea class="form-control" id="career_goal" name="career_goal" rows="2"
                                placeholder="VD: Lập trình viên, Designer, Marketer..." required></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="study_habits">Thói quen học tập</label>
                            <textarea class="form-control" id="study_habits" name="study_habits" rows="2"
                                placeholder="VD: tự học, thích dự án thực tế, học nhóm..." required></textarea>
                        </div>

                        <div class="col-12">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label" for="aff_tech">Công nghệ:
                                        <span id="val_aff_tech"></span>
                                    </label>
                                    <input type="range" class="form-range" id="aff_tech" name="aff_tech"
                                        min="0" max="100" value="70"
                                        oninput="updateValue('aff_tech')" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="aff_creativity">Sáng tạo:
                                        <span id="val_aff_creativity"></span>
                                    </label>
                                    <input type="range" class="form-range" id="aff_creativity"
                                        name="aff_creativity" min="0" max="100" value="70"
                                        oninput="updateValue('aff_creativity')" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="aff_communication">Giao tiếp:
                                        <span id="val_aff_communication"></span>
                                    </label>
                                    <input type="range" class="form-range" id="aff_communication"
                                        name="aff_communication" min="0" max="100" value="50"
                                        oninput="updateValue('aff_communication')" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="aff_logic">Logic:
                                        <span id="val_aff_logic"></span>
                                    </label>
                                    <input type="range" class="form-range" id="aff_logic" name="aff_logic"
                                        min="0" max="100" value="60"
                                        oninput="updateValue('aff_logic')" />
                                </div>
                            </div>
                        </div>

                        <!-- Input ẩn chứa prompt AI -->
                        <input type="hidden" name="message" id="message" />

                        <div class="col-12 d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Phân tích bằng AI</button>
                            <a href="#features" class="btn btn-outline-secondary">Xem yêu cầu</a>
                            <button type="button" id="btn-save-form" class="btn btn-outline-secondary">Lưu hồ
                                sơ</button>
                            <button type="button" id="btn-show-forms" class="btn btn-outline-secondary">Hồ sơ đã
                                lưu</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card p-4">
                    <h2 id="about" class="h5 mb-3">Ứng dụng làm được gì?</h2>
                    <ul class="small mb-3">

                        <li><strong>Xếp hạng phù hợp</strong> từng ngành trong danh sách FPT Polytechnic</li>
                        <li><strong>Giải thích lý do</strong> + đề xuất môn/kỹ năng nên học</li>
                    </ul>
                    <div class="rounded overflow-hidden">
                        <img class="w-100"
                            src="https://vuainnhanh.com/wp-content/uploads/2023/02/logo-fpt-polytechnic.png"
                            alt="FPT Polytechnic" />
                    </div>
                </div>
            </div>
        </section>

        <div id="chat-result" class="mt-3 p-3 border rounded"
            style="white-space: pre-wrap; background: #f1f1f1; min-height: 100px"></div>
    </main>

    <footer class="py-4 border-top">
        <div class="container small d-flex justify-content-between flex-wrap gap-2">
            <span>© {{ date('Y') }} FPT Polytechnic – AI tư vấn chọn ngành</span>
            <span class="muted">Phiên bản demo phục vụ cuộc thi</span>
        </div>
    </footer>

    <!-- Panel danh sách hồ sơ đã lưu -->
    <div id="saved-panel"
        style="display:none; position:fixed; right:16px; bottom:80px; width:360px; max-height:60vh; background:#fff; border:1px solid #e5e7eb; border-radius:12px; box-shadow:0 12px 32px rgba(0,0,0,0.18); z-index:1000; overflow:hidden;">
        <div
            style="display:flex; align-items:center; justify-content:space-between; padding:10px 12px; background:#fff7f2; border-bottom:1px solid #f1f1f1;">
            <div style="font-weight:600;">Hồ sơ đã lưu</div>
            <button id="saved-close" aria-label="Đóng"
                style="border:none; background:transparent; font-size:20px; line-height:1; cursor:pointer;">×</button>
        </div>
        <div id="saved-list" style="padding:10px; overflow:auto; max-height: calc(60vh - 48px);"></div>
    </div>

    <!-- Chatbot nổi góc trái dưới -->
    <button id="chatbot-toggle" aria-label="Mở chatbot"
        style="position: fixed; left: 16px; bottom: 16px; z-index: 1000; width: 54px; height: 54px; border-radius: 50%; border: none; background: var(--primary); color: #fff; box-shadow: 0 6px 16px rgba(0,0,0,0.15); font-weight: 700; cursor: pointer;">
        AI
    </button>

    <div id="chatbot-panel" role="dialog" aria-modal="true" aria-labelledby="chatbot-title"
        style="display: block; position: fixed; left: 16px; bottom: 78px; width: 360px; max-height: 70vh; background: #fff; border: 1px solid #e5e7eb; border-radius: 12px; box-shadow: 0 12px 32px rgba(0,0,0,0.18); z-index: 1000; overflow: hidden;">
        <div
            style="display:flex; align-items:center; justify-content:space-between; padding:10px 12px; background:#fff7f2; border-bottom:1px solid #f1f1f1;">
            <div>
                <div id="chatbot-title" style="font-weight:600;">Trợ lý CSKH FPT Polytechnic</div>
                <div class="muted" style="font-size:12px;">Tư vấn nhanh về ngành học, tuyển sinh, học phí...</div>
            </div>
            <button id="chatbot-close" aria-label="Đóng"
                style="border:none; background:transparent; font-size:20px; line-height:1; cursor:pointer;">×</button>
        </div>
        <div id="chatbot-messages" style="padding:12px; height: 360px; overflow:auto; background:#fafafa;"></div>
        <div style="padding:10px; background:#fff; border-top:1px solid #f1f1f1;">
            <div style="display:flex; gap:8px; align-items:flex-end;">
                <textarea id="chatbot-input" rows="1" placeholder="Nhập câu hỏi..."
                    style="flex:1; resize:none; max-height:120px; padding:8px 10px; border:1px solid #d1d5db; border-radius:8px; font-size:14px;"></textarea>
                <button id="chatbot-send" class="btn btn-primary" style="padding:8px 14px;">Gửi</button>
            </div>
        </div>
    </div>

    <!-- Overlay QR chia sẻ -->
    <div id="qr-overlay"
        style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:2000; align-items:center; justify-content:center;">
        <div
            style="background:#fff; padding:0; border-radius:14px; width:340px; text-align:center; box-shadow:0 16px 40px rgba(0,0,0,0.28); overflow:hidden;">
            <div
                style="display:flex; align-items:center; justify-content:space-between; padding:10px 12px; background:#fff7f2; border-bottom:1px solid #f1f1f1;">
                <div style="font-weight:700; letter-spacing:.2px;">Quét để xem chia sẻ</div>
                <button id="qr-close" aria-label="Đóng"
                    style="border:none; background:transparent; font-size:20px; line-height:1; cursor:pointer;">×</button>
            </div>
            <div style="padding:16px;">
                <div style="display:flex; flex-direction:column; align-items:center; gap:10px;">
                    <div
                        style="padding:8px; background:#fff; border:1px solid #eee; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.04);">
                        <img id="qr-img" alt="QR" src=""
                            style="width:240px; height:240px; border-radius:8px;" />
                    </div>
                    <a id="qr-link" target="_blank" rel="noopener"
                        style="font-size:12px; max-width:280px; word-break:break-all; color:#4b6cb7; text-decoration:underline;"></a>
                    <a id="qr-download" class="btn btn-outline-secondary btn-sm" style="margin-top:4px;"
                        download="fptpoly-qr.png">Tải QR</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function updateValue(id) {
            document.getElementById('val_' + id).textContent = document.getElementById(id).value + '%';
        }
        
        // Gán giá trị mặc định khi trang load
        window.addEventListener('DOMContentLoaded', function () {
            ['aff_tech', 'aff_creativity', 'aff_communication', 'aff_logic'].forEach(updateValue);
        });
        </script>
    <script>
        const form = document.getElementById("advisor-form");
        const resultDiv = document.getElementById("chat-result");
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
        const messageInput = document.getElementById("message");
        const btnSaveForm = document.getElementById('btn-save-form');
        const btnShowForms = document.getElementById('btn-show-forms');
        const savedPanel = document.getElementById('saved-panel');
        const savedList = document.getElementById('saved-list');

        if (form) {
            form.addEventListener("submit", async (e) => {
                e.preventDefault();

                const data = {
                    name: document.getElementById("name").value.trim(),
                    cohort: document.getElementById("cohort").value.trim(),
                    interests: document.getElementById("interests").value.trim(),
                    skills: document.getElementById("skills").value.trim(),
                    scores: document.getElementById("scores").value.trim(),
                    favoriteSubjects: document.getElementById("favorite_subjects").value.trim(),
                    careerGoal: document.getElementById("career_goal").value.trim(),
                    studyHabits: document.getElementById("study_habits").value.trim(),
                    affinity: {
                        technology: document.getElementById("aff_tech").value,
                        creativity: document.getElementById("aff_creativity").value,
                        communication: document.getElementById("aff_communication").value,
                        logic: document.getElementById("aff_logic").value,
                    },
                };

                const instruction =
                    `Bạn là cố vấn học tập của FPT Polytechnic. Dựa trên hồ sơ JSON dưới đây, hãy đề xuất 3–5 ngành phù hợp trong danh mục ngành của FPT Polytechnic. Trả về dạng gọn gàng: (1) danh sách ngành với điểm phù hợp/100 và lý do; (2) học phần/kỹ năng khuyến nghị; (3) lộ trình/ nghề nghiệp gợi ý; (4) tóm tắt 2–3 câu.`;

                const prompt = instruction + "\n\nHỒ SƠ:\n" + JSON.stringify(data);

                messageInput.value = prompt;
                resultDiv.innerHTML = "<em>Đang xử lý, vui lòng chờ...</em>";

                try {
                    const response = await fetch("{{ route('home.chat') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": csrfToken,
                        },
                        body: JSON.stringify({
                            message: prompt,
                            profile: data
                        }),
                    });

                    if (!response.ok) {
                        const errText = await response.text().catch(() => "");
                        throw new Error(
                            `HTTP ${response.status} ${response.statusText}${errText ? ` - ${errText}` : ''}`
                            );
                    }

                    const result = await response.json();
                    const replyText = result.reply || "";
                    const majorsFromServer = Array.isArray(result.majors) ? result.majors : [];
                    const ranking = Array.isArray(result.ranking) ? result.ranking : [];

                    renderResult(replyText, majorsFromServer, ranking);
                } catch (error) {
                    resultDiv.textContent = "Có lỗi xảy ra: " + error.message;
                }
            });

            // Hàm render kết quả
            function renderResult(replyText, majorsFromServer = [], ranking = []) {
                const container = document.getElementById("chat-result");
                container.innerHTML = "";

                try {
                    // Tìm JSON mảng ngành học trong replyText
                    const jsonMatch = replyText.match(/\[\s*{[\s\S]*?}\s*]/m);
                    let majors = null;
                    if (jsonMatch) {
                        majors = JSON.parse(jsonMatch[0]);
                    }

                    // Nếu có danh sách ngành học dạng JSON
                    if (majors && Array.isArray(majors)) {
                        const listDiv = document.createElement("div");
                        listDiv.innerHTML =
                            `<h4 style="margin-bottom: 12px; border-bottom: 2px solid #333; padding-bottom: 4px;">Danh sách ngành phù hợp (FPT Polytechnic):</h4>`;

                        majors.forEach((major) => {
                            const itemDiv = document.createElement("div");
                            itemDiv.style.borderBottom = "1px solid #ddd";
                            itemDiv.style.paddingBottom = "12px";
                            itemDiv.style.marginBottom = "12px";
                            itemDiv.style.display = "grid";
                            itemDiv.style.gridTemplateColumns = "120px 1fr";
                            itemDiv.style.gap = "12px";
                            itemDiv.style.alignItems = "start";

                            // Ảnh có link
                            if (major.image && major.url) {
                                const link = document.createElement("a");
                                link.href = major.url;
                                link.target = "_blank";
                                link.rel = "noopener noreferrer";

                                const img = document.createElement("img");
                                img.src = major.image;
                                img.alt = major.title || "Hình ngành học";
                                img.style.width = "120px";
                                img.style.height = "90px";
                                img.style.borderRadius = "8px";
                                img.style.objectFit = "cover";
                                img.style.border = "1px solid #eee";
                                img.style.boxShadow = "0 2px 6px rgba(0,0,0,0.06)";

                                link.appendChild(img);
                                itemDiv.appendChild(link);
                            }

                            // Tiêu đề và mô tả bên cạnh ảnh
                            const infoDiv = document.createElement("div");
                            const title = document.createElement("h5");
                            title.textContent = major.title || "Ngành chưa rõ";
                            title.style.margin = "0 0 6px 0";
                            title.style.color = "#222";

                            const desc = document.createElement("p");
                            desc.textContent = major.description || "";
                            desc.style.margin = "0";
                            desc.style.whiteSpace = "pre-wrap";
                            desc.style.color = "#444";

                            infoDiv.appendChild(title);
                            infoDiv.appendChild(desc);
                            itemDiv.appendChild(infoDiv);

                            listDiv.appendChild(itemDiv);
                        });

                        container.appendChild(listDiv);
                    }

                    // Nếu backend trả về majors gợi ý (khi không có JSON trong text)
                    if ((!majors || !Array.isArray(majors)) && majorsFromServer.length) {
                        const listDiv = document.createElement("div");
                        listDiv.innerHTML =
                            `<h4 style="margin-bottom: 12px; border-bottom: 2px solid #333; padding-bottom: 4px;">Ngành liên quan (FPT Polytechnic):</h4>`;
                        majorsFromServer.slice(0, 3).forEach((major) => {
                            const itemDiv = document.createElement("div");
                            itemDiv.style.borderBottom = "1px solid #ddd";
                            itemDiv.style.paddingBottom = "12px";
                            itemDiv.style.marginBottom = "12px";
                            itemDiv.style.display = "grid";
                            itemDiv.style.gridTemplateColumns = "120px 1fr";
                            itemDiv.style.gap = "12px";
                            itemDiv.style.alignItems = "start";

                            if (major.image && major.url) {
                                const link = document.createElement("a");
                                link.href = major.url;
                                link.target = "_blank";
                                link.rel = "noopener noreferrer";
                                const img = document.createElement("img");
                                img.src = major.image;
                                img.alt = major.title || "Hình ngành học";
                                img.style.width = "120px";
                                img.style.height = "90px";
                                img.style.borderRadius = "8px";
                                img.style.objectFit = "cover";
                                img.style.border = "1px solid #eee";
                                img.style.boxShadow = "0 2px 6px rgba(0,0,0,0.06)";
                                link.appendChild(img);
                                itemDiv.appendChild(link);
                            }

                            const infoDiv = document.createElement("div");
                            const title = document.createElement("h5");
                            title.textContent = major.title || "Ngành";
                            title.style.margin = "0 0 6px 0";
                            title.style.color = "#222";
                            const desc = document.createElement("p");
                            desc.textContent = major.description || "";
                            desc.style.margin = "0";
                            desc.style.whiteSpace = "pre-wrap";
                            desc.style.color = "#444";
                            infoDiv.appendChild(title);
                            infoDiv.appendChild(desc);
                            itemDiv.appendChild(infoDiv);

                            listDiv.appendChild(itemDiv);
                        });
                        container.appendChild(listDiv);
                    }

                    // Nếu backend trả về ranking điểm phù hợp, hiển thị ở đầu
                    if (ranking && ranking.length) {
                        const rankDiv = document.createElement('div');
                        rankDiv.innerHTML =
                            `<h4 style="margin: 8px 0 8px; border-bottom: 2px solid #333; padding-bottom: 4px;">Xếp hạng phù hợp (FPT Polytechnic)</h4>`;
                        ranking.slice(0, 5).forEach(r => {
                            const row = document.createElement('div');
                            row.style.display = 'grid';
                            row.style.gridTemplateColumns = '1fr 120px 48px';
                            row.style.gap = '8px';
                            row.style.marginBottom = '6px';
                            const name = document.createElement('div');
                            name.textContent = r.title;
                            const barWrap = document.createElement('div');
                            barWrap.style.background = '#f1f5f9';
                            barWrap.style.border = '1px solid #e2e8f0';
                            barWrap.style.borderRadius = '999px';
                            barWrap.style.height = '10px';
                            const bar = document.createElement('div');
                            bar.style.height = '10px';
                            bar.style.borderRadius = '999px';
                            bar.style.width = Math.max(5, Math.min(100, r.score)) + '%';
                            bar.style.background = 'linear-gradient(90deg, #f37021, #ff8c4b)';
                            bar.style.boxShadow = '0 1px 2px rgba(0,0,0,0.08) inset';
                            barWrap.appendChild(bar);
                            const score = document.createElement('div');
                            score.textContent = r.score + '%';
                            score.style.textAlign = 'right';
                            score.style.fontWeight = '600';
                            score.style.color = '#1f2a44';
                            const grid = document.createElement('div');
                            grid.style.display = 'grid';
                            grid.style.gridTemplateColumns = '1fr 120px 48px';
                            grid.style.gap = '8px';
                            grid.appendChild(name);
                            grid.appendChild(barWrap);
                            grid.appendChild(score);
                            rankDiv.appendChild(grid);

                            // Lý do (reasons) + mini-bars cho 4 yếu tố
                            if (Array.isArray(r.reasons) && r.reasons.length) {
                                const reasons = document.createElement('div');
                                reasons.style.fontSize = '12px';
                                reasons.style.color = '#555';
                                reasons.style.margin = '2px 0 6px';
                                reasons.textContent = r.reasons.join(' • ');
                                rankDiv.appendChild(reasons);
                            }
                            if (r.factors) {
                                const f = r.factors;
                                const mini = document.createElement('div');
                                mini.style.display = 'grid';
                                mini.style.gridTemplateColumns = 'repeat(4, 1fr)';
                                mini.style.gap = '8px';
                                mini.style.marginBottom = '8px';
                                [
                                    ['Công nghệ', 'technology'],
                                    ['Sáng tạo', 'creativity'],
                                    ['Giao tiếp', 'communication'],
                                    ['Logic', 'logic']
                                ].forEach(([label, key]) => {
                                    const wrap = document.createElement('div');
                                    const lab = document.createElement('div');
                                    lab.textContent = label;
                                    lab.style.fontSize = '11px';
                                    lab.style.color = '#475569';
                                    const w = document.createElement('div');
                                    w.style.height = '6px';
                                    w.style.background = '#f1f5f9';
                                    w.style.border = '1px solid #e2e8f0';
                                    w.style.borderRadius = '999px';
                                    const b = document.createElement('div');
                                    b.style.height = '6px';
                                    b.style.borderRadius = '999px';
                                    b.style.width = Math.max(3, Math.min(100, parseInt(f[key] || 0))) + '%';
                                    b.style.background = 'linear-gradient(90deg, #4b6cb7, #6ea0ff)';
                                    b.style.boxShadow = '0 1px 2px rgba(0,0,0,0.08) inset';
                                    w.appendChild(b);
                                    wrap.appendChild(lab);
                                    wrap.appendChild(w);
                                    mini.appendChild(wrap);
                                });
                                rankDiv.appendChild(mini);
                            }
                        });
                        container.appendChild(rankDiv);
                    }

                    // Phần text còn lại (ngoài JSON), parse markdown nhẹ & trình bày đẹp
                    const remainingText = replyText.replace(jsonMatch ? jsonMatch[0] : "", "").trim();
                    if (remainingText) {
                        const section = document.createElement("section");
                        section.style.marginTop = "20px";

                        const sectionTitle = document.createElement("h4");
                        sectionTitle.textContent = "Thông tin chi tiết:";
                        sectionTitle.style.margin = "0 0 8px 0";
                        sectionTitle.style.borderBottom = "2px solid #333";
                        sectionTitle.style.paddingBottom = "4px";
                        section.appendChild(sectionTitle);

                        const content = document.createElement("div");
                        content.style.fontSize = "15px";
                        content.style.lineHeight = "1.6";
                        content.style.color = "#222";

                        // Chuyển các gạch đầu dòng (-, *, •) thành <ul><li>
                        function renderBullets(block) {
                            const lines = block.split(/\n/);
                            const ul = document.createElement("ul");
                            ul.style.margin = "0 0 12px 1rem";
                            let hasItem = false;
                            lines.forEach((line) => {
                                const m = line.match(/^\s*[-*•]\s+(.+)/);
                                if (m) {
                                    const li = document.createElement("li");
                                    li.textContent = m[1];
                                    ul.appendChild(li);
                                    hasItem = true;
                                }
                            });
                            return hasItem ? ul : null;
                        }

                        // Tiền xử lý: chuẩn hoá newline và tự xuống dòng theo câu
                        let textToFormat = remainingText.replace(/\r\n|\r/g, "\n");
                        textToFormat = textToFormat.replace(/([\.!?])\s+/g, '$1\n');

                        // Tách theo đoạn, xử lý heading, bullet, paragraph
                        const blocks = textToFormat
                            .split(/\n{2,}/)
                            .map((b) => b.trim())
                            .filter(Boolean);

                        blocks.forEach((block) => {
                            // Heading markdown kiểu "##" hoặc "#" ở đầu dòng => h5
                            if (/^(#+)\s+/.test(block)) {
                                const text = block.replace(/^#+\s+/, "").trim();
                                const h = document.createElement("h5");
                                h.textContent = text;
                                h.style.margin = "12px 0 6px";
                                content.appendChild(h);
                                return;
                            }

                            // Danh sách gạch đầu dòng
                            const ul = renderBullets(block);
                            if (ul) {
                                content.appendChild(ul);
                                return;
                            }

                            // Đoạn văn: chuyển URL thành link, hỗ trợ **bold** và *italic*
                            const p = document.createElement("p");
                            p.style.margin = "0 0 10px 0";
                            const withLinks = block.replace(
                                /(https?:\/\/[^\s)]+)|(www\.[^\s)]+)/g,
                                (m) =>
                                `<a href="${m.startsWith('http') ? m : 'http://' + m}" target="_blank" rel="noopener noreferrer">${m}</a>`
                            );
                            let html = withLinks
                                .replace(/\*\*(.*?)\*\*/g, '<strong>$1<\/strong>')
                                .replace(/(^|\s)\*(.*?)\*(?=\s|$)/g, '$1<em>$2<\/em>')
                                .replace(/\n/g, '<br/>');
                            // Loại bỏ mọi dấu * còn sót lại
                            html = html.replace(/\*/g, '');
                            p.innerHTML = html;
                            content.appendChild(p);
                        });

                        section.appendChild(content);

                        // Thanh hành động: nút chia sẻ (tạo QR)
                        const actions = document.createElement('div');
                        actions.style.marginTop = '12px';
                        const shareBtn = document.createElement('button');
                        shareBtn.className = 'btn btn-outline-secondary btn-sm';
                        shareBtn.textContent = 'Chia sẻ (QR)';
                        shareBtn.addEventListener('click', async () => {
                            try {
                                const resp = await fetch('{{ route('share.create') }}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                        'X-Requested-With': 'XMLHttpRequest',
                                        'X-CSRF-TOKEN': csrfToken,
                                    },
                                    body: JSON.stringify({
                                        reply: replyText,
                                        majors: majorsFromServer
                                    })
                                });
                                const data = await resp.json();
                                if (!data || !data.url) throw new Error('No share URL');
                                // Dùng origin hiện tại để tạo URL có thể truy cập từ thiết bị khác trong LAN
                                const u = new URL(data.url, window.location.origin);
                                const shareUrl = window.location.origin + u.pathname;
                                const qrUrlPrimary =
                                    `https://chart.googleapis.com/chart?chs=240x240&cht=qr&chl=${encodeURIComponent(shareUrl)}`;
                                const qrUrlFallback =
                                    `https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=${encodeURIComponent(shareUrl)}`;
                                const overlay = document.getElementById('qr-overlay');
                                const qrImg = document.getElementById('qr-img');
                                const qrLink = document.getElementById('qr-link');
                                const qrDownload = document.getElementById('qr-download');
                                const qrClose = document.getElementById('qr-close');
                                if (overlay && qrImg && qrLink && qrDownload) {
                                    qrImg.onerror = () => {
                                        qrImg.src = qrUrlFallback;
                                        qrDownload.href = qrUrlFallback;
                                    };
                                    qrImg.src = qrUrlPrimary;
                                    qrLink.href = shareUrl;
                                    qrLink.textContent = shareUrl;
                                    qrDownload.href = qrUrlPrimary;
                                    overlay.style.display = 'flex';
                                    if (qrClose) qrClose.onclick = () => overlay.style.display = 'none';
                                    overlay.onclick = (e) => {
                                        if (e.target === overlay) overlay.style.display = 'none';
                                    };
                                }
                            } catch (e) {
                                alert('Không tạo được liên kết chia sẻ.');
                            }
                        });
                        actions.appendChild(shareBtn);
                        section.appendChild(actions);
                        container.appendChild(section);
                    }
                } catch (e) {
                    container.textContent = replyText; // fallback hiện nguyên văn
                }
            }
        }
    </script>

    <script>
        // Chatbot (bottom-left)
        (function initChatbot() {
            const toggleBtn = document.getElementById("chatbot-toggle");
            const panel = document.getElementById("chatbot-panel");
            const closeBtn = document.getElementById("chatbot-close");
            const messages = document.getElementById("chatbot-messages");
            const input = document.getElementById("chatbot-input");
            const sendBtn = document.getElementById("chatbot-send");
            if (!toggleBtn || !panel || !messages || !input || !sendBtn) return;

            const csrfTokenValue = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

            function showPanel() {
                panel.style.display = "block";
                input.focus();
            }

            function hidePanel() {
                panel.style.display = "none";
            }

            function togglePanel() {
                (panel.style.display === "none" || !panel.style.display) ? showPanel(): hidePanel();
            }

            function scrollToBottom() {
                messages.scrollTop = messages.scrollHeight;
            }

            function addBubble(text, role = "assistant") {
                const row = document.createElement("div");
                row.style.display = "flex";
                row.style.marginBottom = "8px";
                row.style.justifyContent = role === "user" ? "flex-end" : "flex-start";
                const bubble = document.createElement("div");
                bubble.style.maxWidth = "78%";
                bubble.style.padding = "8px 10px";
                bubble.style.borderRadius = "10px";
                bubble.style.whiteSpace = "pre-wrap";
                bubble.style.fontSize = "14px";
                bubble.style.lineHeight = "1.6";
                bubble.style.boxShadow = "0 1px 2px rgba(0,0,0,0.04)";
                if (role === "user") {
                    bubble.style.background = "#e8f0ff";
                    bubble.style.color = "#112";
                } else {
                    bubble.style.background = "#fff";
                    bubble.style.border = "1px solid #eee";
                    bubble.style.color = "#222";
                }

                function escapeHtml(s) {
                    return s
                        .replace(/&/g, "&amp;")
                        .replace(/</g, "&lt;")
                        .replace(/>/g, "&gt;")
                        .replace(/"/g, "&quot;")
                        .replace(/'/g, "&#39;");
                }

                function linkify(escaped) {
                    return escaped.replace(/(https?:\/\/[^\s)]+)|(www\.[^\s)]+)/g, (m) => {
                        const url = m.startsWith('http') ? m : 'http://' + m;
                        return `<a href="${url}" target="_blank" rel="noopener noreferrer">${m}</a>`;
                    });
                }

                if (role === "assistant") {
                    const safe = escapeHtml(text);
                    const withLinks = linkify(safe);
                    bubble.innerHTML = withLinks.replace(/\n/g, '<br/>');
                } else {
                    bubble.textContent = text;
                }
                row.appendChild(bubble);
                messages.appendChild(row);
                scrollToBottom();
            }

            function addTyping() {
                const row = document.createElement("div");
                row.id = "chatbot-typing";
                row.style.display = "flex";
                row.style.marginBottom = "8px";
                const bubble = document.createElement("div");
                bubble.style.background = "#fff";
                bubble.style.border = "1px solid #eee";
                bubble.style.maxWidth = "78%";
                bubble.style.padding = "8px 10px";
                bubble.style.borderRadius = "10px";
                bubble.style.fontSize = "14px";
                bubble.textContent = "Đang gõ...";
                row.appendChild(bubble);
                messages.appendChild(row);
                scrollToBottom();
            }

            function removeTyping() {
                const row = document.getElementById("chatbot-typing");
                if (row) row.remove();
            }

            function normalizeForDisplay(raw) {
                if (!raw) return "";
                // Chuẩn hoá newline và tự xuống dòng theo câu, loại dấu *
                return raw.replace(/\r\n|\r/g, "\n").replace(/[\*]+/g, "").replace(/([\.!?])\s+/g, '$1\n');
            }

            async function sendMessage() {
                const text = input.value.trim();
                if (!text) return;
                addBubble(text, "user");
                input.value = "";
                addTyping();
                try {
                    const response = await fetch("{{ route('home.chat') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": csrfTokenValue,
                        },
                        body: JSON.stringify({
                            message: text
                        })
                    });
                    const payload = await (response.ok ? response.json() : response.json().catch(() => ({
                        reply: 'Lỗi: ' + response.status
                    })));
                    removeTyping();
                    addBubble(normalizeForDisplay(payload.reply || "Xin lỗi, chưa có phản hồi."), "assistant");
                } catch (e) {
                    removeTyping();
                    addBubble("Có lỗi xảy ra khi gọi AI.", "assistant");
                }
            }

            toggleBtn.addEventListener("click", togglePanel);
            if (closeBtn) closeBtn.addEventListener("click", hidePanel);
            sendBtn.addEventListener("click", sendMessage);
            input.addEventListener("keydown", (e) => {
                if (e.key === "Enter" && !e.shiftKey) {
                    e.preventDefault();
                    sendMessage();
                }
            });
            // Hiển thị sẵn và chào khi lần đầu vào
            showPanel();
            if (!messages.dataset.greeted) {
                addBubble(
                    "Xin chào! Mình là trợ lý CSKH FPT Polytechnic. Bạn có thể hỏi về ngành đào tạo, tuyển sinh, học phí, học bổng...",
                    "assistant");
                messages.dataset.greeted = "1";
            }
        })();
    </script>

    <script>
        // Lưu + quản lý hồ sơ đã lưu
        async function saveCurrentForm() {
            const payload = {
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
            const resp = await fetch('{{ route('forms.save') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(payload)
            });
            const data = await resp.json();
            if (data.id) {
                alert('Đã lưu hồ sơ');
                loadSavedForms();
            }
        }

        async function loadSavedForms() {
            const resp = await fetch('{{ route('forms.list') }}');
            const data = await resp.json();
            const items = data.items || [];
            savedList.innerHTML = '';
            items.forEach(it => {
                const row = document.createElement('div');
                row.style.display = 'grid';
                row.style.gridTemplateColumns = '1fr auto auto';
                row.style.gap = '8px';
                row.style.alignItems = 'center';
                row.style.padding = '8px 0';
                row.style.borderBottom = '1px solid #eee';
                const label = document.createElement('div');
                label.textContent = `${it.name} ${it.cohort ? '('+it.cohort+')' : ''}`;
                const loadBtn = document.createElement('button');
                loadBtn.className = 'btn btn-sm btn-outline-secondary';
                loadBtn.textContent = 'Tải';
                loadBtn.onclick = async () => {
                    const r = await fetch(`{{ url('/forms') }}/${it.id}`);
                    const j = await r.json();
                    if (j && j.data) {
                        document.getElementById('name').value = j.data.name || '';
                        document.getElementById('cohort').value = j.data.cohort || '';
                        document.getElementById('interests').value = j.data.interests || '';
                        document.getElementById('skills').value = j.data.skills || '';
                        document.getElementById('scores').value = j.data.scores || '';
                        document.getElementById('favorite_subjects').value = j.data.favoriteSubjects ||
                            '';
                        document.getElementById('career_goal').value = j.data.careerGoal || '';
                        document.getElementById('study_habits').value = j.data.studyHabits || '';
                        const af = j.data.affinity || {};
                        document.getElementById('aff_tech').value = af.technology || 0;
                        document.getElementById('aff_creativity').value = af.creativity || 0;
                        document.getElementById('aff_communication').value = af.communication || 0;
                        document.getElementById('aff_logic').value = af.logic || 0;
                        alert('Đã nạp hồ sơ vào form');
                    }
                };
                const delBtn = document.createElement('button');
                delBtn.className = 'btn btn-sm btn-outline-danger';
                delBtn.textContent = 'Xóa';
                delBtn.onclick = async () => {
                    await fetch(`{{ url('/forms') }}/${it.id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });
                    loadSavedForms();
                };
                row.appendChild(label);
                row.appendChild(loadBtn);
                row.appendChild(delBtn);
                savedList.appendChild(row);
            });
        }

        document.getElementById('saved-close').onclick = () => savedPanel.style.display = 'none';
        if (btnSaveForm) btnSaveForm.onclick = saveCurrentForm;
        if (btnShowForms) btnShowForms.onclick = () => {
            savedPanel.style.display = 'block';
            loadSavedForms();
        };
    </script>

</body>

</html>
