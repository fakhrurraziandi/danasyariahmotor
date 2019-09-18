@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Manage role for {{$user->name}}</div>
                    <div class="card-body">

                        <form action="{{route('admin.user.update_role', $user->id)}}" method="POST">

                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Permissions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input 
                                                        @foreach($user->roles as $user_role)
                                                            
                                                            @if($role->id == $user_role->id)
                                                                checked=""
                                                                @break;
                                                            @endif
                                                            
                                                        @endforeach
                                                        type="checkbox" class="custom-control-input" id="role_id_{{$role->id}}" name="role_ids[]" value="{{$role->id}}">
                                                    <label class="custom-control-label" for="role_id_{{$role->id}}"></label>
                                                </div>
                                            </td>
                                            <td>{{$role->name}}</td>
                                            <td>{{$role->slug}}</td>
                                            <td>
                                                @forelse($role->permissions as $permission)
                                                    <span class="badge badge-secondary">{{$permission->name}}</span> 
                                                @empty
                                                    <span><i>No Permission</i></span>
                                                @endforelse
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.user.index')}}" class="btn btn-secondary">Cancel</a>
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