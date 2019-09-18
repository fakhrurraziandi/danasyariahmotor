
@extends('dashboard_user.main')

@section('sub_content')

<?php $user = auth()->user(); ?>
    

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            
            <h2>Pengajuan Pembiayaan Dana Customer Anda</h2>
            <hr>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">Pending</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="denied-tab" data-toggle="tab" href="#denied" role="tab" aria-controls="denied" aria-selected="false">Ditolak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="approved-tab" data-toggle="tab" href="#approved" role="tab" aria-controls="approved" aria-selected="false">Disetujui</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane py-3 fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                    <div id="table-data-pending-toolbar">
                    
                    </div>
                    <table id="table-data-pending" style="font-size: 0.7rem;"></table>
                </div>
                <div class="tab-pane py-3 fade" id="denied" role="tabpanel" aria-labelledby="denied-tab">
                    <div id="table-data-denied-toolbar">
                
                    </div>
                    <table id="table-data-denied" style="font-size: 0.7rem;"></table>
                </div>
                <div class="tab-pane py-3 fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                    <div id="table-data-approved-toolbar">
                    <a href="{{route('dashboard_user.withdraw_cart')}}" class="btn btn-info"><i class="fa fa-shopping-cart"></i> Lihat Keranjang Komisi Anda</a>
                    </div>
                    <table id="table-data-approved" style="font-size: 0.7rem;"></table>
                </div>
            </div>
                  

            
        </div>
    </div>
                                    
               
   

        
@endsection

