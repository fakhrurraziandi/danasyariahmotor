@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Notifications
                    </div>
                    <div class="card-body">

                        <div class="list-group">
                            @forelse($admin->notifications as $notification)
                            <a href="{{$notification->data['url']}}" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between py-3">
                                    <p class="mb-1">{!!$notification->data['message']!!}</p>    
                                    
                                    <small>
									<button data-id="{!!$notification->id!!}" style="z-index:99999" type="button"  class="btn btn-outline-secondary btn_trash">
									  <i class="fas fa-trash fa-fw"></i>
									</button>
									</small>
                                </div>
                                <small>{{$notification->created_at->diffForHumans()}}</small>
                            </a>
                            @empty
                                <p class="text-center">There is no notification at this time</p>
                            @endforelse
                            
                        </div>
						
                    </div>
                </div>

            </div>
        </div>
    </div>
	<script>
		$(function(){
			$(".btn_trash").click(function(e){
				e.preventDefault();
				if(confirm('Hapus Notif')){
					window.location='/admin/notifications/remove/'+$(this).attr("data-id");
				};
				
			});
		});
	</script>
	
	
@endsection
