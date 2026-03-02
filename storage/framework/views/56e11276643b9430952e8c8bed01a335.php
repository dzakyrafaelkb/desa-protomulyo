<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Berita & Kegiatan Desa</h2>
        <hr class="mx-auto" style="width:60px;height:3px;background:#10B981;">
    </div>
    <div class="row g-4">
        <?php $__empty_1 = true; $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-card">
                <?php if($b->gambar): ?>
                    <img src="<?php echo e(Storage::url($b->gambar)); ?>" class="card-img-top" style="height:200px;object-fit:cover;">
                <?php else: ?>
                    <div class="bg-success d-flex align-items-center justify-content-center" style="height:200px;">
                        <i class="bi bi-newspaper text-white" style="font-size:50px;"></i>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <small class="text-success fw-bold"><?php echo e($b->tanggal->isoFormat('D MMM Y')); ?></small>
                    <h5 class="fw-bold mt-2"><?php echo e($b->judul); ?></h5>
                    <p class="text-muted small"><?php echo e(Str::limit(strip_tags($b->isi),100)); ?></p>
                    <a href="<?php echo e(route('berita.detail',$b->id)); ?>" class="btn btn-link p-0 text-success fw-bold text-decoration-none">Baca Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12 text-center text-muted py-5">Belum ada berita.</div>
        <?php endif; ?>
    </div>
    <div class="d-flex justify-content-center mt-5"><?php echo e($berita->links()); ?></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ZAKY\Documents\testing\resources\views/public/berita.blade.php ENDPATH**/ ?>