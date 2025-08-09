<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Chia sẻ tư vấn - FPT Polytechnic</title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
  <style>
    body { background:#f8fafc; }
    .container { max-width: 860px; padding: 24px 16px; }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="h4 mb-3">Tư vấn đã chia sẻ (FPT Polytechnic)</h1>
    @php($reply = $data['reply'] ?? '')
    @php($majors = is_array($data['majors'] ?? null) ? $data['majors'] : [])

    @if (!empty($majors))
      <div class="card p-3 mb-3">
        <h2 class="h5 mb-3">Ngành liên quan (FPT Polytechnic)</h2>
        @foreach ($majors as $m)
          <div class="d-grid" style="grid-template-columns:110px 1fr; gap:12px; border-bottom:1px solid #eee; padding-bottom:12px; margin-bottom:12px;">
            @if (!empty($m['image']) && !empty($m['url']))
              <a href="{{ $m['url'] }}" target="_blank" rel="noopener">
                <img src="{{ $m['image'] }}" alt="{{ $m['title'] ?? 'Ngành' }}" style="width:110px; border-radius:8px; object-fit:cover;"/>
              </a>
            @endif
            <div>
              <div class="fw-semibold">{{ $m['title'] ?? 'Ngành' }}</div>
              <div class="text-muted">{{ $m['description'] ?? '' }}</div>
            </div>
          </div>
        @endforeach
      </div>
    @endif

    <div class="card p-3">
      <h2 class="h6">Nội dung tư vấn</h2>
      <pre style="white-space:pre-wrap; line-height:1.6; margin:0;">{{ $reply }}</pre>
    </div>
  </div>
</body>
</html>

