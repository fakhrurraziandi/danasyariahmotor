@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Users
                    </div>
                    <div class="card-body">
                        <div id="table-data-toolbar">
                            <a href="{{route('admin.user.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                            <a href="{{route('admin.user.report_form')}}" class="btn btn-primary"><i class="fa fa-print"></i> Report</a>
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
                showRefresh: true,
                iconsPrefix: 'fa',
                sortOrder: 'DESC',
                // showToggle: true,
                // showColumns: true,
                // showExport: true,
                // showPaginationSwitch: true,
                pagination: true,
                pageList: [10, 25, 50, 100, 'ALL'],
                // showFooter: false,
                sidePagination: 'server',
                url: '{{route('admin.user.json')}}',
                columns: [
                    {
                        field: 'id',
                        title: 'Action',
                        class: 'text-nowrap',
                        formatter: function(value, row, index){
                            return `
                                <a class="btn btn-sm btn-info" href="${base_url + '/admin/user/' + value + '/edit'}"><i class="fa fa-edit"></i> Edit</a>
                                <a class="btn btn-sm btn-secondary" href="${base_url + '/admin/user/' + value + '/change_password'}"><i class="fa fa-edit"></i> Change Password</a>
                                <form method="POST" action="${base_url + '/admin/user/' + value}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete data ${row.name}?')">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                </form>
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
                        field: 'mitra_status',
                        title: 'Mitra Status',
                        formatter: function(value, row, index){
                            switch(value){
                                case 0:
                                    return 'Not Active';
                                    break;
                                case 1:
                                    return 'Requested';
                                    break;
                                case 2:
                                    return 'Activated';
                                    break;
                                case 3:
                                    return 'Denied';
                                    break;
                            }
                        }
                    },
                    {
                        field: 'no_handphone_2',
                        title: 'No Whatsapp',
                    },
                    {
                        field: 'mitra',
                        title: 'Mitra - Ref Code',
                        formatter: function(mitra){
                            return mitra ? mitra.name + ' - ' + mitra.ref_code : '-';
                        }
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