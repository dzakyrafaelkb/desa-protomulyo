<?php $__env->startSection('title','Pengaduan'); ?>
<?php $__env->startSection('page-title','Manajemen Pengaduan Warga'); ?>
<?php $__env->startSection('content'); ?>
<div class="card rounded-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr><th>#</th><th>Nama / NIK</th><th>Pengaduan</th><th>Foto</th><th>Status</th><th>Tanggal</th><th class="text-center">Hapus</th></tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $pengaduan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><small class="text-muted"><?php echo e($pengaduan->firstItem()+$i); ?></small></td>
                        <td><p class="fw-semibold mb-0"><?php echo e($p->nama); ?></p><small><code><?php echo e($p->nik); ?></code></small></td>
                        <td style="max-width:220px;"><?php echo e(Str::limit($p->isi,70)); ?></td>
                        <td>
                            <?php if($p->foto): ?>
                                <img src="<?php echo e(Storage::url($p->foto)); ?>" class="rounded-2" style="width:60px;height:45px;object-fit:cover;cursor:pointer;"
                                     onclick="window.open('<?php echo e(Storage::url($p->foto)); ?>','_blank')">
                            <?php else: ?> <span class="text-muted small">-</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <form action="<?php echo e(route('admin.pengaduan.status',$p->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                <select name="status" class="form-select form-select-sm" style="width:130px;" onchange="this.form.submit()">
                                    <option value="Pending" <?php echo e($p->status==='Pending'?'selected':''); ?>>Pending</option>
                                    <option value="Diproses" <?php echo e($p->status==='Diproses'?'selected':''); ?>>Diproses</option>
                                    <option value="Selesai" <?php echo e($p->status==='Selesai'?'selected':''); ?>>Selesai</option>
                                </select>
                            </form>
                        </td>
                        <td><small class="text-muted"><?php echo e($p->created_at->isoFormat('D MMM Y')); ?></small></td>
                        <td class="text-center">
                            <form id="del-pg-<?php echo e($p->id); ?>" action="<?php echo e(route('admin.pengaduan.destroy',$p->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="button" onclick="confirmDelete('del-pg-<?php echo e($p->id); ?>')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="7" class="text-center text-muted py-4">Belum ada pengaduan.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-3"><?php echo e($pengaduan->links()); ?></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ZAKY\Documents\testing\resources\views/admin/pengaduan/index.blade.php ENDPATH**/ ?>