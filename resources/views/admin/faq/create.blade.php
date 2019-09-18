@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new faq</div>
                    <div class="card-body">

                        <form action="{{route('admin.faq.store')}}" method="POST">

                            {{csrf_field()}}

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="question">Question</label>
                                        <textarea class="form-control {{$errors->has('question') ? 'is-invalid' : ''}}" id="question" name="question" placeholder="Question" rows="10">{{old('question')}}</textarea>
                                        @if($errors->has('question'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('question')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="answer">Answer</label>
                                        <textarea class="form-control {{$errors->has('answer') ? 'is-invalid' : ''}}" id="answer" name="answer" placeholder="Answer" rows="10">{{old('answer')}}</textarea>
                                        @if($errors->has('answer'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('answer')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                               
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.faq.index')}}" class="btn btn-secondary">Cancel</a>
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

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    
    <script>
        $(function(){
            $('#question').ckeditor();
            $('#answer').ckeditor();
        });
    </script>
@endsection