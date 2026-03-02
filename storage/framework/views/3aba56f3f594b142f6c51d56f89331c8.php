<?php $__env->startSection('title','Edit Berita'); ?>
<?php $__env->startSection('page-title','Edit Berita'); ?>
<?php $__env->startSection('content'); ?>
<div class="card rounded-3" style="max-width:800px;">
    <div class="card-body p-4">
        <form action="<?php echo e(route('admin.berita.update',$berita->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
            <div class="mb-3">
                <label class="form-label fw-semibold">Judul</label>
                <input type="text" name="judul" class="form-control" value="<?php echo e(old('judul',$berita->judul)); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Isi Berita</label>
                <textarea name="isi" class="form-control" rows="8" required><?php echo e(old('isi',$berita->isi)); ?></textarea>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">Ganti Gambar</label>
                <?php if($berita->gambar): ?>
                    <div class="mb-2"><img src="<?php echo e(Storage::url($berita->gambar)); ?>" class="rounded-3" style="height:100px;object-fit:cover;"></div>
                <?php endif; ?>
                <input type="file" name="gambar" class="form-control" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti.</small>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success px-4 rounded-3">Simpan Perubahan</button>
                <a href="<?php echo e(route('admin.berita.index')); ?>" class="btn btn-light rounded-3">Batal</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ZAKY\Documents\testing\resources\views/admin/berita/edit.blade.php ENDPATH**/ ?>