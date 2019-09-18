@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Edit permission</div>
                    <div class="card-body">

                        <form action="{{route('admin.permission.update', $permission->id)}}" method="POST">

                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" placeholder="Name" value="{{old('name', $permission->name)}}">
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('name')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control {{$errors->has('slug') ? 'is-invalid' : ''}}" id="slug" name="slug" placeholder="Slug" value="{{old('slug', $permission->slug)}}">
                                        @if($errors->has('slug'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('slug')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.permission.index')}}" class="btn btn-secondary">Cancel</a>
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