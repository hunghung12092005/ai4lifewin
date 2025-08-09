<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>FPT Polytechnic - Ứng dụng tư vấn chọn ngành dựa trên AI</title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
  />
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
        <img
          src="https://vuainnhanh.com/wp-content/uploads/2023/02/logo-fpt-polytechnic.png"
          alt="FPT Polytechnic"
          height="50"
        />
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
          Xây dựng ứng dụng tư vấn chọn ngành học dựa trên AI
        </h1>
        <p class="lead muted mb-4">
          Hỗ trợ học sinh, sinh viên khóa 2007 xác định ngành học phù hợp với
          sở thích, năng lực và định hướng nghề nghiệp của bản thân. Ứng dụng
          sử dụng mô hình AI (OpenAI/Gemini) để phân tích dữ liệu và gợi ý ngành
          học trong danh mục của FPT Polytechnic.
        </p>
        <div class="d-flex flex-wrap gap-2 mb-3">
          <span class="badge text-bg-light"
            ><span class="badge-dot"></span>Sáng tạo</span
          >
          <span class="badge text-bg-light"
            ><span class="badge-dot"></span>Giao diện dễ sử dụng</span
          >
          <span class="badge text-bg-light"
            ><span class="badge-dot"></span>Xử lý dữ liệu rõ ràng</span
          >
        </div>
        <a href="#form" class="btn btn-primary btn-lg">Bắt đầu tư vấn</a>
      </div>
      <div class="col-lg-5">
        <div class="card p-3">
          <img
            class="w-100 rounded"
            src="https://caodang.fpt.edu.vn/wp-content/uploads/kn.webp"
            alt="FPT Polytechnic"
          />
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
          <form
            id="advisor-form"
            class="row g-3"
            method="POST"
            action="/chat"
            autocomplete="off"
          >
            @csrf

            <div class="col-md-6">
              <label class="form-label" for="name">Họ tên</label>
              <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                placeholder="Nguyễn Văn A"
                required
              />
            </div>
            <div class="col-md-6">
              <label class="form-label" for="cohort">Khóa</label>
              <input
                type="text"
                class="form-control"
                id="cohort"
                name="cohort"
                value="2007"
                required
              />
            </div>
            <div class="col-12">
              <label class="form-label" for="interests">Sở thích</label>
              <textarea
                class="form-control"
                id="interests"
                name="interests"
                rows="2"
                placeholder="VD: thích công nghệ, thiết kế, làm việc nhóm..."
                required
              ></textarea>
            </div>
            <div class="col-12">
              <label class="form-label" for="skills">Kỹ năng / Tố chất</label>
              <textarea
                class="form-control"
                id="skills"
                name="skills"
                rows="2"
                placeholder="VD: tư duy logic, sáng tạo, giao tiếp..."
                required
              ></textarea>
            </div>
            <div class="col-12">
              <label class="form-label" for="scores">Điểm số các môn</label>
              <textarea
                class="form-control"
                id="scores"
                name="scores"
                rows="2"
                placeholder="VD: Toán:8; Lý:7; Hóa:6; Văn:7"
                required
              ></textarea>
            </div>
            <div class="col-12">
              <label class="form-label" for="favorite_subjects">Môn học yêu thích</label>
              <input
                class="form-control"
                id="favorite_subjects"
                name="favorite_subjects"
                placeholder="VD: Lập trình, Thiết kế đồ họa, Marketing..."
                required
              />
            </div>
            <div class="col-12">
              <label class="form-label" for="career_goal">Định hướng nghề nghiệp</label>
              <textarea
                class="form-control"
                id="career_goal"
                name="career_goal"
                rows="2"
                placeholder="VD: Lập trình viên, Designer, Marketer..."
                required
              ></textarea>
            </div>
            <div class="col-12">
              <label class="form-label" for="study_habits">Thói quen học tập</label>
              <textarea
                class="form-control"
                id="study_habits"
                name="study_habits"
                rows="2"
                placeholder="VD: tự học, thích dự án thực tế, học nhóm..."
                required
              ></textarea>
            </div>

            <div class="col-12">
              <div class="row g-3">
                <div class="col-md-3">
                  <label class="form-label" for="aff_tech">Công nghệ</label>
                  <input
                    type="range"
                    class="form-range"
                    id="aff_tech"
                    name="aff_tech"
                    min="0"
                    max="100"
                    value="70"
                  />
                </div>
                <div class="col-md-3">
                  <label class="form-label" for="aff_creativity">Sáng tạo</label>
                  <input
                    type="range"
                    class="form-range"
                    id="aff_creativity"
                    name="aff_creativity"
                    min="0"
                    max="100"
                    value="70"
                  />
                </div>
                <div class="col-md-3">
                  <label class="form-label" for="aff_communication">Giao tiếp</label>
                  <input
                    type="range"
                    class="form-range"
                    id="aff_communication"
                    name="aff_communication"
                    min="0"
                    max="100"
                    value="50"
                  />
                </div>
                <div class="col-md-3">
                  <label class="form-label" for="aff_logic">Logic</label>
                  <input
                    type="range"
                    class="form-range"
                    id="aff_logic"
                    name="aff_logic"
                    min="0"
                    max="100"
                    value="60"
                  />
                </div>
              </div>
            </div>

            <!-- Input ẩn chứa prompt AI -->
            <input type="hidden" name="message" id="message" />

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
            <img
              class="w-100"
              src="https://vuainnhanh.com/wp-content/uploads/2023/02/logo-fpt-polytechnic.png"
              alt="FPT Polytechnic"
            />
          </div>
        </div>
      </div>
    </section>

    <div
      id="chat-result"
      class="mt-3 p-3 border rounded"
      style="white-space: pre-wrap; background: #f1f1f1; min-height: 100px"
    ></div>
  </main>

  <footer class="py-4 border-top">
    <div
      class="container small d-flex justify-content-between flex-wrap gap-2"
    >
      <span>© {{ date("Y") }} FPT Polytechnic – AI tư vấn chọn ngành</span>
      <span class="muted">Phiên bản demo phục vụ cuộc thi</span>
    </div>
  </footer>

  <script>
    const form = document.getElementById("advisor-form");
    const resultDiv = document.getElementById("chat-result");
    const csrfToken = document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content");
    const messageInput = document.getElementById("message");

    if (form) {
      form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const data = {
          name: document.getElementById("name").value.trim(),
          cohort: document.getElementById("cohort").value.trim(),
          interests: document.getElementById("interests").value.trim(),
          skills: document.getElementById("skills").value.trim(),
          scores: document.getElementById("scores").value.trim(),
          favoriteSubjects: document
            .getElementById("favorite_subjects")
            .value.trim(),
          careerGoal: document.getElementById("career_goal").value.trim(),
          studyHabits: document.getElementById("study_habits").value.trim(),
          affinity: {
            technology: document.getElementById("aff_tech").value,
            creativity: document.getElementById("aff_creativity").value,
            communication: document.getElementById("aff_communication").value,
            logic: document.getElementById("aff_logic").value,
          },
        };

        const instruction = `Bạn là cố vấn học tập của FPT Polytechnic. Dựa trên hồ sơ JSON dưới đây, hãy đề xuất 3–5 ngành phù hợp trong danh mục ngành của FPT Polytechnic. Trả về dạng gọn gàng: (1) danh sách ngành với điểm phù hợp/100 và lý do; (2) học phần/kỹ năng khuyến nghị; (3) lộ trình/ nghề nghiệp gợi ý; (4) tóm tắt 2–3 câu.`;

        const prompt = instruction + "\n\nHỒ SƠ:\n" + JSON.stringify(data);

        // Gán prompt vào input ẩn
        messageInput.value = prompt;

        resultDiv.textContent = "Đang xử lý, vui lòng chờ...";

        try {
          const response = await fetch("/chat", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify({ message: prompt }),
          });

          if (!response.ok) throw new Error("Lỗi khi gọi API");

          const result = await response.json();
          const answer = result.answer || result.message || JSON.stringify(result, null, 2);
          resultDiv.textContent = answer;
        } catch (error) {
          resultDiv.textContent = "Có lỗi xảy ra: " + error.message;
        }
      });
    }
  </script>
</body>
</html>
