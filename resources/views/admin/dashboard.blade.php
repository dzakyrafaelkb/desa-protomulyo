@extends('layouts.admin')
@section('title','Dashboard')
@section('page-title','Dashboard')
@section('content')
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card p-4 border-0 rounded-3" style="background:linear-gradient(135deg,#10B981,#059669);">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-white"><p class="mb-1 small opacity-75">Total Penduduk</p><h3 class="fw-bold mb-0">{{ $stats['totalPenduduk'] }}</h3></div>
                <i class="bi bi-people text-white opacity-50" style="font-size:40px;"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-4 border-0 rounded-3" style="background:linear-gradient(135deg,#3b82f6,#2563eb);">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-white"><p class="mb-1 small opacity-75">Berita Desa</p><h3 class="fw-bold mb-0">{{ $stats['totalBerita'] }}</h3></div>
                <i class="bi bi-newspaper text-white opacity-50" style="font-size:40px;"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-4 border-0 rounded-3" style="background:linear-gradient(135deg,#f59e0b,#d97706);">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-white"><p class="mb-1 small opacity-75">Pengaduan Pending</p><h3 class="fw-bold mb-0">{{ $stats['pengaduanPending'] }}</h3></div>
                <i class="bi bi-chat-left-dots text-white opacity-50" style="font-size:40px;"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-4 border-0 rounded-3" style="background:linear-gradient(135deg,#8b5cf6,#7c3aed);">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-white"><p class="mb-1 small opacity-75">Total Galeri</p><h3 class="fw-bold mb-0">{{ $stats['totalGaleri'] }}</h3></div>
                <i class="bi bi-images text-white opacity-50" style="font-size:40px;"></i>
            </div>
        </div>
    </div>
</div>
<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card p-4 rounded-3">
            <h6 class="fw-bold text-muted mb-3">Jenis Kelamin</h6>
            <canvas id="chartGender" style="max-height:220px;"></canvas>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-4 rounded-3">
            <h6 class="fw-bold text-muted mb-3">5 Pekerjaan Terbanyak</h6>
            <canvas id="chartPekerjaan" style="max-height:220px;"></canvas>
        </div>
    </div>
</div>
<div class="card rounded-3">
    <div class="card-body">
        <h6 class="fw-bold mb-3"><i class="bi bi-clock-history me-2 text-warning"></i>Pengaduan Terbaru</h6>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light"><tr><th>Nama</th><th>Pengaduan</th><th>Status</th><th>Tanggal</th></tr></thead>
                <tbody>
                    @forelse($pengaduanTerbaru as $p)
                    <tr>
                        <td class="fw-semibold">{{ $p->nama }}</td>
                        <td>{{ Str::limit($p->isi,70) }}</td>
                        <td>
                            @if($p->status==='Pending') <span class="badge bg-danger rounded-pill">Pending</span>
                            @elseif($p->status==='Diproses') <span class="badge bg-warning rounded-pill">Diproses</span>
                            @else <span class="badge bg-success rounded-pill">Selesai</span>
                            @endif
                        </td>
                        <td><small class="text-muted">{{ $p->created_at->diffForHumans() }}</small></td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center text-muted py-3">Belum ada pengaduan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-sm btn-outline-success">Lihat Semua &rarr;</a>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('chartGender'),{
    type:'doughnut',
    data:{labels:['Laki-laki','Perempuan'],datasets:[{data:[{{ $stats['totalLaki'] }},{{ $stats['totalPerempuan'] }}],backgroundColor:['#3b82f6','#ec4899'],borderWidth:0}]},
    options:{plugins:{legend:{position:'bottom'}},cutout:'65%'}
});
new Chart(document.getElementById('chartPekerjaan'),{
    type:'bar',
    data:{labels:{!! json_encode($pekerjaanData->pluck('pekerjaan')) !!},datasets:[{data:{!! json_encode($pekerjaanData->pluck('jumlah')) !!},backgroundColor:'#10B981',borderRadius:6}]},
    options:{indexAxis:'y',plugins:{legend:{display:false}},scales:{x:{grid:{display:false}}}}
});
</script>
@endpush
