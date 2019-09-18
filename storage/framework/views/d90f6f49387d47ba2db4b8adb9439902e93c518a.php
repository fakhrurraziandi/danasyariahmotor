<?php $__env->startSection('content'); ?>

    

    <div class="container" style="margin-top: 150px; margin-bottom: 150px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Pengajuan Kredit Motor')); ?></div>

                    <div class="card-body">
                        <div id="table-data-toolbar">
                            
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

            function number_format (number, decimals, dec_point, thousands_sep) {
                // Strip all characters but numerical ones.
                number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function (n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }

            $('#table-data').bootstrapTable({
                toolbar: "#table-data-toolbar",
                classes: 'table table-striped table-no-bordered',
                search: true,
                sortOrder: 'DESC',
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
                url: '<?php echo e(route('pengajuan_kredit_motor.json')); ?>',
                columns: [
                    
                    {
                        field: 'id',
                        title: 'Actions',
                        formatter: function(value, row, index){
                            return `
                                <a class="btn btn-sm btn-info" href="${base_url + '/pengajuan_kredit_motor/' + value }">Detail</a>
                            `;
                        }
                    },

                    {
                        field: 'id',
                        title: 'ID',
                    },
                    {
                        field: 'id',
                        title: 'Status',
                        formatter: function(value, row, index){
                            if(row.cs_kredit_motor_status == 'denied'){
                                return 'Denied';
                            }else if(row.cs_kredit_motor_status == 'approved'){
                                if(row.spv_kredit_motor_status == 'denied'){
                                    return 'Denied';
                                }else if(row.spv_kredit_motor_status == 'approved'){
                                    return 'Approved';
                                }else{
                                    return 'Pending'
                                }
                            }else{
                                return 'Pending'
                            }
                        }
                    },
                    {
                        field: 'angsuran_motor_detail',
                        title: 'Motor',
                        formatter: function(angsuran_motor_detail, row, index){
                            return angsuran_motor_detail.angsuran_motor.motor.name;
                        }
                    },

                    {
                        field: 'angsuran_motor_detail',
                        title: 'Motor',
                        formatter: function(angsuran_motor_detail, row, index){
                            return 'Rp. ' + number_format(angsuran_motor_detail.angsuran_motor.motor.harga, 0, ',', '.');
                        }
                    },
                    {
                        field: 'angsuran_motor_detail',
                        title: 'DP',
                        formatter: function(angsuran_motor_detail, row, index){
                            return 'Rp. ' + number_format(angsuran_motor_detail.angsuran_motor.dp, 0, ',', '.');
                        }
                    },

                    {
                        field: 'angsuran_motor_detail',
                        title: 'Discount DP',
                        formatter: function(angsuran_motor_detail, row, index){
                            return angsuran_motor_detail.angsuran_motor.discount_dp ? angsuran_motor_detail.angsuran_motor.discount_dp + '%' : '-';
                        }
                    },

                    {
                        field: 'angsuran_motor_detail',
                        title: 'DP Bayar',
                        formatter: function(angsuran_motor_detail, row, index){
                            return 'Rp. ' + number_format(angsuran_motor_detail.angsuran_motor.dp_calculated, 0, ',', '.');
                        }
                    },

                    {
                        field: 'angsuran_motor_detail',
                        title: 'Cicilan Per Bulan',
                        formatter: function(angsuran_motor_detail, row, index){
                            return 'Rp. ' + number_format(angsuran_motor_detail.angsuran_per_bulan, 0, ',', '.')  + ' x '+ angsuran_motor_detail.tempo_angsuran_motor.tempo + ' Bulan';
                        }
                    },
                    {
                        field: 'created_at',
                        title: 'Created at',
                    },
                ]
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/danasyariahmotor.com/resources/views/pengajuan_kredit_motor/index.blade.php */ ?>