@section('scripts')
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

            $('#table-data-pending').bootstrapTable({
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
                url: '{{route('dashboard_user.json_pengajuan_pembiayaan_dana_mitra', ['status' => 'pending'])}}',
                columns: [
                    
                    {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'Actions',
                        formatter: function(value, row, index){
                            return `
                                <a style="font-size: 0.7rem;" class="btn btn-sm btn-info" href="${base_url + '/dashboard_user/show_pengajuan_pembiayaan_dana_mitra/' + value }">Detail</a>
                            `;
                        }
                    },

                    {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'ID',
                    },
                    {
                        field: 'user',
                        class: 'text-nowrap',
                        title: 'Nama Customer',
                        formatter: function(user, row, index){
                            if(user){
                                return user.name
                            }
                        }
                    },
                    {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'Status',
                        formatter: function(value, row, index){
                            if(row.cs_pembiayaan_dana_status == 'denied'){
                                return 'Ditolak';
                            }else if(row.cs_pembiayaan_dana_status == 'approved'){
                                if(row.spv_pembiayaan_dana_status == 'denied'){
                                    return 'Ditolak';
                                }else if(row.spv_pembiayaan_dana_status == 'approved'){
                                    return 'Disetujui';
                                }else{
                                    return 'Pending';
                                }
                            }else{
                                return 'Pending';
                            }
                        }
                    },
                    {
                        field: 'wilayah_pembiayaan_dana',
                        class: 'text-nowrap',
                        title: 'Wilayah',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    },
                    {
                        field: 'plafond_pembiayaan_diinginkan',
                        class: 'text-nowrap',
                        title: 'Plafond Pembiayaan Di Inginkan',
                        formatter: function(value, row, index){
                            if(value){
                                return 'Rp. ' + number_format(value, 0, ',', '.');
                            }
                        }
                    },
                    {
                        field: 'tempo_angsuran_pembiayaan_dana',
                        class: 'text-nowrap',
                        title: 'Tempo',
                        formatter: function(value, row, index){
                            if(value){
                                return value.tempo + ' Bulan';
                            }
                        }
                    },
                    {
                        field: 'motor_pembiayaan_dana',
                        class: 'text-nowrap',
                        title: 'Motor',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    }, {
                        field: 'tahun_motor',
                        class: 'text-nowrap',
                        title: 'Tahun Motor',
                    },

                    /*{
                        field: 'status_stnk',
                        class: 'text-nowrap',
                        title: 'Status STNK',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    },

                    {
                        field: 'status_bpkb',
                        class: 'text-nowrap',
                        title: 'Status BPKB',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    },
                    {
                        field: 'status_rumah',
                        class: 'text-nowrap',
                        title: 'Status Kepemilikan Rumah',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    },
				        */
                    {
                        field: 'created_at',
                        class: 'text-nowrap',
                        title: 'Created at',
                    },
                ]
            });

            $('#table-data-denied').bootstrapTable({
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
                url: '{{route('dashboard_user.json_pengajuan_pembiayaan_dana_mitra', ['status' => 'denied'])}}',
                columns: [
                    
                    {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'Actions',
                        formatter: function(value, row, index){
                            return `
                                <a style="font-size: 0.7rem;" class="btn btn-sm btn-info" href="${base_url + '/dashboard_user/show_pengajuan_pembiayaan_dana_mitra/' + value }">Detail</a>
                            `;
                        }
                    },

                    {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'ID',
                    },
                    {
                        field: 'user',
                        class: 'text-nowrap',
                        title: 'Nama Customer',
                        formatter: function(user, row, index){
                            if(user){
                                return user.name
                            }
                        }
                    },
                    {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'Status',
                        formatter: function(value, row, index){
                            if(row.cs_pembiayaan_dana_status == 'denied'){
                                return 'Ditolak';
                            }else if(row.cs_pembiayaan_dana_status == 'approved'){
                                if(row.spv_pembiayaan_dana_status == 'denied'){
                                    return 'Ditolak';
                                }else if(row.spv_pembiayaan_dana_status == 'approved'){
                                    return 'Disetujui';
                                }else{
                                    return 'Pending';
                                }
                            }else{
                                return 'Pending';
                            }
                        }
                    },
                    {
                        field: 'wilayah_pembiayaan_dana',
                        class: 'text-nowrap',
                        title: 'Wilayah',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    },
                    {
                        field: 'plafond_pembiayaan_diinginkan',
                        class: 'text-nowrap',
                        title: 'Plafond Pembiayaan Di Inginkan',
                        formatter: function(value, row, index){
                            if(value){
                                return 'Rp. ' + number_format(value, 0, ',', '.');
                            }
                        }
                    },
                    {
                        field: 'tempo_angsuran_pembiayaan_dana',
                        class: 'text-nowrap',
                        title: 'Tempo',
                        formatter: function(value, row, index){
                            if(value){
                                return value.tempo + ' Bulan';
                            }
                        }
                    },
                    {
                        field: 'motor_pembiayaan_dana',
                        class: 'text-nowrap',
                        title: 'Motor',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    }, {
                        field: 'tahun_motor',
                        class: 'text-nowrap',
                        title: 'Tahun Motor',
                    },

                    /*{
                        field: 'status_stnk',
                        class: 'text-nowrap',
                        title: 'Status STNK',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    },

                    {
                        field: 'status_bpkb',
                        class: 'text-nowrap',
                        title: 'Status BPKB',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    },
                    {
                        field: 'status_rumah',
                        class: 'text-nowrap',
                        title: 'Status Kepemilikan Rumah',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    },
				        */
                    {
                        field: 'created_at',
                        class: 'text-nowrap',
                        title: 'Created at',
                    },
                ]
            });

            var table_data_approved = $('#table-data-approved').bootstrapTable({
                toolbar: "#table-data-approved-toolbar",
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
                url: '{{route('dashboard_user.json_pengajuan_pembiayaan_dana_mitra', ['status' => 'approved'])}}',
                columns: [
                    
                    {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'Actions',
                        formatter: function(value, row, index){
                            var html = `
                                <a style="font-size: 0.7rem;" class="btn btn-sm btn-info" href="${base_url + '/dashboard_user/show_pengajuan_pembiayaan_dana_mitra/' + value }">Detail</a>
                                
                            `;

                            if(row.withdraw_cart == null && row.already_withdraw == false){
                                html += `<a style="font-size: 0.7rem;" class="btn btn-sm btn-primary btn-add-to-withdrawal-cart" href="#" data-id="${value}">Add to Withdrawal Cart</a>`;
                            }

                            
                            return html;
                        }
                    },
                    // {
                    //     field: 'mitra_profit_withdraw_status',
                    //     class: 'text-nowrap',
                    //     title: 'Withdrawal Status',
                    //     formatter: function(withdrawn_status, row, index){
                    //         if(withdrawn_status == 0){
                    //            return '<span>not yet<span>';
                    //         }
                    //         if(withdrawn_status == 1){
                    //            return '<span class="text-warning">Requested<span>';
                    //         }
                    //         if(withdrawn_status == 2){
                    //            return '<span class="text-primary">Withdrawn<span>';
                    //         }
                    //     }
                    // },

                    {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'ID',
                    },
                    {
                        field: 'mitra_profit',
                        class: 'text-nowrap',
                        title: 'Komisi',
                        formatter: function(profit, row, index){
                           return 'Rp. ' + number_format(profit, 0, ',', '.');
                        }
                    },
                    
                    {
                        field: 'user',
                        class: 'text-nowrap',
                        title: 'Nama Customer',
                        formatter: function(user, row, index){
                            if(user){
                                return user.name
                            }
                        }
                    },
                    {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'Status',
                        formatter: function(value, row, index){
                            if(row.cs_pembiayaan_dana_status == 'denied'){
                                return 'Ditolak';
                            }else if(row.cs_pembiayaan_dana_status == 'approved'){
                                if(row.spv_pembiayaan_dana_status == 'denied'){
                                    return 'Ditolak';
                                }else if(row.spv_pembiayaan_dana_status == 'approved'){
                                    return 'Disetujui';
                                }else{
                                    return 'Pending';
                                }
                            }else{
                                return 'Pending';
                            }
                        }
                    },
                    {
                        field: 'wilayah_pembiayaan_dana',
                        class: 'text-nowrap',
                        title: 'Wilayah',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    },
                    {
                        field: 'plafond_pembiayaan_diinginkan',
                        class: 'text-nowrap',
                        title: 'Plafond Pembiayaan Di Inginkan',
                        formatter: function(value, row, index){
                            if(value){
                                return 'Rp. ' + number_format(value, 0, ',', '.');
                            }
                        }
                    },
                    {
                        field: 'tempo_angsuran_pembiayaan_dana',
                        class: 'text-nowrap',
                        title: 'Tempo',
                        formatter: function(value, row, index){
                            if(value){
                                return value.tempo + ' Bulan';
                            }
                        }
                    },
                    {
                        field: 'motor_pembiayaan_dana',
                        class: 'text-nowrap',
                        title: 'Motor',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    }, {
                        field: 'tahun_motor',
                        class: 'text-nowrap',
                        title: 'Tahun Motor',
                    },

                    /*{
                        field: 'status_stnk',
                        class: 'text-nowrap',
                        title: 'Status STNK',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    },

                    {
                        field: 'status_bpkb',
                        class: 'text-nowrap',
                        title: 'Status BPKB',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    },
                    {
                        field: 'status_rumah',
                        class: 'text-nowrap',
                        title: 'Status Kepemilikan Rumah',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
                        }
                    },
				        */
                    {
                        field: 'created_at',
                        class: 'text-nowrap',
                        title: 'Created at',
                    },
                ]
            });

            $(document).on('click', '.btn-add-to-withdrawal-cart', function(e){
                e.preventDefault();
                console.log('clicked');
                var id = $(this).data('id');

                
                $.ajax({
                    type: 'POST',
                    url: '{{route('dashboard_user.add_to_withdraw_cart')}}',
                    data: {
                        id: id
                    },
                    success: function(result){
                        
                        if(result.status == true){
                            table_data_approved.bootstrapTable('refresh');
                        }else{
                            alert(result.message);  
                        }
                    }
                })
            });
        });
    </script>
@endsection
