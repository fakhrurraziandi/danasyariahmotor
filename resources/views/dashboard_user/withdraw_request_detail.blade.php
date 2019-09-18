
@extends('dashboard_user.main')

@section('sub_content')

<?php $user = auth()->user(); ?>
    

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <p>
                <a href="{{route('dashboard_user.withdraw_request')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </p>

            @if($withdraw)
                <form action="{{route('dashboard_user.submit_withdraw_request')}}" method="post">

                    @csrf
                    
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Update!</strong> Withdraw Successfully updated!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    
                    <h2>Pengajuan Komisi Anda</h2>
                    <hr>

                    <dl class="row">
                        <dt class="col-sm-3 text-md-right">Id Ref</dt>
                        <dd class="col-sm-9">{{$withdraw->id}}</dd>

                        <dt class="col-sm-3 text-md-right">Nama bank</dt>
                        <dd class="col-sm-9">{{$withdraw->user->nama_bank}}</dd>

                        <dt class="col-sm-3 text-md-right">No Rekening Bank</dt>
                        <dd class="col-sm-9">{{$withdraw->user->no_rekening_bank}}</dd>

                        <dt class="col-sm-3 text-md-right">Total Komisi Anda</dt>
                        <dd class="col-sm-9">{{'Rp. '.number_format($withdraw->total_profit, 0, ',', '.')}}</dd>
                    </dl>

                    @if($withdraw->status == 0)
                        <button class="btn btn-primary btn-block">Submit Request</button>
                    @endif

                </form>

                <hr>
                
            
                <div id="table-data-approved-toolbar">
        
                </div>
                <table id="table-data-approved" style="font-size: 0.7rem;"></table>

            @else
                <div class="text-center">
                    <h4>Belum ada withdraw request</h4>
                    <p>Silahkan pilih transaksi (approved) yang ingin di withdraw dari <a href="{{route('dashboard_user.pengajuan_pembiayaan_dana_mitra')}}">halaman ini</a></p>
                </div>
            @endif

    
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

           

            var table_data_approved = $('#table-data-approved').bootstrapTable({
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
                url: '{{route('dashboard_user.json_withdraw_request_detail', [$withdraw->id])}}',
                columns: [
                    
                    {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'Actions',
                        formatter: function(value, row, index){
                            var html = ` `;
                            
                            <?php if($withdraw->status == 0): ?>
                                html += `<a style="font-size: 0.7rem;" class="btn btn-sm btn-danger btn-from-to-withdrawal-request" href="#" data-id="${row.id}">Remove from Withdrawal Request</a>`;
                            <?php endif; ?>
                            

                            
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
                        field: 'pengajuan_pembiayaan_dana',
                        class: 'text-nowrap',
                        title: 'Profit',
                        formatter: function(pengajuan_pembiayaan_dana, row, index){
                            if(pengajuan_pembiayaan_dana){
                                return 'Rp. ' + number_format(pengajuan_pembiayaan_dana.mitra_profit, 0, ',', '.')
                            }
                        }
                    },
                    
                    {
                        field: 'pengajuan_pembiayaan_dana',
                        class: 'text-nowrap',
                        title: 'Nama Customer',
                        formatter: function(pengajuan_pembiayaan_dana, row, index){
                            if(pengajuan_pembiayaan_dana){
                                return pengajuan_pembiayaan_dana.user.name
                            }
                        }
                    },

                  
                    {
                        field: 'created_at',
                        class: 'text-nowrap',
                        title: 'Created at',
                    },
                ]
            });

            $(document).on('click', '.btn-from-to-withdrawal-request', function(e){

                e.preventDefault();
             
                var id = $(this).data('id');

                
                $.ajax({
                    type: 'POST',
                    url: '{{route('dashboard_user.remove_from_withdrawal_request')}}',
                    data: {
                        id: id
                    },
                    success: function(result){
                        
                        if(result.status == true){
                            table_data_approved.bootstrapTable('refresh');
                        }
                    }
                })
            });
        });
    </script>
@endsection
