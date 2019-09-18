<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Angsuran Pembiayaan Dana <strong><?php echo e($motor_pembiayaan_dana->name); ?></strong>
                    </div>
                    <div class="card-body">

                        <dl class="row">
                            <dt class="col-sm-3 text-md-right">Name</dt>
                            <dd class="col-sm-9"><?php echo e($motor_pembiayaan_dana->name); ?></dd>

                            <dt class="col-sm-3 text-md-right">Pabrikan</dt>
                            <dd class="col-sm-9"><?php echo e($motor_pembiayaan_dana->pabrikan_motor->name); ?></dd>

                        </dl>

                        
                        <div id="table-data-toolbar">
                            <a href="<?php echo e(route('admin.motor.index')); ?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back to Motor</a>
                            <a href="<?php echo e(route('admin.angsuran_pembiayaan_dana.create', $motor_pembiayaan_dana->id)); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
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
                url: '<?php echo e(route('admin.angsuran_pembiayaan_dana.json', $motor_pembiayaan_dana->id)); ?>',
                columns: [
                    {
                        field: 'id',
                        title: 'Action',
                        class: 'text-nowrap',
                        formatter: function(value, row, index){
                            return `
                                <a class="btn btn-sm btn-info" href="${base_url + '/admin/angsuran_pembiayaan_dana/' + value + '/edit'}"><i class="fa fa-edit"></i> Edit</a>
                                <form method="POST" action="${base_url + '/admin/angsuran_pembiayaan_dana/' + value}" class="d-inline" onsubmit="return confirm('Are you sure you want to  delete   data ${row.dp}?')">
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
                        field: 'wilayah_pembiayaan_dana',
                        title: 'Wilayah',
                        formatter: function(wilayah_pembiayaan_dana){
                            if(wilayah_pembiayaan_dana){
                                return wilayah_pembiayaan_dana.name;
                            }
                        }
                    },
                    {
                        field: 'tahun',
                        title: 'Tahun',
                    },
                    {
                        field: 'status_stnk',
                        title: 'Status STNK',
                        formatter: function(status_stnk){
                            if(status_stnk){
                                return status_stnk.name;
                            }
                        }
                    },
                    {
                        field: 'status_bpkb',
                        title: 'Status BPKB',
                        formatter: function(status_stnk){
                            if(status_stnk){
                                return status_stnk.name;
                            }
                        }
                    },
                    {
                        field: 'pencairan',
                        title: 'Pencairan',
                        formatter: function(pencairan, row, index){
                            if(pencairan){
                                return 'Rp. '+ number_format(pencairan, 0, ',', '.');
                            }
                        }
                    },
                    
                    <?php $__currentLoopData = $list_tempo_angsuran_pembiayaan_dana; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tempo_angsuran_pembiayaan_dana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        {
                            field: '<?php echo e($tempo_angsuran_pembiayaan_dana->tempo); ?>',
                            title: '<?php echo e($tempo_angsuran_pembiayaan_dana->tempo); ?> bulan',
                            formatter: function(value, row, index){
                                if(value){
                                    return 'Rp. '+ number_format(value, 0, ',', '.');
                                }
                            }
                        },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php /* /home/fakhrurraziandi/Code/danasyariahmotor.com/resources/views/admin/angsuran_pembiayaan_dana/index.blade.php */ ?>