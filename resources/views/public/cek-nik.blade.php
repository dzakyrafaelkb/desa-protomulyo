@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Cek Status NIK</h2>
                <hr class="mx-auto" style="width:60px;height:3px;background:#10B981;">
            </div>
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <form action="{{ route('cek-nik.proses') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="nik" class="form-control form-control-lg @error('nik') is-invalid @enderror"
                                   placeholder="Masukkan 16 Digit NIK" maxlength="16" value="{{ old('nik') }}" required>
                            <button type="submit" class="btn btn-success px-4"><i class="bi bi-search me-2"></i>Cek</button>
                            @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </form>
                </div>
            </div>
            @if(isset($sudahCari))
                @if(isset($penduduk) && $penduduk)
                    <div class="card border-0 shadow-sm rounded-4 border-start border-success border-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-success d-flex align-items-center justify-content-center me-3" style="width:50px;height:50px;">
                                    <i class="bi bi-check-lg text-white fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold text-success mb-0">NIK Terdaftar</h5>
                                    <small class="text-muted">Data ditemukan dalam sistem</small>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6 mb-2"><small class="text-muted d-block">Nama</small><strong>{{ $penduduk->nama }}</strong></div>
                                <div class="col-6 mb-2"><small class="text-muted d-block">NIK</small><code>{{ $penduduk->nik }}</code></div>
                                <div class="col-6 mb-2"><small class="text-muted d-block">Jenis Kelamin</small><strong>{{ $penduduk->jenis_kelamin }}</strong></div>
                                <div class="col-6 mb-2"><small class="text-muted d-block">RT/RW</small><strong>{{ $penduduk->rt }}/{{ $penduduk->rw }}</strong></div>
                                <div class="col-6"><small class="text-muted d-block">Pekerjaan</small><strong>{{ $penduduk->pekerjaan ?? '-' }}</strong></div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card border-0 shadow-sm rounded-4 border-start border-danger border-4">
                        <div class="card-body p-4 d-flex align-items-center">
                            <div class="rounded-circle bg-danger d-flex align-items-center justify-content-center me-3" style="width:50px;height:50px;">
                                <i class="bi bi-x-lg text-white fs-4"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold text-danger mb-0">NIK Tidak Ditemukan</h5>
                                <small class="text-muted">Silakan hubungi kantor desa untuk informasi lebih lanjut.</small>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection

