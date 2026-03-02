<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>" class="text-success text-decoration-none">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('berita')); ?>" class="text-success text-decoration-none">Berita</a></li>
                    <li class="breadcrumb-item active"><?php echo e(Str::limit($berita->judul,40)); ?></li>
                </ol>
            </nav>
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <?php if($berita->gambar): ?>
                    <img src="<?php echo e(Storage::url($berita->gambar)); ?>" class="w-100" style="max-height:400px;object-fit:cover;">
                <?php endif; ?>
                <div class="card-body p-5">
                    <div class="mb-3">
                        <span class="badge bg-success rounded-pill px-3 py-2">Berita Desa</span>
                        <small class="text-muted ms-3"><i class="bi bi-calendar3 me-1"></i><?php echo e($berita->tanggal->isoFormat('D MMMM Y')); ?></small>
                    </div>
                    <h2 class="fw-bold mb-4"><?php echo e($berita->judul); ?></h2>
                    <div class="text-muted lh-lg" style="font-size:1.05rem;"><?php echo nl2br(e($berita->isi)); ?></div>
                </div>
            </div>
            <div class="mt-4">
                <a href="<?php echo e(route('berita')); ?>" class="btn btn-outline-success rounded-pill px-4">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Berita
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ZAKY\Documents\testing\resources\views/public/detail-berita.blade.php ENDPATH**/ ?>