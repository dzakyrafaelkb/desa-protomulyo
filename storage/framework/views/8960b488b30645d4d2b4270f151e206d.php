<?php $__env->startSection('title','Tambah Perangkat'); ?>
<?php $__env->startSection('page-title','Tambah Perangkat Desa'); ?>
<?php $__env->startSection('content'); ?>
<div class="card rounded-3" style="max-width:600px;">
    <div class="card-body p-4">
        <form action="<?php echo e(route('admin.perangkat.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="<?php echo e(old('nama')); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" placeholder="Kepala Desa, Sekretaris, dll" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">Foto</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success px-4 rounded-3">Simpan</button>
                <a href="<?php echo e(route('admin.perangkat.index')); ?>" class="btn btn-light rounded-3">Batal</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ZAKY\Documents\testing\resources\views/admin/perangkat/create.blade.php ENDPATH**/ ?>