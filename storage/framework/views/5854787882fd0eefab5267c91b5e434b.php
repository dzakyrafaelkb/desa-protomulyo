<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Galeri Desa Protomulyo</h2>
        <hr class="mx-auto" style="width:60px;height:3px;background:#10B981;">
    </div>
    <div class="row g-3">
        <?php $__empty_1 = true; $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-4 col-6">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden hover-card">
                <img src="<?php echo e(Storage::url($g->foto)); ?>" class="w-100" style="height:220px;object-fit:cover;" alt="<?php echo e($g->keterangan ?? 'Galeri'); ?>">
                <?php if($g->keterangan): ?>
                    <div class="card-body p-2 text-center"><small class="text-muted"><?php echo e($g->keterangan); ?></small></div>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12 text-center text-muted py-5">Belum ada foto di galeri.</div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ZAKY\Documents\testing\resources\views/public/galeri.blade.php ENDPATH**/ ?>