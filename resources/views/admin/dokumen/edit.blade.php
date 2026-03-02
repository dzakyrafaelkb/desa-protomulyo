@extends('layouts.admin')
@section('title','Edit Dokumen')
@section('page-title','Edit Dokumen')
@section('content')
<div class="card rounded-3" style="max-width:600px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.dokumen.update',$dokumen->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Dokumen</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama',$dokumen->nama) }}" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">Ganti File</label>
                <div class="mb-2">
                    <a href="{{ Storage::url($dokumen->file) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="bi bi-file-earmark me-1"></i>File Saat Ini</a>
                </div>
                <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti.</small>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success px-4 rounded-3">Simpan</button>
                <a href="{{ route('admin.dokumen.index') }}" class="btn btn-light rounded-3">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
