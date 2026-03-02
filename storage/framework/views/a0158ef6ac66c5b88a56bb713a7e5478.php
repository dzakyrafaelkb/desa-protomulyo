<?php $__env->startSection('title','Tambah Berita'); ?>
<?php $__env->startSection('page-title','Tambah Berita Baru'); ?>
<?php $__env->startSection('content'); ?>
<div class="card rounded-3" style="max-width:800px;">
    <div class="card-body p-4">
        <form action="<?php echo e(route('admin.berita.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label class="form-label fw-semibold">Judul Berita</label>
                <input type="text" name="judul" class="form-control" value="<?php echo e(old('judul')); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Isi Berita</label>
                <textarea name="isi" class="form-control" rows="8" required><?php echo e(old('isi')); ?></textarea>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">Gambar</label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
                <small class="text-muted">JPG, PNG. Maks. 2MB.</small>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success px-4 rounded-3">Simpan</button>
                <a href="<?php echo e(route('admin.berita.index')); ?>" class="btn btn-light rounded-3">Batal</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ZAKY\Documents\testing\resources\views/admin/berita/create.blade.php ENDPATH**/ ?>