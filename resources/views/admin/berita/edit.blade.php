@extends('layouts.admin')
@section('title','Edit Berita')
@section('page-title','Edit Berita')
@section('content')
<div class="card rounded-3" style="max-width:800px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.berita.update',$berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul',$berita->judul) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Isi Berita</label>
                <textarea name="isi" class="form-control" rows="8" required>{{ old('isi',$berita->isi) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">Ganti Gambar</label>
                @if($berita->gambar)
                    <div class="mb-2"><img src="{{ $$berita->gambar }}" class="rounded-3" style="height:100px;object-fit:cover;"></div>
                @endif
                <input type="file" name="gambar" class="form-control" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti.</small>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success px-4 rounded-3">Simpan Perubahan</button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-light rounded-3">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
