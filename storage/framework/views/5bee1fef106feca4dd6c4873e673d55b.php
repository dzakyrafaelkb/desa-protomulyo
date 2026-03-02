<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Unduh Formulir Layanan</h2>
        <hr class="mx-auto" style="width:60px;height:3px;background:#10B981;">
    </div>
    <div class="row g-4 justify-content-center">
        <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 hover-card">
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-3 bg-success bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width:50px;height:50px;">
                        <i class="bi bi-file-earmark-text text-success fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0"><?php echo e($d->nama); ?></h6>
                        <small class="text-muted"><?php echo e($d->created_at->isoFormat('D MMM Y')); ?></small>
                    </div>
                </div>
                <a href="<?php echo e(Storage::url($d->file)); ?>" target="_blank" class="btn btn-outline-success rounded-3 w-100">
                    <i class="bi bi-download me-2"></i>Download
                </a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12 text-center text-muted py-5">Belum ada formulir tersedia.</div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ZAKY\Documents\testing\resources\views/public/layanan.blade.php ENDPATH**/ ?>