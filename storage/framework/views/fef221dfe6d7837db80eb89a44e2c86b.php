<?php $__env->startSection('title','Edit Penduduk'); ?>
<?php $__env->startSection('page-title','Edit Data Penduduk'); ?>
<?php $__env->startSection('content'); ?>
<div class="card rounded-3" style="max-width:700px;">
    <div class="card-body p-4">
        <form action="<?php echo e(route('admin.penduduk.update',$penduduk->id)); ?>" method="POST">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">NIK</label>
                    <input type="text" name="nik" class="form-control" value="<?php echo e(old('nik',$penduduk->nik)); ?>" required maxlength="16">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo e(old('nama',$penduduk->nama)); ?>" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select">
                        <option value="Laki-laki" <?php echo e($penduduk->jenis_kelamin==='Laki-laki'?'selected':''); ?>>Laki-laki</option>
                        <option value="Perempuan" <?php echo e($penduduk->jenis_kelamin==='Perempuan'?'selected':''); ?>>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">RT</label>
                    <input type="text" name="rt" class="form-control" value="<?php echo e(old('rt',$penduduk->rt)); ?>" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-semibold">RW</label>
                    <input type="text" name="rw" class="form-control" value="<?php echo e(old('rw',$penduduk->rw)); ?>" required>
                </div>
                <div class="col-12 mb-4">
                    <label class="form-label fw-semibold">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" value="<?php echo e(old('pekerjaan',$penduduk->pekerjaan)); ?>">
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success px-4 rounded-3">Simpan Perubahan</button>
                <a href="<?php echo e(route('admin.penduduk.index')); ?>" class="btn btn-light rounded-3">Batal</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ZAKY\Documents\testing\resources\views/admin/penduduk/edit.blade.php ENDPATH**/ ?>