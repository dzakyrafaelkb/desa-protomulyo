<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('page-title','Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card p-4 border-0 rounded-3" style="background:linear-gradient(135deg,#10B981,#059669);">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-white"><p class="mb-1 small opacity-75">Total Penduduk</p><h3 class="fw-bold mb-0"><?php echo e($stats['totalPenduduk']); ?></h3></div>
                <i class="bi bi-people text-white opacity-50" style="font-size:40px;"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-4 border-0 rounded-3" style="background:linear-gradient(135deg,#3b82f6,#2563eb);">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-white"><p class="mb-1 small opacity-75">Berita Desa</p><h3 class="fw-bold mb-0"><?php echo e($stats['totalBerita']); ?></h3></div>
                <i class="bi bi-newspaper text-white opacity-50" style="font-size:40px;"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-4 border-0 rounded-3" style="background:linear-gradient(135deg,#f59e0b,#d97706);">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-white"><p class="mb-1 small opacity-75">Pengaduan Pending</p><h3 class="fw-bold mb-0"><?php echo e($stats['pengaduanPending']); ?></h3></div>
                <i class="bi bi-chat-left-dots text-white opacity-50" style="font-size:40px;"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-4 border-0 rounded-3" style="background:linear-gradient(135deg,#8b5cf6,#7c3aed);">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-white"><p class="mb-1 small opacity-75">Total Galeri</p><h3 class="fw-bold mb-0"><?php echo e($stats['totalGaleri']); ?></h3></div>
                <i class="bi bi-images text-white opacity-50" style="font-size:40px;"></i>
            </div>
        </div>
    </div>
</div>
<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card p-4 rounded-3">
            <h6 class="fw-bold text-muted mb-3">Jenis Kelamin</h6>
            <canvas id="chartGender" style="max-height:220px;"></canvas>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-4 rounded-3">
            <h6 class="fw-bold text-muted mb-3">5 Pekerjaan Terbanyak</h6>
            <canvas id="chartPekerjaan" style="max-height:220px;"></canvas>
        </div>
    </div>
</div>
<div class="card rounded-3">
    <div class="card-body">
        <h6 class="fw-bold mb-3"><i class="bi bi-clock-history me-2 text-warning"></i>Pengaduan Terbaru</h6>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light"><tr><th>Nama</th><th>Pengaduan</th><th>Status</th><th>Tanggal</th></tr></thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $pengaduanTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="fw-semibold"><?php echo e($p->nama); ?></td>
                        <td><?php echo e(Str::limit($p->isi,70)); ?></td>
                        <td>
                            <?php if($p->status==='Pending'): ?> <span class="badge bg-danger rounded-pill">Pending</span>
                            <?php elseif($p->status==='Diproses'): ?> <span class="badge bg-warning rounded-pill">Diproses</span>
                            <?php else: ?> <span class="badge bg-success rounded-pill">Selesai</span>
                            <?php endif; ?>
                        </td>
                        <td><small class="text-muted"><?php echo e($p->created_at->diffForHumans()); ?></small></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="4" class="text-center text-muted py-3">Belum ada pengaduan.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <a href="<?php echo e(route('admin.pengaduan.index')); ?>" class="btn btn-sm btn-outline-success">Lihat Semua &rarr;</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('chartGender'),{
    type:'doughnut',
    data:{labels:['Laki-laki','Perempuan'],datasets:[{data:[<?php echo e($stats['totalLaki']); ?>,<?php echo e($stats['totalPerempuan']); ?>],backgroundColor:['#3b82f6','#ec4899'],borderWidth:0}]},
    options:{plugins:{legend:{position:'bottom'}},cutout:'65%'}
});
new Chart(document.getElementById('chartPekerjaan'),{
    type:'bar',
    data:{labels:<?php echo json_encode($pekerjaanData->pluck('pekerjaan')); ?>,datasets:[{data:<?php echo json_encode($pekerjaanData->pluck('jumlah')); ?>,backgroundColor:'#10B981',borderRadius:6}]},
    options:{indexAxis:'y',plugins:{legend:{display:false}},scales:{x:{grid:{display:false}}}}
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ZAKY\Documents\testing\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>