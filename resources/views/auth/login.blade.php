<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Desa Protomulyo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body{background:linear-gradient(135deg,#10B981 0%,#065f46 100%);min-height:100vh;display:flex;align-items:center;justify-content:center;font-family:'Inter',sans-serif;}
        .login-card{background:white;border-radius:20px;box-shadow:0 15px 40px rgba(0,0,0,.25);width:100%;max-width:420px;overflow:hidden;}
        .form-control:focus{border-color:#10B981;box-shadow:0 0 0 .25rem rgba(16,185,129,.15);}
    </style>
</head>
<body>
<div class="login-card p-2">
    <div style="background:#f8fafc;padding:30px;text-align:center;border-bottom:1px solid #f1f5f9;">
        <div class="rounded-circle bg-success d-inline-flex align-items-center justify-content-center mb-3" style="width:64px;height:64px;">
            <i class="bi bi-shield-lock-fill text-white fs-3"></i>
        </div>
        <h5 class="fw-bold mb-1">Panel Administrator</h5>
        <small class="text-muted">Desa Protomulyo, Kab. Kendal</small>
    </div>
    <div class="p-4">
        @if(session('error'))
            <div class="alert alert-danger d-flex align-items-center rounded-3" style="font-size:14px;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
            </div>
        @endif
        <form action="{{ route('login.proses') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label small fw-bold">Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-muted"></i></span>
                    <input type="text" name="username" class="form-control border-start-0 bg-light" placeholder="Masukkan username" value="{{ old('username') }}" required>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label small fw-bold">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                    <input type="password" name="password" class="form-control border-start-0 bg-light" placeholder="Masukkan password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success w-100 py-2 rounded-3 fw-bold mb-3">
                <i class="bi bi-box-arrow-in-right me-2"></i>Masuk ke Dashboard
            </button>
            <div class="text-center">
                <a href="{{ route('home') }}" class="text-muted small text-decoration-none">
                    <i class="bi bi-arrow-left me-1"></i>Kembali ke Website
                </a>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

