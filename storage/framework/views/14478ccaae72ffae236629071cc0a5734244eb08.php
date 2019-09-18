<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Pengajuan Kredit Motor
                    </div>
                    <div class="card-body">
                        <div id="table-data-toolbar">
                            
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".export-pdf-modal"><i class="fa fa-file-pdf"></i> Export PDF</button>
                        </div>
                        <table id="table-data"></table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade export-pdf-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" method="GET" target="_blank" action="<?php echo e(route('admin.pengajuan_kredit_motor.export_pdf')); ?>">
                <div class="modal-header">
                    <h5 class="modal-title">Export PDF</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="from">From</label>
                        <input type="date" class="form-control" id="from" name="from" >
                    </div>

                    <div class="form-group">
                        <label for="to">To</label>
                        <input type="date" class="form-control" id="to" name="to" >
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-file-pdf"></i> Export</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
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
                // showToggle: true,
                // showColumns: true,
                // showExport: true,
                // showPaginationSwitch: true,
                pagination: true,
                pageList: [10, 25, 50, 100, 'ALL'],
                // showFooter: false,
                sidePagination: 'server',
                url: '<?php echo e(route('admin.pengajuan_kredit_motor.json')); ?>',
                columns: [
                    {
                        field: 'id',
                        title: 'Action',
                        class: 'text-nowrap',
                        formatter: function(value, row, index){
                            return `
                                <a class="btn btn-sm btn-info" href="${base_url + '/admin/pengajuan_kredit_motor/' + value}"><i class="fa fa-th"></i> Detail</a>
                                <a class="btn btn-sm btn-info" href="${base_url + '/admin/pengajuan_kredit_motor/' + value + '/edit'}"><i class="fa fa-edit"></i> Edit</a>
                                <form method="POST" action="${base_url + '/admin/pengajuan_kredit_motor/' + value}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete data ${row.id}?')">
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
                        field: 'user',
                        title: 'User',
                        formatter: function(user){
                            if(user){
                                return user.name;
                            }
                        }
                    },
                    {
                        field: 'wilayah_kredit_motor',
                        title: 'Wilayah',
                        formatter: function(wilayah_kredit_motor){
                            if(wilayah_kredit_motor){
                                return wilayah_kredit_motor.name;
                            }
                        }
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
<?php /* /home/fakhrurraziandi/Code/danasyariahmotor.com/resources/views/admin/pengajuan_kredit_motor/index.blade.php */ ?>