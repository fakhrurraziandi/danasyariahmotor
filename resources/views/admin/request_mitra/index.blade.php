@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Request Mitra
                    </div>
                    <div class="card-body">
                        <div id="table-data-toolbar">
                            <a href="{{route('admin.request_mitra.report_form')}}" class="btn btn-primary"><i class="fa fa-print"></i> Report</a>
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
                url: '{{route('admin.request_mitra.json')}}',
                columns: [
                    {
                        field: 'id',
                        title: 'Action',
                        class: 'text-nowrap',
                        formatter: function(value, row, index){

                        
                            return `
                                <a class="btn btn-sm btn-info" href="${base_url + '/admin/request_mitra/' + value + '/edit'}"><i class="fa fa-edit"></i> Proses</a>
                            `;
                            
                        }
                    },
                    {
                        field: 'id',
                        title: 'ID',
                    },
                    {
                        field: 'mitra_status',
                        title: 'Status',
                        formatter: function(value){
                            if(value === 1){
                                return '<span class="text-primary">Requested</span>';
                            }

                            if(value === 2){
                                return '<span class="text-success">Activated</span>';
                            }

                            if(value === 3){
                                return '<span class="text-danger">Denied</span>';
                            }
                        }
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
                        field: 'mitra',
                        title: 'Mitra',
                        formatter: function(mitra){
                            return mitra ? mitra.name + ' - ' + mitra.ref_code : '-';
                        }
                    },
                    {
                        field: 'alamat',
                        title: 'Alamat',
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

        });
    </script>
@endsection