@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Unduh Formulir Layanan</h2>
        <hr class="mx-auto" style="width:60px;height:3px;background:#10B981;">
    </div>
    <div class="row g-4 justify-content-center">
        @forelse($dokumen as $d)
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 hover-card">
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-3 bg-success bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width:50px;height:50px;">
                        <i class="bi bi-file-earmark-text text-success fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">{{ $d->nama }}</h6>
                        <small class="text-muted">{{ $d->created_at->isoFormat('D MMM Y') }}</small>
                    </div>
                </div>
                <a href="{{ $$d->file }}" target="_blank" class="btn btn-outline-success rounded-3 w-100">
                    <i class="bi bi-download me-2"></i>Download
                </a>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted py-5">Belum ada formulir tersedia.</div>
        @endforelse
    </div>
</div>
@endsection
