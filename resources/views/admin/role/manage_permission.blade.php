@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Manage permission for {{$role->name}}</div>
                    <div class="card-body">

                        <form action="{{route('admin.role.update_permission', $role->id)}}" method="POST">

                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input 
                                                        @foreach($role->permissions as $role_permission)
                                                            
                                                            @if($permission->id == $role_permission->id)
                                                                checked=""
                                                                @break;
                                                            @endif
                                                            
                                                        @endforeach
                                                        type="checkbox" class="custom-control-input" id="permission_id_{{$permission->id}}" name="permission_ids[]" value="{{$permission->id}}">
                                                    <label class="custom-control-label" for="permission_id_{{$permission->id}}"></label>
                                                </div>
                                            </td>
                                            <td>{{$permission->name}}</td>
                                            <td>{{$permission->slug}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.role.index')}}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function(){

            

        });
    </script>
@endsection