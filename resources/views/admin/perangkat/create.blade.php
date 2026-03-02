@extends('layouts.admin')
@section('title','Tambah Perangkat')
@section('page-title','Tambah Perangkat Desa')
@section('content')
<div class="card rounded-3" style="max-width:600px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.perangkat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" placeholder="Kepala Desa, Sekretaris, dll" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">Foto</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success px-4 rounded-3">Simpan</button>
                <a href="{{ route('admin.perangkat.index') }}" class="btn btn-light rounded-3">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
