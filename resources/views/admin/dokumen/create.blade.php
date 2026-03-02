@extends('layouts.admin')
@section('title','Upload Dokumen')
@section('page-title','Upload Dokumen Baru')
@section('content')
<div class="card rounded-3" style="max-width:600px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.dokumen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Dokumen</label>
                <input type="text" name="nama" class="form-control" placeholder="Formulir SKU, Surat Keterangan, dll" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">File <span class="text-danger">*</span></label>
                <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx" required>
                <small class="text-muted">PDF, DOC, DOCX. Maks. 5MB.</small>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success px-4 rounded-3">Upload</button>
                <a href="{{ route('admin.dokumen.index') }}" class="btn btn-light rounded-3">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

