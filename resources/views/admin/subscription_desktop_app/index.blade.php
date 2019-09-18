@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Subscription Desktop App
                    </div>
                    <div class="card-body">
                        <div id="table-data-toolbar">
                            {{-- <a href="{{route('admin.subscription_desktop_app.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a> --}}
                            <a href="{{route('admin.subscription_desktop_app.report_form')}}" class="btn btn-primary"><i class="fa fa-print"></i> Report</a>
                        </div>
                        <table id="table-data"></table>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function(){

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
                url: '{{route('admin.subscription_desktop_app.json')}}',
                columns: [
                   {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'Actions',
                        formatter: function(value, row, index){
                            var html = ` `;
                          
                            html += `<a style="font-size: 0.7rem;" class="btn btn-sm btn-info " href="${base_url + '/admin/subscription_desktop_app/' + value + '/edit'}" >Proses</a>`;
                            
                            return html;
                        }
                    },
                    {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'ID',
                    },

                    {
                        field: 'subscription_duration',
                        class: 'text-nowrap',
                        title: 'subscription_duration',
                        formatter: function(value, row, index){
                            return value + ' Month';
                        }
                    },
                    {
                        field: 'status',
                        class: 'text-nowrap',
                        title: 'Status',
                        formatter: function(status){
                            if(status == 'pending'){
                                return '<span class="text-info">Pending</span>';
                            }
                            if(status == 'waiting'){
                                return '<span class="text-info">Waiting</span>';
                            }
                            if(status == 'cancelled'){
                                return '<span class="text-info">Cancelled</span>';
                            }
                            if(status == 'approved'){
                                return '<span class="text-success">Approved</span>';
                            }
                            if(status == 'suspend'){
                                return '<span class="text-danger">Suspend</span>';
                            }
                        }
                    },

                    {
                        field: 'price',
                        class: 'text-nowrap',
                        title: 'Price',
                        formatter: function(price){
                            return 'Rp. '+number_format(price, 0, ',', '.');
                        }
                    },

                    {
                        field: 'description',
                        class: 'text-nowrap',
                        title: 'Description',
                    },

                    {
                        field: 'nama_bank',
                        class: 'text-nowrap',
                        title: 'Nama Bank',
                    },
                    {
                        field: 'no_rekening',
                        class: 'text-nowrap',
                        title: 'No Rekening',
                    },
                    {
                        field: 'nama_rekening',
                        class: 'text-nowrap',
                        title: 'Nama Rekening',
                    },


                    {
                        field: 'bukti_transaksi',
                        class: 'text-nowrap',
                        title: 'Bukti Trnasaksi',
                        formatter: function(bukti_transaksi){
                            if(bukti_transaksi){
                                return '<img src="'+ base_url + '/uploads/'+ bukti_transaksi +'" style="width: 250px;">';
                            }
                        }
                    },

                    {
                        field: 'subscription_approved_at',
                        class: 'text-nowrap',
                        title: 'Approved at',
                    },

                    {
                        field: 'subscription_expired_at',
                        class: 'text-nowrap',
                        title: 'Expired Date',
                    },

                    {
                        field: 'user',
                        class: 'text-nowrap',
                        title: 'Nama User',
                        formatter: function(user, row, index){
                            if(user){
                                return user.name;
                            }
                        }
                    },

                    {
                        field: 'user',
                        class: 'text-nowrap',
                        title: 'Email',
                        formatter: function(user, row, index){
                            if(user){
                                return user.email;
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

        });
    </script>
@endsection