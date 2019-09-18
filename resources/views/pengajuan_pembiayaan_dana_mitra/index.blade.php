@extends('layouts.app')

@section('content')

    

    <div class="container" style="margin-top: 150px; margin-bottom: 150px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Pengajuan Pembiayaan Dana Sebagai Mitra') }}</div>

                    

                    <div class="card-body">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="on-process-tab" data-toggle="tab" href="#on-process" role="tab" aria-controls="on-process" aria-selected="true">On Process</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="approved-tab" data-toggle="tab" href="#approved" role="tab" aria-controls="approved" aria-selected="false">Approved</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="on-process" role="tabpanel" aria-labelledby="on-process-tab">
                                    <div id="table-data-toolbar">
                        
                                    </div>
                                    <table id="table-data"></table>
                                </div>
                                <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                                    <div id="table-data-toolbar-approved">
                        
                                    </div>
                                    <table id="table-data-approved"></table>
                                </div>
                                
                            </div>
                        
                    </div>
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
                url: '{{route('pengajuan_pembiayaan_dana_mitra.json')}}',
                columns: [
                    
                    {
                        field: 'id',
                        title: 'Actions',
                        formatter: function(value, row, index){
                            return `
                                <a class="btn btn-sm btn-info" href="${base_url + '/pengajuan_pembiayaan_dana_mitra/' + value }">Detail</a>
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
                        field: 'user',
                        title: 'Nama',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
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
                        field: 'plafond_pembiayaan_diinginkan',
                        title: 'Plafond Pembiayaan Di Inginkan',
                        formatter: function(value, row, index){
                            if(value){
                                return 'Rp. ' + number_format(value, 0, ',', '.');
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
                    }, {
                        field: 'tahun_motor',
                        title: 'Tahun Motor',
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

            $('#table-data-approved').bootstrapTable({
                toolbar: "#table-data-toolbar-approved",
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
                url: '{{route('pengajuan_pembiayaan_dana_mitra.json_approved')}}',
                columns: [
                    
                    {
                        field: 'id',
                        title: 'Actions',
                        formatter: function(value, row, index){
                            return `
                                <a class="btn btn-sm btn-info" href="${base_url + '/pengajuan_pembiayaan_dana_mitra/' + value }">Detail</a>
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
                        field: 'user',
                        title: 'Nama',
                        formatter: function(value, row, index){
                            if(value){
                                return value.name;
                            }
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
                        field: 'plafond_pembiayaan_diinginkan',
                        title: 'Plafond Pembiayaan Di Inginkan',
                        formatter: function(value, row, index){
                            if(value){
                                return 'Rp. ' + number_format(value, 0, ',', '.');
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
                    }, {
                        field: 'tahun_motor',
                        title: 'Tahun Motor',
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
@endsection
