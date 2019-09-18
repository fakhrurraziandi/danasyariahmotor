@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Change {{$user->name}} password</div>
                    <div class="card-body">

                        <form action="{{route('admin.user.update_password', $user->id)}}" method="POST">

                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="password" name="password" placeholder="Password" value="{{old('password')}}">
                                        @if($errors->has('password'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('password')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>

                         

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