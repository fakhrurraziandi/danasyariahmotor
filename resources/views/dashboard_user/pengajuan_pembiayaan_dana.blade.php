
@extends('dashboard_user.main')

@section('sub_content')

<?php $user = auth()->user(); ?>
    

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            
            <h2>Pengajuan Pembiayaan Dana Anda</h2>
            <hr>

            <div id="table-data-toolbar">
                <a href="{{route('akad-kredit')}}#form-akad-kredit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Ajukan Pembiayaan Dana Baru</a>
            </div>
            <table id="table-data" style="font-size: 0.7rem;"></table>
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
                url: '{{route('dashboard_user.json_pengajuan_pembiayaan_dana')}}',
                columns: [
                    
                    {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'Actions',
                        formatter: function(value, row, index){
                            return `
                                <a style="font-size: 0.7rem;" class="btn btn-sm btn-info" href="${base_url + '/dashboard_user/show_pengajuan_pembiayaan_dana/' + value }">Detail</a>
                            `;
                        }
                    },

                    {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'ID',
                    },
                    {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'Status',
                        formatter: function(value, row, index){
                            if(row.cs_pembiayaan_dana_status == 'denied'){
                                return 'Denied';
                            }else if(row.cs_pembiayaan_dana_status == 'approved'){
                                if(row.spv_pembiayaan_dana_status == 'denied'){
                                    return 'Denied';
                                }else if(row.spv_pembiayaan_dana_status == 'approved'){
                                    return 'Approved';
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
        });
    </script>
@endsection
