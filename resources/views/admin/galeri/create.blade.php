@extends('layouts.admin')
@section('title','Upload Galeri')
@section('page-title','Upload Foto Galeri')
@section('content')
<div class="card rounded-3" style="max-width:500px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Foto <span class="text-danger">*</span></label>
                <input type="file" name="foto" class="form-control" accept="image/*" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" placeholder="Deskripsi foto (opsional)">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success px-4 rounded-3">Upload</button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-light rounded-3">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

