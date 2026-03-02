@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Pengaduan Warga</h2>
                <p class="text-muted">Sampaikan aspirasi dan keluhan Anda kepada pemerintah desa.</p>
                <hr class="mx-auto" style="width:60px;height:3px;background:#10B981;">
            </div>
            @if(session('success'))
                <div class="alert alert-success rounded-3 d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-3 fs-5"></i>{{ session('success') }}
                </div>
            @endif
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <form action="{{ route('pengaduan.simpan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">NIK <span class="text-danger">*</span></label>
                                <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" maxlength="16" required>
                                @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-semibold">Isi Pengaduan <span class="text-danger">*</span></label>
                                <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" rows="5" required>{{ old('isi') }}</textarea>
                                @error('isi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label fw-semibold">Foto Bukti <small class="text-muted">(opsional)</small></label>
                                <input type="file" name="foto" class="form-control" accept="image/*">
                                <small class="text-muted">Format: JPG, PNG. Maks. 2MB.</small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success w-100 py-3 rounded-3 fw-bold">
                            <i class="bi bi-send me-2"></i>Kirim Pengaduan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
