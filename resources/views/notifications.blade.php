@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 150px; margin-bottom: 150px;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-20">Notifications</small></h1>
                <hr>

                {{-- <div class="list-group">
                    @forelse(auth()->user()->notifications as $notification)
                    <a href="{{$notification->data['url']}}" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between py-3">
                            <h5 class="mb-1">{{$notification->data['title']}}</h5>
                            <small>{{$notification->created_at->diffForHumans()}}</small>
                        </div>
                        <p class="mb-1">{!!$notification->data['message']!!}</p>
                    </a>
                    @empty
                        <p class="text-center">There is no notification at this time</p>
                    @endforelse
                    
                </div> --}}

                <div class="list-group">
                    @forelse(auth()->user()->notifications as $notification)
                    <a href="{{$notification->data['url']}}" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between py-3">
                            <p class="mb-1">{!!$notification->data['message']!!}</p>    
                            <small>{{$notification->created_at->diffForHumans()}}</small>
                        </div>
                        
                    </a>
                    @empty
                        <p class="text-center">There is no notification at this time</p>
                    @endforelse
                    
                </div>
            </div>
        </div>
    </div>
        
@endsection
