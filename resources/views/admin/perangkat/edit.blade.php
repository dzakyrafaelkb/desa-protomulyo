@extends('layouts.admin')
@section('title','Edit Perangkat')
@section('page-title','Edit Perangkat Desa')
@section('content')
<div class="card rounded-3" style="max-width:600px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.perangkat.update',$perangkat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama',$perangkat->nama) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan',$perangkat->jabatan) }}" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">Ganti Foto</label>
                @if($perangkat->foto)
                    <div class="mb-2"><img src="{{ $$perangkat->foto }}" class="rounded-circle" style="width:80px;height:80px;object-fit:cover;"></div>
                @endif
                <input type="file" name="foto" class="form-control" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti.</small>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success px-4 rounded-3">Simpan</button>
                <a href="{{ route('admin.perangkat.index') }}" class="btn btn-light rounded-3">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
