<?php $__env->startSection('title','Upload Dokumen'); ?>
<?php $__env->startSection('page-title','Upload Dokumen Baru'); ?>
<?php $__env->startSection('content'); ?>
<div class="card rounded-3" style="max-width:600px;">
    <div class="card-body p-4">
        <form action="<?php echo e(route('admin.dokumen.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
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
                <a href="<?php echo e(route('admin.dokumen.index')); ?>" class="btn btn-light rounded-3">Batal</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ZAKY\Documents\testing\resources\views/admin/dokumen/create.blade.php ENDPATH**/ ?>