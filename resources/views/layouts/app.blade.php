<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Protomulyo - Kab. Kendal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        h1,h2,h3,.navbar-brand { font-family: 'Poppins', sans-serif; font-weight: 700; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .marquee-wrap { overflow:hidden; white-space:nowrap; }
        .marquee-text { display:inline-block; padding-left:100%; animation:marquee 25s linear infinite; }
        .marquee-text:hover { animation-play-state:paused; }
        @keyframes marquee { 0%{transform:translate(0,0);} 100%{transform:translate(-100%,0);} }
        .nav-link { font-weight:500; color:#4b5563 !important; }
        .nav-link:hover,.nav-link.active { color:#10B981 !important; }
        .dropdown-menu { border-radius:12px; padding:.5rem; }
        .dropdown-item { border-radius:8px; padding:.6rem 1rem; transition:all .2s; }
        .dropdown-item:hover { background-color:#f0fdf4; color:#10B981; }
        .hover-card { transition:all .3s; }
        .hover-card:hover { transform:translateY(-8px); box-shadow:0 10px 30px rgba(0,0,0,.1) !important; }
    </style>
    @stack('styles')
</head>
<body>
<div class="bg-success text-white py-2 marquee-wrap" style="font-size:14px;">
    <div class="marquee-text">
        <span class="mx-4"><i class="bi bi-megaphone-fill me-2"></i><strong>INFO DESA:</strong> Penyaluran BLT Dana Desa tahap 1 pukul 08.00 WIB di Balai Desa.</span>
        <span class="mx-4"><i class="bi bi-info-circle-fill me-2"></i> Siapkan KTP dan KK asli untuk keperluan administrasi kependudukan.</span>
        <span class="mx-4"><i class="bi bi-info-circle-fill me-2"></i> Informasi posyandu akan dilakukan mulai pukul 06.00 WIB - 12.00 WIB di Balai desa. </span>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top py-3">
    <div class="container">
        <a class="navbar-brand text-success d-flex align-items-center" href="{{ route('home') }}">
            <div class="rounded-circle bg-success d-flex align-items-center justify-content-center me-3" style="width:40px;height:40px;">
                <i class="bi bi-buildings-fill text-white"></i>
            </div>
            <div class="d-flex flex-column justify-content-center border-start ps-3">
                <span class="d-block fw-bold lh-1 mb-1" style="font-size:1.1rem;">Desa Protomulyo</span>
                <small class="text-muted fw-semibold text-uppercase" style="font-size:10px;letter-spacing:1.5px;">Kabupaten Kendal</small>
            </div>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link px-3 {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3" href="#" data-bs-toggle="dropdown">Profil</a>
                    <ul class="dropdown-menu border-0 shadow-sm mt-2">
                        <li><a class="dropdown-item" href="{{ route('profil') }}">Visi Misi & Perangkat</a></li>
                        <li><a class="dropdown-item" href="{{ route('sejarah') }}">Sejarah Desa</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('galeri') }}"><i class="bi bi-images me-2 text-success"></i>Galeri Desa</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3" href="#" data-bs-toggle="dropdown">Layanan</a>
                    <ul class="dropdown-menu border-0 shadow-sm mt-2">
                        <li><a class="dropdown-item" href="{{ route('cek-nik') }}"><i class="bi bi-person-vcard me-2"></i>Cek NIK</a></li>
                        <li><a class="dropdown-item" href="{{ route('layanan') }}"><i class="bi bi-file-earmark-text me-2"></i>Unduh Formulir</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-success fw-bold" href="{{ route('pengaduan') }}"><i class="bi bi-chat-dots-fill me-2"></i>Pengaduan Warga</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link px-3 {{ request()->routeIs('berita*') ? 'active' : '' }}" href="{{ route('berita') }}">Berita</a></li>
                <li class="nav-item ms-lg-3"><a class="btn btn-outline-success rounded-pill px-4" href="{{ route('login') }}">Login Admin</a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer class="bg-dark text-white py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold text-success mb-3">Desa Protomulyo</h5>
                <p class="text-white-50 small">Kecamatan Kaliwungu Selatan, Kabupaten Kendal, Jawa Tengah.</p>
            </div>
            <div class="col-md-4 mb-4">
                <h6 class="fw-bold mb-3 text-white">Tautan Cepat</h6>
                <ul class="list-unstyled">
                    <li class="mb-1"><a href="{{ route('profil') }}" class="text-white-50 text-decoration-none small"><i class="bi bi-chevron-right me-1 text-success"></i>Profil Desa</a></li>
                    <li class="mb-1"><a href="{{ route('berita') }}" class="text-white-50 text-decoration-none small"><i class="bi bi-chevron-right me-1 text-success"></i>Berita</a></li>
                    <li class="mb-1"><a href="{{ route('layanan') }}" class="text-white-50 text-decoration-none small"><i class="bi bi-chevron-right me-1 text-success"></i>Layanan</a></li>
                    <li class="mb-1"><a href="{{ route('pengaduan') }}" class="text-white-50 text-decoration-none small"><i class="bi bi-chevron-right me-1 text-success"></i>Pengaduan</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h6 class="fw-bold mb-3 text-white">Kontak</h6>
                <p class="text-white-50 small"><i class="bi bi-geo-alt me-2 text-success"></i>Jl. Raya Protomulyo, Kaliwungu Selatan</p>
                <p class="text-white-50 small"><i class="bi bi-telephone me-2 text-success"></i>(0294) 123456</p>
                <p class="text-white-50 small"><i class="bi bi-envelope me-2 text-success"></i>desa@protomulyo.desa.id</p>
            </div>
        </div>
        <hr class="border-secondary">
        <p class="text-center text-white-50 small mb-0">© {{ date('Y') }} Desa Protomulyo. Dibuat dengan sepenuh hati</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>

