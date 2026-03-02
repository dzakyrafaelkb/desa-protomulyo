@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Galeri Desa Protomulyo</h2>
        <hr class="mx-auto" style="width:60px;height:3px;background:#10B981;">
    </div>
    <div class="row g-3">
        @forelse($galeri as $g)
        <div class="col-md-4 col-6">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden hover-card">
                <img src="{{ ${g->foto} }}" class="w-100" style="height:220px;object-fit:cover;" alt="{{ $g->keterangan ?? 'Galeri' }}">
                @if($g->keterangan)
                    <div class="card-body p-2 text-center"><small class="text-muted">{{ $g->keterangan }}</small></div>
                @endif
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted py-5">Belum ada foto di galeri.</div>
        @endforelse
    </div>
</div>
@endsection
