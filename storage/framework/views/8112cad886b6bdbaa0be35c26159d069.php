<?php $__env->startSection('title','Galeri'); ?>
<?php $__env->startSection('page-title','Kelola Galeri Desa'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-end mb-4">
    <button class="btn btn-success rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalUpload">
        <i class="bi bi-cloud-upload me-2"></i>Upload Foto
    </button>
</div>
<div class="row g-3">
    <?php $__empty_1 = true; $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="col-md-3 col-6">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <img src="<?php echo e(Storage::url($g->foto)); ?>" class="card-img-top" style="height:180px;object-fit:cover;">
            <div class="card-body p-2">
                <p class="small text-muted mb-2"><?php echo e($g->keterangan ?? 'Tanpa keterangan'); ?></p>
                <form id="del-gl-<?php echo e($g->id); ?>" action="<?php echo e(route('admin.galeri.destroy',$g->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button type="button" onclick="confirmDelete('del-gl-<?php echo e($g->id); ?>')" class="btn btn-sm btn-outline-danger w-100">
                        <i class="bi bi-trash me-1"></i>Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="col-12 text-center text-muted py-5">Belum ada foto.</div>
    <?php endif; ?>
</div>
<div class="mt-3"><?php echo e($galeri->links()); ?></div>

<div class="modal fade" id="modalUpload" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content border-0 rounded-4">
            <div class="modal-header bg-success text-white rounded-top-4">
                <h5 class="modal-title"><i class="bi bi-cloud-upload me-2"></i>Upload Foto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?php echo e(route('admin.galeri.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Foto <span class="text-danger">*</span></label>
                        <input type="file" name="foto" class="form-control" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Deskripsi foto">
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success px-4 rounded-3">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ZAKY\Documents\testing\resources\views/admin/galeri/index.blade.php ENDPATH**/ ?>