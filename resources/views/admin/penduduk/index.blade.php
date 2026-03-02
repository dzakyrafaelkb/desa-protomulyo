@extends('layouts.admin')
@section('title','Data Penduduk')
@section('page-title','Manajemen Data Penduduk')
@section('content')

{{-- Alert sukses --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="d-flex justify-content-end mb-4">
    <button class="btn btn-success rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-lg me-2"></i>Tambah Warga
    </button>
</div>
<div class="card rounded-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr><th>#</th><th>NIK</th><th>Nama</th><th>L/P</th><th>RT/RW</th><th>Pekerjaan</th><th class="text-center">Aksi</th></tr>
                </thead>
                <tbody>
                    @forelse($penduduk as $i => $p)
                    <tr>
                        <td><small class="text-muted">{{ $penduduk->firstItem()+$i }}</small></td>
                        <td><code class="fw-bold">{{ $p->nik }}</code></td>
                        <td class="fw-semibold">{{ $p->nama }}</td>
                        <td>
                            @if($p->jenis_kelamin==='Laki-laki') <span class="badge bg-primary rounded-pill">L</span>
                            @else <span class="badge bg-danger rounded-pill">P</span>
                            @endif
                        </td>
                        <td>{{ $p->rt }}/{{ $p->rw }}</td>
                        <td>{{ $p->pekerjaan ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.penduduk.edit',$p->id) }}" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                            <form id="del-{{ $p->id }}" action="{{ route('admin.penduduk.destroy',$p->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="button" onclick="confirmDelete('del-{{ $p->id }}')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data penduduk.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <small class="text-muted">{{ $penduduk->total() }} total data</small>
            {{ $penduduk->links() }}
        </div>
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 rounded-4">
            <div class="modal-header bg-success text-white rounded-top-4">
                <h5 class="modal-title"><i class="bi bi-person-plus me-2"></i>Tambah Warga Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.penduduk.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    {{-- Tampilkan error validasi --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">NIK <span class="text-danger">*</span></label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                   placeholder="16 Digit NIK" value="{{ old('nik') }}" required maxlength="16">
                            @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                   value="{{ old('nama') }}" required>
                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin')=='Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin')=='Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">RT <span class="text-danger">*</span></label>
                            <input type="text" name="rt" class="form-control @error('rt') is-invalid @enderror"
                                   placeholder="001" value="{{ old('rt') }}" required>
                            @error('rt')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">RW <span class="text-danger">*</span></label>
                            <input type="text" name="rw" class="form-control @error('rw') is-invalid @enderror"
                                   placeholder="001" value="{{ old('rw') }}" required>
                            @error('rw')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control"
                                   placeholder="Petani, Wiraswasta, dll" value="{{ old('pekerjaan') }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success px-4 rounded-3">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Buka modal otomatis jika ada error validasi --}}
@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modal = new bootstrap.Modal(document.getElementById('modalTambah'));
        modal.show();
    });
</script>
@endif

@endsection