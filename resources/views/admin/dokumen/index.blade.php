@extends('layouts.admin')
@section('title','Dokumen')
@section('page-title','Manajemen Dokumen')
@section('content')
<div class="d-flex justify-content-end mb-4">
    <a href="{{ route('admin.dokumen.create') }}" class="btn btn-success rounded-pill px-4">
        <i class="bi bi-plus-lg me-2"></i>Upload Dokumen
    </a>
</div>
<div class="card rounded-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light"><tr><th>#</th><th>Nama</th><th>File</th><th>Tanggal</th><th class="text-center">Aksi</th></tr></thead>
                <tbody>
                    @forelse($dokumen as $i => $d)
                    <tr>
                        <td><small class="text-muted">{{ $dokumen->firstItem()+$i }}</small></td>
                        <td class="fw-semibold">{{ $d->nama }}</td>
                        <td><a href="{{ ${d->file} }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="bi bi-download me-1"></i>Download</a></td>
                        <td><small class="text-muted">{{ $d->created_at->isoFormat('D MMM Y') }}</small></td>
                        <td class="text-center">
                            <a href="{{ route('admin.dokumen.edit',$d->id) }}" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                            <form id="del-dk-{{ $d->id }}" action="{{ route('admin.dokumen.destroy',$d->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="button" onclick="confirmDelete('del-dk-{{ $d->id }}')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">Belum ada dokumen.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">{{ $dokumen->links() }}</div>
    </div>
</div>
@endsection
