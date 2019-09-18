
@extends('dashboard_user.main')

@section('sub_content')


    

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
            <a href="{{route('dashboard_user.customer_mitra')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
            <br>
            <br>
            <h3>Informasi Kustomer Anda</h3>

          
            <hr>

            <dl class="row">
                <dt class="col-sm-4">Nama Lengkap Sesuai KTP</dt>
                <dd class="col-sm-8">{{$user->name}}</dd>

                <dt class="col-sm-4">Email</dt>
                <dd class="col-sm-8">{{$user->email}}</dd>

                <dt class="col-sm-4">No Handphone GSM</dt>
                <dd class="col-sm-8">{{$user->no_handphone_1}}</dd>

                <dt class="col-sm-4">No Whatsapp</dt>
                <dd class="col-sm-8">{{$user->no_handphone_2 ? $user->no_handphone_2 : '-'}}</dd>

                <dt class="col-sm-4">Jenis Identitas</dt>
                <dd class="col-sm-8">{{$user->jenis_identitas ? $user->jenis_identitas : '-'}}</dd>

                <dt class="col-sm-4">No Identitas</dt>
                <dd class="col-sm-8">{{$user->no_identitas ? $user->no_identitas : '-'}}</dd>

                <dt class="col-sm-4">Tempat Lahir</dt>
                <dd class="col-sm-8">{{$user->tempat_lahir ? $user->tempat_lahir : '-'}}</dd>

                <dt class="col-sm-4">Tanggal Lahir</dt>
                <dd class="col-sm-8">{{$user->tanggal_lahir ? $user->tanggal_lahir : '-'}}</dd>

                <dt class="col-sm-4">Provinsi</dt>
                <dd class="col-sm-8">{{$user->province ? $user->province->name : '-'}}</dd>

                <dt class="col-sm-4">Kota</dt>
                <dd class="col-sm-8">{{$user->city ? $user->city->name : '-'}}</dd>

                <dt class="col-sm-4">Kecamatan</dt>
                <dd class="col-sm-8">{{$user->district ? $user->district->name : '-'}}</dd>

                <dt class="col-sm-4">Alamat</dt>
                <dd class="col-sm-8">{{$user->alamat ? $user->alamat : '-'}}</dd>

                
            </dl>

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
                                <a class="btn btn-sm btn-info" href="${base_url + '/admin/user/' + value + '/edit'}"><i class="fa fa-list"></i> Detail</a>
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
