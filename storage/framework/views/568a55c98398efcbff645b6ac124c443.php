<?php $__env->startSection('title','Dokumen'); ?>
<?php $__env->startSection('page-title','Manajemen Dokumen'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-end mb-4">
    <a href="<?php echo e(route('admin.dokumen.create')); ?>" class="btn btn-success rounded-pill px-4">
        <i class="bi bi-plus-lg me-2"></i>Upload Dokumen
    </a>
</div>
<div class="card rounded-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light"><tr><th>#</th><th>Nama</th><th>File</th><th>Tanggal</th><th class="text-center">Aksi</th></tr></thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><small class="text-muted"><?php echo e($dokumen->firstItem()+$i); ?></small></td>
                        <td class="fw-semibold"><?php echo e($d->nama); ?></td>
                        <td><a href="<?php echo e(Storage::url($d->file)); ?>" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="bi bi-download me-1"></i>Download</a></td>
                        <td><small class="text-muted"><?php echo e($d->created_at->isoFormat('D MMM Y')); ?></small></td>
                        <td class="text-center">
                            <a href="<?php echo e(route('admin.dokumen.edit',$d->id)); ?>" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                            <form id="del-dk-<?php echo e($d->id); ?>" action="<?php echo e(route('admin.dokumen.destroy',$d->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="button" onclick="confirmDelete('del-dk-<?php echo e($d->id); ?>')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" class="text-center text-muted py-4">Belum ada dokumen.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-3"><?php echo e($dokumen->links()); ?></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ZAKY\Documents\testing\resources\views/admin/dokumen/index.blade.php ENDPATH**/ ?>