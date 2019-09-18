
<style>
    body{
        font-family: arial;
        font-size: 10px;
    }
</style>

<h2 style="text-align: center;">Report Pengajuan Pembiayaan Dana <?php echo e(date('d-m-Y', strtotime(request()->get('from')))); ?> - <?php echo e(date('d-m-Y', strtotime(request()->get('to')))); ?></h2>

<table style="width: 100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Wilayah</th>
            <th>Tempo</th>
            <th>CS Pembiayaan Dana</th>
            <th>CS Pembiayaan Dana Status</th>

            <th>SPV Pembiayaan Dana</th>
            <th>SPV Pembiayaan Dana Status</th>

            <th>Manager Pembiayaan Dana</th>

            <th>Plafond pembiayaan yang disetujui</th>
            <th>Tempo angsuran yang disetujui</th>
            <th>Angsuran</th>

            <th>Created at</th>
            <th>Updated at</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $pengajuan_pembiayaan_dana; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
        <tr>
            <td><?php echo e($p->id); ?></td>
            <td><?php echo e($p->user->name); ?></td>
            <td><?php echo e($p->wilayah_pembiayaan_dana->name); ?></td>
            <td><?php echo e($p->tempo_angsuran_pembiayaan_dana->tempo . ' bulan'); ?></td>
            <td><?php echo e($p->cs_pembiayaan_dana ? $p->cs_pembiayaan_dana->name : '-'); ?></td>
            <td><?php echo e($p->cs_pembiayaan_dana_status ? $p->cs_pembiayaan_dana_status : '-'); ?></td>
            <td><?php echo e($p->spv_pembiayaan_dana ? $p->spv_pembiayaan_dana->name : '-'); ?></td>
            <td><?php echo e($p->spv_pembiayaan_dana_status ? $p->spv_pembiayaan_dana_status : '-'); ?></td>
            <td><?php echo e($p->manager_pembiayaan_dana ? $p->manager_pembiayaan_dana->name : '-'); ?></td>

            <td><?php echo e($p->plafond_pembiayaan_disetujui ? $p->plafond_pembiayaan_disetujui : '-'); ?></td>
            <td><?php echo e($p->tempo_angsuran_pembiayaan_dana_disetujui ?  $p->tempo_angsuran_pembiayaan_dana_disetujui->tempo . ' bulan' : '-'); ?></td>
            <td><?php echo e($p->angsuran ? $p->angsuran : '-'); ?></td>

            <td><?php echo e($p->created_at); ?></td>
            <td><?php echo e($p->updated_at); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /* /home/fakhrurraziandi/Code/danasyariahmotor.com/resources/views/admin/pengajuan_pembiayaan_dana/export_pdf.blade.php */ ?>