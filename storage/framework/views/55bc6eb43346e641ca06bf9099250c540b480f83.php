<?php $__env->startSection('sub_content'); ?>

    

    <h1 class="mb-20">Pengajuan Kredit Motor</small></h1>
    <hr>

    <div id="table-data-toolbar">
        
    </div>
    <table id="table-data"></table>

        
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script>
        $(function(){

            function number_format(number, decimals, decPoint, thousandsSep) {
                decimals = Math.abs(decimals) || 0;
                number = parseFloat(number);

                if (!decPoint || !thousandsSep) {
                    decPoint = '.';
                    thousandsSep = ',';
                }

                var roundedNumber = Math.round(Math.abs(number) * ('1e' + decimals)) + '';
                var numbersString = decimals ? (roundedNumber.slice(0, decimals * -1) || 0) : roundedNumber;
                var decimalsString = decimals ? roundedNumber.slice(decimals * -1) : '';
                var formattedNumber = "";

                while (numbersString.length > 3) {
                    formattedNumber += thousandsSep + numbersString.slice(-3)
                    numbersString = numbersString.slice(0, -3);
                }

                if (decimals && decimalsString.length === 1) {
                    while (decimalsString.length < decimals) {
                        decimalsString = decimalsString + decimalsString;
                    }
                }

                return (number < 0 ? '-' : '') + numbersString + formattedNumber + (decimalsString ? (decPoint + decimalsString) : '');
            }


            $('#table-data').bootstrapTable({
                toolbar: "#table-data-toolbar",
                classes: 'table table-striped table-no-bordered ',
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
                url: '<?php echo e(route('spv_kredit_motor.json_pengajuan_kredit_motor')); ?>',
                columns: [
                    {
                        field: 'id',
                        title: 'Action',
                        class: 'text-nowrap',
                        formatter: function(value, row, index){
                            return `
                                <a class="btn btn-sm btn-info" href="${base_url + '/spv_kredit_motor/pengajuan_kredit_motor/' + value }">Detail</a>
                            `;
                        }
                    },
                    {
                        field: 'cs_kredit_motor_status',
                        title: 'CS Status',
                    },
                    {
                        field: 'spv_kredit_motor_status',
                        title: 'SPV Status',
                    },
                    {
                        field: 'user',
                        title: 'User',
                        formatter: function(user, row, index){
                            return user.name;
                        }
                    },
                    {
                        field: 'angsuran_motor',
                        title: 'Motor',
                        formatter: function(angsuran_motor, row, index){
                            return angsuran_motor.motor.name;
                        }
                    },
                    {
                        field: 'angsuran_motor',
                        title: 'Harga',
                        formatter: function(angsuran_motor, row, index){
                            return 'Rp. ' + number_format(angsuran_motor.motor.harga, 0, ',', '.');
                        }
                    },

                    {
                        field: 'angsuran_motor',
                        title: 'DP',
                        formatter: function(angsuran_motor, row, index){
                            return 'Rp. ' + number_format(angsuran_motor.dp, 0, ',', '.');
                        }
                    },

                    {
                        field: 'angsuran_motor_detail',
                        title: 'DP',
                        formatter: function(angsuran_motor_detail, row, index){
                            return 'Rp. ' + number_format(angsuran_motor_detail.angsuran_per_bulan, 0, ',', '.') + ' x ' + angsuran_motor_detail.tempo_angsuran_motor.tempo + ' bulan';
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
<?php echo $__env->make('spv_kredit_motor.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/dsm/resources/views/spv_kredit_motor/list_pengajuan_kredit_motor.blade.php */ ?>