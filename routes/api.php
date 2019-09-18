<?php


use App\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test_link_ref', function(){
    $users = User::where('mitra_status', 2)->limit(10)->get();


    
    
                        

    foreach($users as $user){

        $params = array();
        $params['access_token'] = 'b4c7e084acb9a73f362c4a1a2922014287748f06';
        $params['longUrl'] = $user->link_ref;

        $link_ref = bitly_get('shorten', $params)['data']['url'];
        echo $user->name . ' ('. $user->email .'): <a href="'. $link_ref .'"> '. $link_ref .'</a>';
        echo '<br />';
    }
});


Route::get('whatsapp_message_testing', function(Request $request){

    $header = $request->header('Authorization');

    // if($header == '$2y$10$r5Jr3ITIo.pEV30tYnV3jOeNnKG3DYAfCMhKnZF8BRsSHXgljgLYS'){
    if(true){
        return [
            'status' => true,
            'message' => '',
            'data' => App\WhatsappNotification::where('id', 360)->get()
        ];
    }else{
        return [
            'status' => false,
            'message' => 'Unauthorized'
        ];
    }
    
});

Route::get('whatsapp_message', function(Request $request){

    $header = $request->header('Authorization');

    // if($header == '$2y$10$r5Jr3ITIo.pEV30tYnV3jOeNnKG3DYAfCMhKnZF8BRsSHXgljgLYS'){
    if(true){
        return [
            'status' => true,
            'message' => '',
            'data' => App\WhatsappNotification::where('flag', 'pending')->limit(5)->get()
        ];
    }else{
        return [
            'status' => false,
            'message' => 'Unauthorized'
        ];
    }
});

Route::get('subscription_desktop_app', function(Request $request){

    $header = $request->header('Authorization');

    // if($header == '$2y$10$r5Jr3ITIo.pEV30tYnV3jOeNnKG3DYAfCMhKnZF8BRsSHXgljgLYS'){
    if(true){
        return [
            'status' => true,
            'message' => '',
            'data' => App\SubscriptionDesktopApp::where('status', 'waiting')->limit(5)->get()
        ];
    }else{
        return [
            'status' => false,
            'message' => 'Unauthorized'
        ];
    }
    
});

Route::get('update_subscription_desktop_app/{id}', function(Request $request, $id){

    $header = $request->header('Authorization');

    if($header == '$2y$10$r5Jr3ITIo.pEV30tYnV3jOeNnKG3DYAfCMhKnZF8BRsSHXgljgLYS'){
    // if(true){

        $subscription_desktop_app = App\SubscriptionDesktopApp::find($id);

        $status = $request->get('status');
        $data = [
            'status' => $status 
        ];

        if($status == 'approved'){

            $subscription_approved_at = new DateTime(date('Y-m-d H:i:s'));
            $subscription_approved_at = $subscription_approved_at->format('Y-m-d H:i:s');

            $subscription_expired_at = new DateTime(date('Y-m-d H:i:s'));
            $subscription_expired_at->add(new DateInterval('P'. $subscription_desktop_app->subscription_duration .'M'));
            $subscription_expired_at = $subscription_expired_at->format('Y-m-d H:i:s');

            $data['subscription_approved_at'] = $subscription_approved_at;
            $data['subscription_expired_at'] = $subscription_expired_at;
        }
        
        $subscription_desktop_app->update($data);

        return [
            'status' => true,
            'message' => 'Updated',
            'data' => [
                'subscription_desktop_app' => $subscription_desktop_app
            ]
        ];
    }else{
        return [
            'status' => false,
            'message' => 'Unauthorized'
        ];
    }
    
});


Route::get('update_wanotif/{id}', function(Request $request){

    $header = $request->header('Authorization');

    // if($header == '$2y$10$r5Jr3ITIo.pEV30tYnV3jOeNnKG3DYAfCMhKnZF8BRsSHXgljgLYS'){
    if(true){
		return App\WhatsappNotification::where('id', $request->id)->update([
            'flag' => $request->get('flag')
        ]);
    }else{
		return "0";
	}
});

Route::get('test', function(Request $request){
    $user_agent = $request->header('User-Agent');

    return $user_agent;
});