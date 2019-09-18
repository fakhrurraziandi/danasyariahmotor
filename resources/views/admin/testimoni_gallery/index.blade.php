@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Testimoni Gallery
                    </div>
                    <div class="card-body">
                        <div id="table-data-toolbar">
                            <a href="{{route('admin.testimoni_gallery.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add new</a>
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
                url: '{{route('admin.testimoni_gallery.json')}}',
                columns: [
                    {
                        field: 'id',
                        title: 'Action',
                        class: 'text-nowrap',
                        formatter: function(value, row, index){
                            return `
                                <a class="btn btn-sm btn-info" href="${base_url + '/admin/testimoni_gallery/' + value + '/edit'}"><i class="fa fa-edit"></i> Edit</a>
                                <form method="POST" action="${base_url + '/admin/testimoni_gallery/' + value}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete data ${row.name}?')">
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
                        field: 'message',
                        title: 'Message',
                    },
                    {
                        field: 'photo',
                        title: 'Photo',
                        formatter: function(photo){
                            if(photo){
                                var full_url = '{{URL::to('/')}}/uploads/'+ photo;
                                return '<img src="'+ full_url +'" style="width: 200px;"/>';
                            }
                        }
                    },
                    {
                        field: 'type',
                        title: 'Type',
                    },
                    {
                        field: 'id',
                        title: 'Wilayah',
                        formatter: function(value, row, index){
                            if(row.type == 'pembiayaan_dana'){
                                return row.wilayah_pembiayaan_dana ? row.wilayah_pembiayaan_dana.name : null;
                            }
                            if(row.type == 'kredit_motor'){
                                return row.wilayah_kredit_motor ? row.wilayah_kredit_motor.name : null;
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