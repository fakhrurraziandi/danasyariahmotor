
@extends('dashboard_user.main')

@section('sub_content')

<?php $user = auth()->user(); ?>
    

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Permintaan Komisi berhasil
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <h3>Permintaan Komisi</h3>

          
            <hr>

            <div id="table-withdraw-request-toolbar">
                
            </div>
            <table id="table-withdraw-request" style="font-size: 0.7rem;"></table>
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

           

            var table_withdraw_request = $('#table-withdraw-request').bootstrapTable({
                toolbar: "#table-withdraw-request-toolbar",
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
                url: '{{route('dashboard_user.json_withdraw_request')}}',
                columns: [
                    
                    {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'Actions',
                        formatter: function(value, row, index){
                            var html = ``;
                          
                            html += `<a style="font-size: 0.7rem;" class="btn btn-sm btn-info " href="${base_url + '/dashboard_user/withdraw_request_detail/' + value}" >Detail</a> `;
                            // html += `<a style="font-size: 0.7rem;" class="btn btn-sm btn-danger btn-remove-from-cart" data-id="${value}" href="#" ><i class="fa fa-trash"></i> Hapus dari cart</a>`;

                            
                            return html;
                        }
                    },
                    {
                        field: 'status',
                        class: 'text-nowrap',
                        title: 'Status',
                        formatter: function(status, row, index){
                            if(status == 1){
                                return '<span class="text-info">Permintaan, Silakan Tunggu....</span>';
                            }
                            if(status == 2){
                                return '<span class="text-success">Berhasil</span>';
                            }
                            if(status == 3){
                                return '<span class="text-danger">Ditolak</span>';
                            }
                        }
                    },
                    {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'ID',
                    },
                    {
                        field: 'total_profit',
                        class: 'text-nowrap',
                        title: 'Total Komisi',
                        formatter: function(total_profit, row, index){
                            return 'Rp. '+number_format(total_profit, 0, ',', '.');
                        }
                    },
                    {
                        field: 'created_at',
                        class: 'text-nowrap',
                        title: 'Created at',
                    },
                ]
            });

            $(document).on('click', '.btn-remove-from-cart', function(e){

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
                            table_withdraw_request.bootstrapTable('refresh');
                        }
                    }
                })
            });
        });
    </script>
@endsection
