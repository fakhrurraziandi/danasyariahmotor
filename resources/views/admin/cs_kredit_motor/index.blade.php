@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Cs Kredit Motor
                    </div>
                    <div class="card-body">
                        <div id="table-data-toolbar">
                            <a href="{{route('admin.cs_kredit_motor.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
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
                // showToggle: true,
                // showColumns: true,
                // showExport: true,
                // showPaginationSwitch: true,
                pagination: true,
                pageList: [10, 25, 50, 100, 'ALL'],
                // showFooter: false,
                sidePagination: 'server',
                url: '{{route('admin.cs_kredit_motor.json')}}',
                columns: [
                    {
                        field: 'id',
                        title: 'Action',
                        class: 'text-nowrap',
                        formatter: function(value, row, index){
                            return `
                                <a class="btn btn-sm btn-info" href="${base_url + '/admin/cs_kredit_motor/' + value + '/edit'}"><i class="fa fa-edit"></i> Edit</a>
                                <a class="btn btn-sm btn-secondary" href="${base_url + '/admin/cs_kredit_motor/' + value + '/change_password'}"><i class="fa fa-edit"></i> Change Password</a>
                                <form method="POST" action="${base_url + '/admin/cs_kredit_motor/' + value}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete data ${row.name}?')">
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
                        field: 'wilayah_kredit_motor',
                        title: 'Wilayah',
                        formatter: function(wilayah_kredit_motor){
                            var html = '';
                            if(wilayah_kredit_motor.length > 0){
                                wilayah_kredit_motor.forEach(function(wilayah){
                                    html += '<span class="badge badge-primary">'+ wilayah.name +'</span> ';
                                });
                            }
                            return html;
                        }
                    },
                    {
                        field: 'spv_kredit_motor',
                        title: 'SPV Kredit Motor',
                        formatter: function(spv_kredit_motor){
                            if(spv_kredit_motor){
                                return spv_kredit_motor.name;
                            }
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