
@extends('dashboard_user.main')

@section('sub_content')

<?php $user = auth()->user(); ?>
    

    <div class="card border-0 shadow-sm">
        <div class="card-body">

           
            <h3>List Kustomer Anda</h3>

          
            <hr>

            <div id="table-customer-mitra-toolbar">
                
            </div>
            <table id="table-customer-mitra" style="font-size: 0.7rem;"></table>
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

           

            var table_customer_mitra = $('#table-customer-mitra').bootstrapTable({
                toolbar: "#table-customer-mitra-toolbar",
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
                url: '{{route('dashboard_user.json_customer_mitra')}}',
                columns: [
                    
                    {
                        field: 'id',
                        title: 'Action',
                        class: 'text-nowrap',
                        formatter: function(value, row, index){
                            return `
                                <a class="btn btn-sm btn-info" href="${base_url + '/dashboard_user/show_customer_mitra/' + value}"><i class="fa fa-list"></i> Detail</a>
                            `;
                        }
                    },
                    {
                        field: 'id',
                        title: 'ID',
                    },
                    {
                        field: 'name',
                        title: 'Name',
                    },
                    {
                        field: 'email',
                        title: 'Email',
                    },

                   
                    {
                        field: 'no_handphone_2',
                        title: 'No Whatsapp',
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
                            table_customer_mitra.bootstrapTable('refresh');
                        }
                    }
                })
            });
        });
    </script>
@endsection
