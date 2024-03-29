<?php $__env->startSection('sub_content'); ?>

    

    <h1 class="mb-20">Pengajuan Pembiayaan Dana</small></h1>
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
                url: '<?php echo e(route('cs_pembiayaan_dana.json_pengajuan_pembiayaan_dana')); ?>',
                columns: [
                    
                    {
                        field: 'id',
                        title: 'Action',
                        class: 'text-nowrap',
                        formatter: function(value, row, index){
                            return `
                                <a class="btn btn-sm btn-info" href="${base_url + '/cs_pembiayaan_dana/pengajuan_pembiayaan_dana/' + value }">Detail</a>
                            `;
                        }
                    },
                    {
                        field: 'cs_pembiayaan_dana_status',
                        title: 'CS Status',
                    },
                    {
                        field: 'spv_pembiayaan_dana',
                        title: 'Di Teruskan Kepada SPV',
                        formatter: function(value){
                            if(value){
                                return value.name;
                            }
                        }
                    },
                    {
                        field: 'spv_pembiayaan_dana_status',
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
                        field: 'wilayah_pembiayaan_dana',
                        title: 'Wilayah',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    },
                    {
                        field: 'tempo_angsuran_pembiayaan_dana',
                        title: 'Tempo',
                        formatter: function(value, row, index){
                            if(value){
                                return value.tempo + ' Bulan';
                            }
                        }
                    },
                    {
                        field: 'motor_pembiayaan_dana',
                        title: 'Motor',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    },

                    {
                        field: 'status_stnk',
                        title: 'Status STNK',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    },

                    {
                        field: 'status_bpkb',
                        title: 'Status BPKB',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    },
                    {
                        field: 'status_rumah',
                        title: 'Status Kepemilikan Rumah',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
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
<?php echo $__env->make('cs_pembiayaan_dana.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/danasyariahmotor/public_html/resources/views/cs_pembiayaan_dana/list_pengajuan_pembiayaan_dana.blade.php */ ?>