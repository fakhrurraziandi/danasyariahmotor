
<style>
    body{
        font-family: arial;
        font-size: 10px;
    }
</style>

<h2 style="text-align: center;">Report Pengajuan Kredit Motor <?php echo e(date('d-m-Y', strtotime(request()->get('from')))); ?> - <?php echo e(date('d-m-Y', strtotime(request()->get('to')))); ?></h2>

<table style="width: 100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Wilayah</th>
            <th>Motor</th>
            <th>DP</th>
            <th>Angsuran x Bulan</th>
            <th>CS Kredit Motor</th>
            <th>CS Kredit Motor Status</th>

            <th>SPV Kredit Motor</th>
            <th>SPV Kredit Motor Status</th>

            <th>Created at</th>
            <th>Updated at</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $pengajuan_kredit_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
        <tr>
            <td><?php echo e($p->id); ?></td>
            <td><?php echo e($p->user->name); ?></td>
            <td><?php echo e($p->wilayah_kredit_motor->name); ?></td>

            
            
            <td><?php echo e($p->angsuran_motor->motor->name); ?></td>

            
            <td><?php echo e('Rp. '. number_format($p->angsuran_motor->dp, 0, ',', '.')); ?></td>
            <td><?php echo e('Rp. '. number_format($p->angsuran_motor_detail->angsuran_per_bulan, 0, ',', '.') . ' x '. $p->angsuran_motor_detail->tempo_angsuran_motor->tempo . ' Bulan'); ?></td>

            
            <td><?php echo e($p->cs_pembiayaan_dana ? $p->cs_pembiayaan_dana->name : '-'); ?></td>
            <td><?php echo e($p->cs_pembiayaan_dana_status ? $p->cs_pembiayaan_dana_status : '-'); ?></td>
            <td><?php echo e($p->spv_pembiayaan_dana ? $p->spv_pembiayaan_dana->name : '-'); ?></td>
            <td><?php echo e($p->spv_pembiayaan_dana_status ? $p->spv_pembiayaan_dana_status : '-'); ?></td>

            <td><?php echo e($p->created_at); ?></td>
            <td><?php echo e($p->updated_at); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /* /home/fakhrurraziandi/Code/danasyariahmotor.com/resources/views/admin/pengajuan_kredit_motor/export_pdf.blade.php */ ?>