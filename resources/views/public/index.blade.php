@extends('layouts.app')
@section('content')
<section class="text-center py-5" style="background:linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.6)) center/cover fixed;background-color:#065f46;color:white;min-height:85vh;display:flex;align-items:center;">
    <div class="container py-5">
        <h1 class="display-3 mb-3 fw-bold">Selamat Datang di Desa Protomulyo</h1>
        <p class="lead mb-4 fs-4">Membangun Desa Digital yang Mandiri, Sejahtera, dan Berbudaya</p>
        <a href="#layanan" class="btn btn-success btn-lg rounded-pill px-5 shadow fw-bold">Layanan Online</a>
    </div>
</section>

<section class="py-3 bg-white border-bottom shadow-sm">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-2 mb-md-0">
                <h5 class="mb-0 fw-bold"><i class="bi bi-clock me-2 text-success"></i><span id="clock"></span> WIB</h5>
                <small class="text-muted">{{ now()->isoFormat('D MMMM Y') }} | Kaliwungu Selatan, Kendal</small>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="d-inline-flex align-items-center bg-light p-2 rounded-pill px-4">
                    <i class="bi bi-sun-fill text-warning fs-4 me-3"></i>
                    <div class="text-start">
                        <p class="mb-0 fw-bold small">Cerah Berawan</p>
                        <p class="mb-0 text-muted" style="font-size:11px;">Suhu: 31°C | Kelembapan: 70%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="layanan" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Layanan Desa</h2>
            <hr class="mx-auto" style="width:60px;height:3px;background:#10B981;">
        </div>
        <div class="row g-4 justify-content-center">
            @foreach([
                ['url'=>route('cek-nik'),'icon'=>'bi-person-vcard','color'=>'text-success','title'=>'Cek NIK','desc'=>'Cek status penduduk'],
                ['url'=>route('layanan'),'icon'=>'bi-file-earmark-text','color'=>'text-primary','title'=>'Formulir','desc'=>'Unduh surat desa'],
                ['url'=>route('berita'),'icon'=>'bi-megaphone','color'=>'text-warning','title'=>'Pengumuman','desc'=>'Info kegiatan desa'],
                ['url'=>route('profil'),'icon'=>'bi-geo-alt','color'=>'text-danger','title'=>'Profil Desa','desc'=>'Sejarah & Wilayah'],
                ['url'=>route('pengaduan'),'icon'=>'bi-chat-dots','color'=>'text-info','title'=>'Pengaduan','desc'=>'Sampaikan aspirasi'],
                ['url'=>route('galeri'),'icon'=>'bi-images','color'=>'text-success','title'=>'Galeri','desc'=>'Dokumentasi desa'],
            ] as $l)
            <div class="col-md-2 col-6 text-center">
                <a href="{{ $l['url'] }}" class="text-decoration-none text-dark">
                    <div class="card border-0 shadow-sm p-4 rounded-4 hover-card">
                        <i class="bi {{ $l['icon'] }} {{ $l['color'] }} display-5 mb-3"></i>
                        <h6 class="fw-bold">{{ $l['title'] }}</h6>
                        <small class="text-muted">{{ $l['desc'] }}</small>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Statistik Kependudukan</h2>
            <hr class="mx-auto" style="width:60px;height:3px;background:#10B981;">
        </div>
        <div class="row text-center mb-4">
            <div class="col-md-4 mb-3">
                <div class="card p-4 border-0 shadow-sm rounded-4 bg-success text-white">
                    <i class="bi bi-people fs-1 mb-2"></i>
                    <h3 class="fw-bold mb-0">{{ $totalWarga }}</h3>
                    <p class="mb-0 small opacity-75">Total Penduduk</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card p-4 border-0 shadow-sm rounded-4 border-bottom border-primary border-4">
                    <i class="bi bi-gender-male text-primary fs-1 mb-2"></i>
                    <h3 class="text-primary fw-bold mb-0">{{ $totalLaki }}</h3>
                    <p class="text-muted mb-0 small">Laki-laki</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card p-4 border-0 shadow-sm rounded-4 border-bottom border-danger border-4">
                    <i class="bi bi-gender-female text-danger fs-1 mb-2"></i>
                    <h3 class="text-danger fw-bold mb-0">{{ $totalPerempuan }}</h3>
                    <p class="text-muted mb-0 small">Perempuan</p>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-4 rounded-4">
                    <h6 class="fw-bold mb-3 text-center text-muted">Perbandingan Jenis Kelamin</h6>
                    <canvas id="chartGender" style="max-height:250px;"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-4 rounded-4">
                    <h6 class="fw-bold mb-3 text-center text-muted">5 Pekerjaan Terbanyak</h6>
                    <canvas id="chartPekerjaan" style="max-height:250px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Berita & Kegiatan Desa</h2>
            <hr class="mx-auto" style="width:60px;height:3px;background:#10B981;">
        </div>
        <div class="row">
            @forelse($beritaTerbaru as $b)
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-card">
                    @if($b->gambar)
                        <img src="{{ $1->gambar }}" class="card-img-top" style="height:200px;object-fit:cover;">
                    @else
                        <div class="bg-success d-flex align-items-center justify-content-center" style="height:200px;">
                            <i class="bi bi-newspaper text-white" style="font-size:50px;"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <small class="text-success fw-bold">{{ $b->tanggal->isoFormat('D MMM Y') }}</small>
                        <h5 class="fw-bold mt-2">{{ $b->judul }}</h5>
                        <p class="text-muted small">{{ Str::limit(strip_tags($b->isi),100) }}</p>
                        <a href="{{ route('berita.detail',$b->id) }}" class="btn btn-link p-0 text-decoration-none text-success fw-bold">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">Belum ada berita.</div>
            @endforelse
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('berita') }}" class="btn btn-outline-success rounded-pill px-4">Lihat Semua Berita</a>
        </div>
    </div>
