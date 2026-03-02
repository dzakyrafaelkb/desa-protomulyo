<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Admin') - Desa Protomulyo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .sidebar{min-height:100vh;background:#1e293b;color:white;width:240px;position:fixed;top:0;left:0;overflow-y:auto;z-index:100;}
        .sidebar .brand{padding:20px;text-align:center;border-bottom:1px solid #334155;}
        .sidebar a{color:#cbd5e1;text-decoration:none;padding:12px 20px;display:flex;align-items:center;transition:all .2s;font-size:14px;}
        .sidebar a:hover,.sidebar a.active{background:#334155;color:#10B981;border-left:4px solid #10B981;padding-left:16px;}
        .nav-section{padding:8px 20px 4px;font-size:10px;text-transform:uppercase;letter-spacing:1px;color:#64748b;margin-top:8px;}
        .main-content{margin-left:240px;background:#f1f5f9;min-height:100vh;padding:25px;}
        .topbar{background:white;border-radius:12px;padding:15px 25px;margin-bottom:25px;box-shadow:0 1px 3px rgba(0,0,0,.05);display:flex;justify-content:space-between;align-items:center;}
        .card{border:none;border-radius:12px;box-shadow:0 1px 3px rgba(0,0,0,.06);}
    </style>
    @stack('styles')
</head>
<body>
<div class="sidebar">
    <div class="brand">
        <h6 class="fw-bold text-success mb-0">PROTOMULYO</h6>
        <small class="text-muted" style="font-size:11px;">Panel Administrator</small>
    </div>
    <div class="nav-section">Menu Utama</div>
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i>Dashboard
    </a>
    <div class="nav-section">Kependudukan</div>
    <a href="{{ route('admin.penduduk.index') }}" class="{{ request()->routeIs('admin.penduduk*') ? 'active' : '' }}">
        <i class="bi bi-people me-2"></i>Data Penduduk
    </a>
    <a href="{{ route('admin.pengaduan.index') }}" class="{{ request()->routeIs('admin.pengaduan*') ? 'active' : '' }} d-flex justify-content-between">
        <span><i class="bi bi-chat-left-text me-2 text-warning"></i>Pengaduan</span>
        @php $pendingCount = \App\Models\Pengaduan::where('status','Pending')->count(); @endphp
        @if($pendingCount > 0)
            <span class="badge bg-danger rounded-pill" style="font-size:10px;">{{ $pendingCount }}</span>
        @endif
    </a>
    <div class="nav-section">Konten</div>
    <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
        <i class="bi bi-newspaper me-2"></i>Berita Desa
    </a>
    <a href="{{ route('admin.perangkat.index') }}" class="{{ request()->routeIs('admin.perangkat*') ? 'active' : '' }}">
        <i class="bi bi-person-badge me-2"></i>Perangkat Desa
    </a>
    <a href="{{ route('admin.dokumen.index') }}" class="{{ request()->routeIs('admin.dokumen*') ? 'active' : '' }}">
        <i class="bi bi-file-earmark-arrow-down me-2"></i>Dokumen
    </a>
    <a href="{{ route('admin.galeri.index') }}" class="{{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">
        <i class="bi bi-images me-2"></i>Galeri
    </a>
    <div class="nav-section mt-2"></div>
    <a href="{{ route('home') }}" target="_blank"><i class="bi bi-globe me-2"></i>Lihat Website</a>
    <form method="POST" action="{{ route('logout') }}" class="m-0">
        @csrf
        <button type="submit" class="w-100 text-start" style="background:none;border:none;color:#ef4444;padding:12px 20px;cursor:pointer;font-size:14px;">
            <i class="bi bi-box-arrow-right me-2"></i>Keluar
        </button>
    </form>
</div>

<div class="main-content">
    <div class="topbar">
        <h5 class="fw-bold mb-0">@yield('page-title','Dashboard')</h5>
        <div class="d-flex align-items-center gap-3">
            <small class="text-muted">{{ now()->isoFormat('D MMMM Y') }}</small>
            <div class="d-flex align-items-center gap-2">
                <div class="rounded-circle bg-success d-flex align-items-center justify-content-center text-white" style="width:36px;height:36px;">
                    <i class="bi bi-person" style="font-size:14px;"></i>
                </div>
                <span class="fw-semibold" style="font-size:14px;">{{ session('admin')['nama_lengkap'] ?? 'Admin' }}</span>
            </div>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show rounded-3">
            <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function confirmDelete(formId) {
    Swal.fire({title:'Apakah anda yakin?',text:'Data akan dihapus permanen!',icon:'warning',
        showCancelButton:true,confirmButtonColor:'#d33',confirmButtonText:'Ya, Hapus!',cancelButtonText:'Batal'
    }).then(r => { if(r.isConfirmed) document.getElementById(formId).submit(); });
}
</script>
@stack('scripts')
</body>
</html>
