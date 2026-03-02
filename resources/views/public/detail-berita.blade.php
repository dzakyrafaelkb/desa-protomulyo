@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-success text-decoration-none">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('berita') }}" class="text-success text-decoration-none">Berita</a></li>
                    <li class="breadcrumb-item active">{{ Str::limit($berita->judul,40) }}</li>
                </ol>
            </nav>
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                @if($berita->gambar)
                    <img src="{{ Storage::url($berita->gambar) }}" class="w-100" style="max-height:400px;object-fit:cover;">
                @endif
                <div class="card-body p-5">
                    <div class="mb-3">
                        <span class="badge bg-success rounded-pill px-3 py-2">Berita Desa</span>
                        <small class="text-muted ms-3"><i class="bi bi-calendar3 me-1"></i>{{ $berita->tanggal->isoFormat('D MMMM Y') }}</small>
                    </div>
                    <h2 class="fw-bold mb-4">{{ $berita->judul }}</h2>
                    <div class="text-muted lh-lg" style="font-size:1.05rem;">{!! nl2br(e($berita->isi)) !!}</div>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('berita') }}" class="btn btn-outline-success rounded-pill px-4">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Berita
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
