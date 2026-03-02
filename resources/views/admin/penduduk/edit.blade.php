@extends('layouts.admin')
@section('title','Edit Penduduk')
@section('page-title','Edit Data Penduduk')
@section('content')
<div class="card rounded-3" style="max-width:700px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.penduduk.update',$penduduk->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">NIK</label>
                    <input type="text" name="nik" class="form-control" value="{{ old('nik',$penduduk->nik) }}" required maxlength="16">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama',$penduduk->nama) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select">
                        <option value="Laki-laki" {{ $penduduk->jenis_kelamin==='Laki-laki'?'selected':'' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $penduduk->jenis_kelamin==='Perempuan'?'selected':'' }}>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">RT</label>
                    <input type="text" name="rt" class="form-control" value="{{ old('rt',$penduduk->rt) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">RW</label>
                    <input type="text" name="rw" class="form-control" value="{{ old('rw',$penduduk->rw) }}" required>
                </div>
                <div class="col-12 mb-4">
                    <label class="form-label fw-semibold">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan',$penduduk->pekerjaan) }}">
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success px-4 rounded-3">Simpan Perubahan</button>
                <a href="{{ route('admin.penduduk.index') }}" class="btn btn-light rounded-3">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
