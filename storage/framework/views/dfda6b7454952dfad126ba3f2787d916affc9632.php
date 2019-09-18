<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Angsuran Motor <strong><?php echo e($motor->name); ?></strong>
                    </div>
                    <div class="card-body">

                        <dl class="row">
                            <dt class="col-sm-3 text-md-right">Name</dt>
                            <dd class="col-sm-9"><?php echo e($motor->name); ?></dd>

                            <dt class="col-sm-3 text-md-right">Pabrikan</dt>
                            <dd class="col-sm-9"><?php echo e($motor->pabrikan_motor->name); ?></dd>

                            <dt class="col-sm-3 text-md-right">Type</dt>
                            <dd class="col-sm-9"><?php echo e($motor->type_motor->name); ?></dd>

                            <dt class="col-sm-3 text-md-right">Jenis Transmisi</dt>
                            <dd class="col-sm-9"><?php echo e($motor->jenis_transmisi->name); ?></dd>

                            <dt class="col-sm-3 text-md-right">Kapasitas Mesin</dt>
                            <dd class="col-sm-9"><?php echo e($motor->kapasitas_mesin->cc . ' cc'); ?></dd>

                            <dt class="col-sm-3 text-md-right">Warna</dt>
                            <dd class="col-sm-9">
                                <?php if($motor->warna_motor): ?> 
                                    <?php $__currentLoopData = $motor->warna_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warna_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge badge-secondary"><?php echo e($warna_motor->name); ?></span> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </dd>

                            <dt class="col-sm-3 text-md-right">Harga</dt>
                            <dd class="col-sm-9"><?php echo e('Rp. '. $motor->harga); ?></dd>
                        </dl>

                        
                        <div id="table-data-toolbar">
                            <a href="<?php echo e(route('admin.motor.index')); ?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back to Motor</a>
                            <a href="<?php echo e(route('admin.spesifikasi_motor.create', $motor->id)); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                        </div>
                        <table id="table-data"></table>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function(){

            $('#table-data').bootstrapTable({
                toolbar: "#table-data-toolbar",
                classes: 'table table-striped table-no-bordered',
                search: true,
                showRefresh: true,
                iconsPrefix: 'fa',
                sortOrder: 'DESC',
                // showToggle: true,
                // showColumns: true,
                // showExport: true,
                // showPaginationSwitch: true,
                pagination: true,
                pageList: [10, 25, 50, 100, 'ALL'],
                // showFooter: false,
                sidePagination: 'server',
                url: '<?php echo e(route('admin.spesifikasi_motor.json', $motor->id)); ?>',
                columns: [
                    {
                        field: 'id',
                        title: 'Action',
                        class: 'text-nowrap',
                        formatter: function(value, row, index){
                            return `
                                <a class="btn btn-sm btn-info" href="${base_url + '/admin/spesifikasi_motor/' + value + '/edit'}"><i class="fa fa-edit"></i> Edit</a>
                                <form method="POST" action="${base_url + '/admin/spesifikasi_motor/' + value}" class="d-inline" onsubmit="return confirm('Are you sure you want to  delete  data ${row.id}?')">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('DELETE')); ?>

                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                            `;
                        }
                    },
                    {
                        field: 'id',
                        title: 'ID',
                    },
                    {
                        field: 'kategori_spesifikasi',
                        title: 'Kategori Spesifikasi',
                        formatter: function(kategori_spesifikasi, row, index){
                            if(kategori_spesifikasi){
                                return kategori_spesifikasi.name;
                            }
                        }
                    },
                    {
                        field: 'name',
                        title: 'Name',
                    },
                    {
                        field: 'value',
                        title: 'Value',
                    },
                    {
                        field: 'created_at',
                        title: 'Created at',
                    },
                    {
                        field: 'updated_at',
                        title: 'Updated at',
                    },
                ]
            });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/danasyariahmotor.com/resources/views/admin/spesifikasi_motor/index.blade.php */ ?>