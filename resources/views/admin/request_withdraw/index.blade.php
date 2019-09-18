@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Request Withdraw
                    </div>
                    <div class="card-body">
                        <div id="table-data-toolbar">
                            
                            <a href="{{route('admin.request_withdraw.report_form')}}" class="btn btn-primary"><i class="fa fa-print"></i> Report</a>
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
                url: '{{route('admin.request_withdraw.json')}}',
                columns: [
                   {
                        field: 'id',
                        class: 'text-nowrap',
                        title: 'Actions',
                        formatter: function(value, row, index){
                            var html = ` `;
                          
                            html += `<a style="font-size: 0.7rem;" class="btn btn-sm btn-info " href="${base_url + '/admin/request_withdraw/' + value + '/edit'}" >Proses</a>`;
                            
                            return html;
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
                        title: 'Total Profit',
                        formatter: function(value, row, index){
                            return 'Rp. '+ number_format(value, 0, ',', '.');
                        }
                    },
                    {
                        field: 'status',
                        class: 'text-nowrap',
                        title: 'Status',
                        formatter: function(value, row, index){
                            

                            if(value == 1){
                                return '<span class="text-info">Requested</span>';
                            }

                            if(value == 2){
                                return '<span class="text-success">Withdrawn</span>'; 
                            }

                            if(value == 3){
                                return '<span class="text-danger">Denied</span>'; 
                            }
                            
                        }
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
                        field: 'user',
                        class: 'text-nowrap',
                        title: 'No Handphone',
                        formatter: function(user, row, index){
                            if(user){
                                return user.no_handphone_1;
                            }
                        }
                    },

                    {
                        field: 'user',
                        class: 'text-nowrap',
                        title: 'No Whatsapp',
                        formatter: function(user, row, index){
                            if(user){
                                return user.no_handphone_2;
                            }
                        }
                    },

                    {
                        field: 'user',
                        class: 'text-nowrap',
                        title: 'Informasi Bank',
                        formatter: function(user, row, index){
                            if(user){
                                return user.no_rekening_bank + ' - ' + user.nama_bank;
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