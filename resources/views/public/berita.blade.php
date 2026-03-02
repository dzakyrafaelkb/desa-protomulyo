@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Berita & Kegiatan Desa</h2>
        <hr class="mx-auto" style="width:60px;height:3px;background:#10B981;">
    </div>
    <div class="row g-4">
        @forelse($berita as $b)
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-card">
                @if($b->gambar)
                    <img src="{{ $$b->gambar }}" class="card-img-top" style="height:200px;object-fit:cover;">
                @else
                    <div class="bg-success d-flex align-items-center justify-content-center" style="height:200px;">
                        <i class="bi bi-newspaper text-white" style="font-size:50px;"></i>
                    </div>
                @endif
                <div class="card-body">
                    <small class="text-success fw-bold">{{ $b->tanggal->isoFormat('D MMM Y') }}</small>
                    <h5 class="fw-bold mt-2">{{ $b->judul }}</h5>
                    <p class="text-muted small">{{ Str::limit(strip_tags($b->isi),100) }}</p>
                    <a href="{{ route('berita.detail',$b->id) }}" class="btn btn-link p-0 text-success fw-bold text-decoration-none">Baca Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted py-5">Belum ada berita.</div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center mt-5">{{ $berita->links() }}</div>
</div>
@endsection
