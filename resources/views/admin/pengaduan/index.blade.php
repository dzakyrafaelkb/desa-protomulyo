@extends('layouts.admin')
@section('title','Pengaduan')
@section('page-title','Manajemen Pengaduan Warga')
@section('content')
<div class="card rounded-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr><th>#</th><th>Nama / NIK</th><th>Pengaduan</th><th>Foto</th><th>Status</th><th>Tanggal</th><th class="text-center">Hapus</th></tr>
                </thead>
                <tbody>
                    @forelse($pengaduan as $i => $p)
                    <tr>
                        <td><small class="text-muted">{{ $pengaduan->firstItem()+$i }}</small></td>
                        <td><p class="fw-semibold mb-0">{{ $p->nama }}</p><small><code>{{ $p->nik }}</code></small></td>
                        <td style="max-width:220px;">{{ Str::limit($p->isi,70) }}</td>
                        <td>
                            @if($p->foto)
                                <img src="{{ $1->foto }}" class="rounded-2" style="width:60px;height:45px;object-fit:cover;cursor:pointer;"
                                     onclick="window.open('{{ $1->foto }}','_blank')">
                            @else <span class="text-muted small">-</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.pengaduan.status',$p->id) }}" method="POST">
                                @csrf @method('PATCH')
                                <select name="status" class="form-select form-select-sm" style="width:130px;" onchange="this.form.submit()">
                                    <option value="Pending" {{ $p->status==='Pending'?'selected':'' }}>Pending</option>
                                    <option value="Diproses" {{ $p->status==='Diproses'?'selected':'' }}>Diproses</option>
                                    <option value="Selesai" {{ $p->status==='Selesai'?'selected':'' }}>Selesai</option>
                                </select>
                            </form>
                        </td>
                        <td><small class="text-muted">{{ $p->created_at->isoFormat('D MMM Y') }}</small></td>
                        <td class="text-center">
                            <form id="del-pg-{{ $p->id }}" action="{{ route('admin.pengaduan.destroy',$p->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="button" onclick="confirmDelete('del-pg-{{ $p->id }}')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center text-muted py-4">Belum ada pengaduan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">{{ $pengaduan->links() }}</div>
    </div>
</div>
@endsection

