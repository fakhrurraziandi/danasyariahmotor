@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new video</div>
                    <div class="card-body">

                        <form action="{{route('admin.video.store')}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" id="title" name="title" placeholder="Title" value="{{old('title')}}">
                                        @if($errors->has('title'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('title')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control {{$errors->has('slug') ? 'is-invalid' : ''}}" id="slug" name="slug" placeholder="Slug" value="{{old('slug')}}">
                                        @if($errors->has('slug'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('slug')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select class="form-control {{$errors->has('type') ? 'is-invalid' : ''}}" id="type" name="type" placeholder="Type" value="{{old('type')}}">
                                            <?php $types = ['self_host', 'youtube_embed'] ?>
                                            @foreach($types as $type)
                                                <option value="{{$type}}">{{ucwords(str_replace('_', ' ', $type))}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('type'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('type')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <script>
                                $(function(){
                                    function onTypeChangeHandler(){

                                        const type = $('#type').val();

                                        if(type == 'self_host'){
                                            $('.row-self_host__file').show();
                                            $('.row-youtube_embed__iframe_tag').hide();
                                        }

                                        if(type == 'youtube_embed'){
                                            $('.row-self_host__file').hide();
                                            $('.row-youtube_embed__iframe_tag').show();
                                        }
                                    }

                                    onTypeChangeHandler();
                                    $('#type').on('change', onTypeChangeHandler);
                                
                                });
                            </script>

                            <div class="row row-youtube_embed__iframe_tag" style="display: none;">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="youtube_embed__iframe_tag">Iframe Tag</label>
                                        <textarea class="form-control {{$errors->has('youtube_embed__iframe_tag') ? 'is-invalid' : ''}}" id="youtube_embed__iframe_tag" name="youtube_embed__iframe_tag" placeholder="Iframe Tag" value="{{old('youtube_embed__iframe_tag')}}" rows="5"></textarea>
                                        @if($errors->has('youtube_embed__iframe_tag'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('youtube_embed__iframe_tag')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row row-self_host__file" style="display: none;">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="self_host__file">Upload Video</label>
                                        <input type="file" class="form-control {{$errors->has('self_host__file') ? 'is-invalid' : ''}}" id="self_host__file" name="self_host__file" placeholder="Iframe Tag" value="{{old('self_host__file')}}">
                                        @if($errors->has('self_host__file'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('self_host__file')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" id="description" name="description" placeholder="Description" rows="5">{{old('description')}}</textarea>
                                        @if($errors->has('description'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('description')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.video.index')}}" class="btn btn-secondary">Cancel</a>
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