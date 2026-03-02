@extends('layouts.admin')
@section('title','Perangkat Desa')
@section('page-title','Manajemen Perangkat Desa')
@section('content')
<div class="d-flex justify-content-end mb-4">
    <a href="{{ route('admin.perangkat.create') }}" class="btn btn-success rounded-pill px-4">
        <i class="bi bi-plus-lg me-2"></i>Tambah Perangkat
    </a>
</div>
<div class="row g-3">
    @forelse($perangkat as $p)
    <div class="col-md-3 col-6">
        <div class="card border-0 shadow-sm rounded-4 text-center p-3">
            <div class="mx-auto mb-3 overflow-hidden rounded-circle" style="width:100px;height:100px;">
                @if($p->foto)
                    <img src="{{ $$p->foto }}" class="w-100 h-100" style="object-fit:cover;">
                @else
                    <div class="w-100 h-100 bg-success d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-fill text-white" style="font-size:40px;"></i>
                    </div>
                @endif
            </div>
            <h6 class="fw-bold mb-1">{{ $p->nama }}</h6>
            <p class="text-success small fw-semibold mb-3">{{ $p->jabatan }}</p>
            <div class="d-flex gap-2 justify-content-center">
                <a href="{{ route('admin.perangkat.edit',$p->id) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                <form id="del-pr-{{ $p->id }}" action="{{ route('admin.perangkat.destroy',$p->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="button" onclick="confirmDelete('del-pr-{{ $p->id }}')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center text-muted py-5">Belum ada data perangkat desa.</div>
    @endforelse
</div>
<div class="mt-3">{{ $perangkat->links() }}</div>
@endsection
