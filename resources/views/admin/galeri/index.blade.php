@extends('layouts.admin')
@section('title','Galeri')
@section('page-title','Kelola Galeri Desa')
@section('content')
<div class="d-flex justify-content-end mb-4">
    <button class="btn btn-success rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalUpload">
        <i class="bi bi-cloud-upload me-2"></i>Upload Foto
    </button>
</div>
<div class="row g-3">
    @forelse($galeri as $g)
    <div class="col-md-3 col-6">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <img src="{{ $$g->foto }}" class="card-img-top" style="height:180px;object-fit:cover;">
            <div class="card-body p-2">
                <p class="small text-muted mb-2">{{ $g->keterangan ?? 'Tanpa keterangan' }}</p>
                <form id="del-gl-{{ $g->id }}" action="{{ route('admin.galeri.destroy',$g->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="button" onclick="confirmDelete('del-gl-{{ $g->id }}')" class="btn btn-sm btn-outline-danger w-100">
                        <i class="bi bi-trash me-1"></i>Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center text-muted py-5">Belum ada foto.</div>
    @endforelse
</div>
<div class="mt-3">{{ $galeri->links() }}</div>

<div class="modal fade" id="modalUpload" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content border-0 rounded-4">
            <div class="modal-header bg-success text-white rounded-top-4">
                <h5 class="modal-title"><i class="bi bi-cloud-upload me-2"></i>Upload Foto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Foto <span class="text-danger">*</span></label>
                        <input type="file" name="foto" class="form-control" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Deskripsi foto">
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success px-4 rounded-3">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
