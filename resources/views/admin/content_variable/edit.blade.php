@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new content variable</div>
                    <div class="card-body">

                        <form action="{{route('admin.content_variable.update', $content_variable->id)}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="key">Key</label>
                                        <input type="text" class="form-control {{$errors->has('key') ? 'is-invalid' : ''}}" id="key" name="key" placeholder="Key" value="{{old('key', $content_variable->key)}}">
                                        @if($errors->has('key'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('key')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select class="form-control {{$errors->has('type') ? 'is-invalid' : ''}}" id="type" name="type" placeholder="Type">
                                            <option {{old('type', $content_variable->type) == 'text' ? 'selected=""' : ''}} value="text">Text</option>
                                            <option {{old('type', $content_variable->type) == 'html' ? 'selected=""' : ''}} value="html">HTML</option>
                                        </select>
                                        @if($errors->has('type'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('type')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row row-value_text" style="display: none;">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="value_text">Value</label>
                                        <textarea rows="8" class="form-control {{$errors->has('value_text') ? 'is-invalid' : ''}}" id="value_text" name="value_text" placeholder="Value" >{{old('value_text', $content_variable->value_text)}}</textarea>
                                        @if($errors->has('value_text'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('value_text')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row row-value_html" style="display: none;">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="value_html">Value</label>
                                        <textarea rows="8" class="form-control {{$errors->has('value_html') ? 'is-invalid' : ''}}" id="value_html" name="value_html" placeholder="Value">{{old('value_html', $content_variable->value_html)}}</textarea>
                                        @if($errors->has('value_html'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('value_html')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.content_variable.index')}}" class="btn btn-secondary">Cancel</a>
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

            function onTypeChangeHandler(){
                var type = $('#type').val();
                console.log(type);
                if(type == 'text'){
                    $('.row-value_text').show();
                    $('.row-value_html').hide();
                }

                if(type == 'html'){
                    $('.row-value_text').hide();
                    $('.row-value_html').show();
                }
            }
            
            onTypeChangeHandler();
            $('#type').on('change', onTypeChangeHandler);

            $('#value_html').ckeditor();
        });
    </script>
@endsection