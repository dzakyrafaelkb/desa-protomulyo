<?php $__env->startSection('title','Perangkat Desa'); ?>
<?php $__env->startSection('page-title','Manajemen Perangkat Desa'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-end mb-4">
    <a href="<?php echo e(route('admin.perangkat.create')); ?>" class="btn btn-success rounded-pill px-4">
        <i class="bi bi-plus-lg me-2"></i>Tambah Perangkat
    </a>
</div>
<div class="row g-3">
    <?php $__empty_1 = true; $__currentLoopData = $perangkat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="col-md-3 col-6">
        <div class="card border-0 shadow-sm rounded-4 text-center p-3">
            <div class="mx-auto mb-3 overflow-hidden rounded-circle" style="width:100px;height:100px;">
                <?php if($p->foto): ?>
                    <img src="<?php echo e(Storage::url($p->foto)); ?>" class="w-100 h-100" style="object-fit:cover;">
                <?php else: ?>
                    <div class="w-100 h-100 bg-success d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-fill text-white" style="font-size:40px;"></i>
                    </div>
                <?php endif; ?>
            </div>
            <h6 class="fw-bold mb-1"><?php echo e($p->nama); ?></h6>
            <p class="text-success small fw-semibold mb-3"><?php echo e($p->jabatan); ?></p>
            <div class="d-flex gap-2 justify-content-center">
                <a href="<?php echo e(route('admin.perangkat.edit',$p->id)); ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                <form id="del-pr-<?php echo e($p->id); ?>" action="<?php echo e(route('admin.perangkat.destroy',$p->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button type="button" onclick="confirmDelete('del-pr-<?php echo e($p->id); ?>')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="col-12 text-center text-muted py-5">Belum ada data perangkat desa.</div>
    <?php endif; ?>
</div>
<div class="mt-3"><?php echo e($perangkat->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ZAKY\Documents\testing\resources\views/admin/perangkat/index.blade.php ENDPATH**/ ?>