</section>

@if($kades)
<section class="py-5 bg-white">
    <div class="container text-center">
        <h2 class="fw-bold mb-2">Perangkat Desa</h2>
        <p class="text-muted mb-4">Kenali lebih dekat perangkat Desa Protomulyo.</p>
        <div class="row justify-content-center">
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm p-3 rounded-4 border-top border-success border-4">
                    <div class="mx-auto mb-3 overflow-hidden rounded-circle shadow-sm" style="width:130px;height:130px;">
                        @if($kades->foto)
                            <img src="{{ $1->foto }}" class="w-100 h-100" style="object-fit:cover;">
                        @else
                            <div class="w-100 h-100 bg-success d-flex align-items-center justify-content-center">
                                <i class="bi bi-person-fill text-white" style="font-size:50px;"></i>
                            </div>
                        @endif
                    </div>
                    <h6 class="fw-bold mb-1">{{ $kades->nama }}</h6>
                    <p class="text-success small fw-bold mb-0">{{ $kades->jabatan }}</p>
                </div>
            </div>
        </div>
        <a href="{{ route('profil') }}" class="btn btn-outline-success rounded-pill px-4">Lihat Semua Perangkat</a>
    </div>
</section>
@endif

<section class="py-5 bg-light">
    <div class="container text-center">
        <h3 class="fw-bold mb-4">Lokasi Desa Protomulyo</h3>
        <div class="rounded-4 overflow-hidden shadow-sm">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15841.04258296245!2d110.252329!3d-6.978508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e705f93532c5f11%3A0x5027a7636557160!2sProtomulyo%2C%20Kec.%20Kaliwungu%20Sel.%2C%20Kabupaten%20Kendal%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                width="100%" height="400" style="border:0;" allowfullscreen loading="lazy"></iframe>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
function updateClock(){
    const n=new Date();
    document.getElementById('clock').textContent=
        String(n.getHours()).padStart(2,'0')+':'+String(n.getMinutes()).padStart(2,'0')+':'+String(n.getSeconds()).padStart(2,'0');
}
setInterval(updateClock,1000); updateClock();
document.addEventListener('DOMContentLoaded',function(){
    new Chart(document.getElementById('chartGender'),{
        type:'pie',
        data:{labels:['Laki-laki','Perempuan'],datasets:[{data:[{{ $totalLaki }},{{ $totalPerempuan }}],backgroundColor:['#0d6efd','#dc3545']}]},
        options:{plugins:{legend:{position:'bottom'}}}
    });
    new Chart(document.getElementById('chartPekerjaan'),{
        type:'bar',
        data:{labels:{!! json_encode($pekerjaanData->pluck('pekerjaan')) !!},datasets:[{label:'Jumlah',data:{!! json_encode($pekerjaanData->pluck('jumlah')) !!},backgroundColor:'#198754'}]},
        options:{indexAxis:'y',plugins:{legend:{display:false}}}
    });
});
</script>
@endpush

