<?php $__env->startSection('title','Berita'); ?>
<?php $__env->startSection('page-title','Manajemen Berita Desa'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-end mb-4">
    <a href="<?php echo e(route('admin.berita.create')); ?>" class="btn btn-success rounded-pill px-4">
        <i class="bi bi-plus-lg me-2"></i>Tambah Berita
    </a>
</div>
<div class="card rounded-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light"><tr><th>#</th><th>Gambar</th><th>Judul</th><th>Tanggal</th><th class="text-center">Aksi</th></tr></thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><small class="text-muted"><?php echo e($berita->firstItem()+$i); ?></small></td>
                        <td>
                            <?php if($b->gambar): ?>
                                <img src="<?php echo e(Storage::url($b->gambar)); ?>" class="rounded-2" style="width:70px;height:50px;object-fit:cover;">
                            <?php else: ?>
                                <div class="bg-light rounded-2 d-flex align-items-center justify-content-center" style="width:70px;height:50px;">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="fw-semibold"><?php echo e($b->judul); ?></td>
                        <td><small class="text-muted"><?php echo e($b->tanggal->isoFormat('D MMM Y')); ?></small></td>
                        <td class="text-center">
                            <a href="<?php echo e(route('admin.berita.edit',$b->id)); ?>" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                            <form id="del-b-<?php echo e($b->id); ?>" action="<?php echo e(route('admin.berita.destroy',$b->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="button" onclick="confirmDelete('del-b-<?php echo e($b->id); ?>')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" class="text-center text-muted py-4">Belum ada berita.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-3"><?php echo e($berita->links()); ?></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ZAKY\Documents\testing\resources\views/admin/berita/index.blade.php ENDPATH**/ ?>