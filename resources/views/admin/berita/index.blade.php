@extends('layouts.admin')
@section('title','Berita')
@section('page-title','Manajemen Berita Desa')
@section('content')
<div class="d-flex justify-content-end mb-4">
    <a href="{{ route('admin.berita.create') }}" class="btn btn-success rounded-pill px-4">
        <i class="bi bi-plus-lg me-2"></i>Tambah Berita
    </a>
</div>
<div class="card rounded-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light"><tr><th>#</th><th>Gambar</th><th>Judul</th><th>Tanggal</th><th class="text-center">Aksi</th></tr></thead>
                <tbody>
                    @forelse($berita as $i => $b)
                    <tr>
                        <td><small class="text-muted">{{ $berita->firstItem()+$i }}</small></td>
                        <td>
                            @if($b->gambar)
                                <img src="{{ $$b->gambar }}" class="rounded-2" style="width:70px;height:50px;object-fit:cover;">
                            @else
                                <div class="bg-light rounded-2 d-flex align-items-center justify-content-center" style="width:70px;height:50px;">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $b->judul }}</td>
                        <td><small class="text-muted">{{ $b->tanggal->isoFormat('D MMM Y') }}</small></td>
                        <td class="text-center">
                            <a href="{{ route('admin.berita.edit',$b->id) }}" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                            <form id="del-b-{{ $b->id }}" action="{{ route('admin.berita.destroy',$b->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="button" onclick="confirmDelete('del-b-{{ $b->id }}')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">Belum ada berita.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">{{ $berita->links() }}</div>
    </div>
</div>
@endsection
