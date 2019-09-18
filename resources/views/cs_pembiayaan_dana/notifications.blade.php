
@extends('cs_pembiayaan_dana.main')

@section('sub_content')

    

    <h1 class="mb-20">Notifications</small></h1>
    <hr>

    <div class="list-group">
        @forelse($cs_pembiayaan_dana->notifications as $notification)
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

        
@endsection
