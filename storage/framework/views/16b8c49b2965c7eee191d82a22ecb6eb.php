<?php $__env->startSection('title','Data Penduduk'); ?>
<?php $__env->startSection('page-title','Manajemen Data Penduduk'); ?>
<?php $__env->startSection('content'); ?>


<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i><?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-end mb-4">
    <button class="btn btn-success rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-lg me-2"></i>Tambah Warga
    </button>
</div>
<div class="card rounded-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr><th>#</th><th>NIK</th><th>Nama</th><th>L/P</th><th>RT/RW</th><th>Pekerjaan</th><th class="text-center">Aksi</th></tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $penduduk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><small class="text-muted"><?php echo e($penduduk->firstItem()+$i); ?></small></td>
                        <td><code class="fw-bold"><?php echo e($p->nik); ?></code></td>
                        <td class="fw-semibold"><?php echo e($p->nama); ?></td>
                        <td>
                            <?php if($p->jenis_kelamin==='Laki-laki'): ?> <span class="badge bg-primary rounded-pill">L</span>
                            <?php else: ?> <span class="badge bg-danger rounded-pill">P</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($p->rt); ?>/<?php echo e($p->rw); ?></td>
                        <td><?php echo e($p->pekerjaan ?? '-'); ?></td>
                        <td class="text-center">
                            <a href="<?php echo e(route('admin.penduduk.edit',$p->id)); ?>" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                            <form id="del-<?php echo e($p->id); ?>" action="<?php echo e(route('admin.penduduk.destroy',$p->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="button" onclick="confirmDelete('del-<?php echo e($p->id); ?>')" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data penduduk.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <small class="text-muted"><?php echo e($penduduk->total()); ?> total data</small>
            <?php echo e($penduduk->links()); ?>

        </div>
    </div>
</div>


<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 rounded-4">
            <div class="modal-header bg-success text-white rounded-top-4">
                <h5 class="modal-title"><i class="bi bi-person-plus me-2"></i>Tambah Warga Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?php echo e(route('admin.penduduk.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body p-4">
                    
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">NIK <span class="text-danger">*</span></label>
                            <input type="text" name="nik" class="form-control <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="16 Digit NIK" value="<?php echo e(old('nik')); ?>" required maxlength="16">
                            <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   value="<?php echo e(old('nama')); ?>" required>
                            <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" class="form-select <?php $__errorArgs = ['jenis_kelamin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki" <?php echo e(old('jenis_kelamin')=='Laki-laki' ? 'selected' : ''); ?>>Laki-laki</option>
                                <option value="Perempuan" <?php echo e(old('jenis_kelamin')=='Perempuan' ? 'selected' : ''); ?>>Perempuan</option>
                            </select>
                            <?php $__errorArgs = ['jenis_kelamin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">RT <span class="text-danger">*</span></label>
                            <input type="text" name="rt" class="form-control <?php $__errorArgs = ['rt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="001" value="<?php echo e(old('rt')); ?>" required>
                            <?php $__errorArgs = ['rt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">RW <span class="text-danger">*</span></label>
                            <input type="text" name="rw" class="form-control <?php $__errorArgs = ['rw'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="001" value="<?php echo e(old('rw')); ?>" required>
                            <?php $__errorArgs = ['rw'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control"
                                   placeholder="Petani, Wiraswasta, dll" value="<?php echo e(old('pekerjaan')); ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success px-4 rounded-3">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php if($errors->any()): ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modal = new bootstrap.Modal(document.getElementById('modalTambah'));
        modal.show();
    });
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ZAKY\Documents\testing\resources\views/admin/penduduk/index.blade.php ENDPATH**/ ?>