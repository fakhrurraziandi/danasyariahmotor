<?php

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use App\PengajuanPembiayaanDana;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('inspect_session', function(Request $request){
    return $request->session()->all();
});

Route::get('test/whatsapp_message', function(){
    $whatsapp_message = "
Hallo Customer Service 
Astrie 

Ada Customer Baru Telah 
Mengajukan di Website DSM  

Incoming - BAF 
ID 8450000053 *(CV.SURYA MOTOR)*  

⚫️ Nama Customer  : Test
⚫️ Wilayah		  : Test
⚫️ Jenis Motor    : Test
⚫️ Tahun Motor    : Test
⚫️ Status STNK    : Test
⚫️ Status BPKB    : Test
⚫️ Lama Pinjam    : Test
⚫️ Pencairan Maks : Test
⚫️ Kebutuhan Dana : Test
⚫️ Angsuran       : Test
⚫️ Status Tinggal : Test

Akses Login CS  

https://danasyariahmotor.com/login/cs_pembiayaan_dana

Harap Masukan Username Dan Password Anda.  

Segera di Follow up  

Terima Kasih 
Managemen DSM 
    ";

    // $whatsapp_message = preg_replace('~^\h+|\h+$|(\R){2,}|(\s){2,}~m', '$1$2', $whatsapp_message);
    // $whatsapp_message = preg_replace('/^\s+/m', '', $whatsapp_message);
    // $whatsapp_message = trim(preg_replace('/\t+/', '', $whatsapp_message));

    App\WhatsappNotification::create([
        'no_handphone' => '082361399969',
        'message' => trim($whatsapp_message),
        'flag' => "pending"
    ]);
});

Route::get('map_data/pengajuan_pembiayaan_dana', function(){
    return App\PengajuanPembiayaanDana::find(321);
});

Route::get('map_data/pengajuan_kredit_motor', function(){
    return App\PengajuanKreditMotor::first();
});

Route::get('map_data/user', function(){
    return App\User::orderBy('created_at', 'DESC')->first();
});

Route::get('test', function(){

   
    return PengajuanPembiayaanDana::find(480);
    

});



Route::get('level-navigation', function(){
    return view('level-navigation');
});




Route::get('/', 'PagesController@index')->name('home');
// Route::get('/', function(){
//     return view('under-constructing');
// })->name('home');

Route::get('tentang-kami', 'PagesController@tentangKami')->name('tentang-kami');
Route::get('akad-kredit/{mitra_code?}', 'PagesController@akadKredit')->name('akad-kredit')->middleware('auth');
Route::post('get_pencarian_pembiayaan_dana', 'PagesController@get_pencairan_pembiayaan_dana')->name('get_pencarian_pembiayaan_dana');
Route::get('kontak-kami', 'PagesController@contactUs')->name('kontak-kami');
Route::post('submit-kontak-kami', 'PagesController@submitContactUs')->name('submit-kontak-kami');
Route::get('gallery', 'PagesController@gallery')->name('gallery');
Route::view('faq', 'faq')->name('faq');
Route::view('mitra', 'mitra')->name('mitra');
Route::get('mitra-kami', 'PagesController@mitraKami')->name('mitra-kami');

Route::get('mitra-register', 'Auth\RegisterController@mitra_register')->name('auth.mitra_register');



Route::get('widget/{widget_code}/{mitra_code?}', 'PagesController@widget')->name('widget');


Route::group(['middleware' => 'auth'], function(){
    Route::post('submit-akad-kredit', 'PagesController@submitAkadKredit')->name('submit-akad-kredit');
    Route::get('akad-kredit-success', 'PagesController@akadKreditSuccess')->name('akad-kredit-success');

    Route::get('pengajuan_pembiayaan_dana/json', 'PengajuanPembiayaanDanaController@json')->name('pengajuan_pembiayaan_dana.json');
    Route::resource('pengajuan_pembiayaan_dana', 'PengajuanPembiayaanDanaController');

    Route::get('pengajuan_pembiayaan_dana_mitra/json', 'PengajuanPembiayaanDanaMitraController@json')->name('pengajuan_pembiayaan_dana_mitra.json');
    Route::get('pengajuan_pembiayaan_dana_mitra/json_approved', 'PengajuanPembiayaanDanaMitraController@json_approved')->name('pengajuan_pembiayaan_dana_mitra.json_approved');
    Route::resource('pengajuan_pembiayaan_dana_mitra', 'PengajuanPembiayaanDanaMitraController', [
        'parameters' => [
            'pengajuan_pembiayaan_dana_mitra' => 'pengajuan_pembiayaan_dana'
        ]
    ]);

    Route::get('profile', 'PagesController@profile')->name('profile');
    Route::put('update-profile', 'PagesController@updateProfile')->name('update-profile');

    Route::get('mitra-request', 'PagesController@mitraRequest')->name('mitra-request');
    Route::post('submit-mitra-request', 'PagesController@submitMitraRequest')->name('submit-mitra-request');
    Route::get('mitra-request-success', 'PagesController@mitraRequestSucess')->name('mitra-request-success');


    Route::get('dashboard_user/index', 'DashboardUserController@index')->name('dashboard_user.index');
    Route::get('dashboard_user/dokumentasi_mitra', 'DashboardUserController@dokumentasi_mitra')->name('dashboard_user.dokumentasi_mitra');
    Route::get('dashboard_user/edit_profile', 'DashboardUserController@edit_profile')->name('dashboard_user.edit_profile');
    Route::put('dashboard_user/update_profile', 'DashboardUserController@update_profile')->name('dashboard_user.update_profile');

    Route::get('dashboard_user/edit_password', 'DashboardUserController@edit_password')->name('dashboard_user.edit_password');
    Route::put('dashboard_user/update_password', 'DashboardUserController@update_password')->name('dashboard_user.update_password');

    Route::get('dashboard_user/json_pengajuan_pembiayaan_dana', 'DashboardUserController@json_pengajuan_pembiayaan_dana')->name('dashboard_user.json_pengajuan_pembiayaan_dana');
    Route::get('dashboard_user/pengajuan_pembiayaan_dana', 'DashboardUserController@pengajuan_pembiayaan_dana')->name('dashboard_user.pengajuan_pembiayaan_dana');
    Route::get('dashboard_user/show_pengajuan_pembiayaan_dana/{pengajuan_pembiayaan_dana}', 'DashboardUserController@show_pengajuan_pembiayaan_dana')->name('dashboard_user.show_pengajuan_pembiayaan_dana');

    Route::get('dashboard_user/json_pengajuan_pembiayaan_dana_mitra/{status}', 'DashboardUserController@json_pengajuan_pembiayaan_dana_mitra')->name('dashboard_user.json_pengajuan_pembiayaan_dana_mitra');
    Route::get('dashboard_user/pengajuan_pembiayaan_dana_mitra', 'DashboardUserController@pengajuan_pembiayaan_dana_mitra')->name('dashboard_user.pengajuan_pembiayaan_dana_mitra');
    Route::get('dashboard_user/show_pengajuan_pembiayaan_dana_mitra/{pengajuan_pembiayaan_dana}', 'DashboardUserController@show_pengajuan_pembiayaan_dana_mitra')->name('dashboard_user.show_pengajuan_pembiayaan_dana_mitra');

    Route::post('dashboard_user/add_to_withdrawal_request', 'DashboardUserController@add_to_withdrawal_request')->name('dashboard_user.add_to_withdrawal_request');
    Route::post('dashboard_user/add_to_withdraw_cart', 'DashboardUserController@add_to_withdraw_cart')->name('dashboard_user.add_to_withdraw_cart');
    Route::post('dashboard_user/remove_from_withdrawal_request', 'DashboardUserController@remove_from_withdrawal_request')->name('dashboard_user.remove_from_withdrawal_request');
    Route::get('dashboard_user/json_withdraw_cart', 'DashboardUserController@json_withdraw_cart')->name('dashboard_user.json_withdraw_cart');
    Route::get('dashboard_user/json_withdraw_request', 'DashboardUserController@json_withdraw_request')->name('dashboard_user.json_withdraw_request');
    Route::get('dashboard_user/json_withdraw_request_detail/{withdraw}', 'DashboardUserController@json_withdraw_request_detail')->name('dashboard_user.json_withdraw_request_detail');

    Route::get('dashboard_user/withdraw_cart', 'DashboardUserController@withdraw_cart')->name('dashboard_user.withdraw_cart');
    
    Route::get('dashboard_user/withdraw_request', 'DashboardUserController@withdraw_request')->name('dashboard_user.withdraw_request');
    Route::get('dashboard_user/withdraw_request_detail/{withdraw}', 'DashboardUserController@withdraw_request_detail')->name('dashboard_user.withdraw_request_detail');
    Route::get('dashboard_user/submit_withdraw_request', 'DashboardUserController@submit_withdraw_request')->name('dashboard_user.submit_withdraw_request');
    
    Route::get('dashboard_user/get_widget', 'DashboardUserController@get_widget')->name('dashboard_user.get_widget');
    Route::get('dashboard_user/subscription_desktop_app', 'DashboardUserController@subscription_desktop_app')->name('dashboard_user.subscription_desktop_app');
    Route::post('dashboard_user/submit_subscription_desktop_app', 'DashboardUserController@submit_subscription_desktop_app')->name('dashboard_user.submit_subscription_desktop_app');
    Route::get('dashboard_user/cancel_subscription_desktop_app', 'DashboardUserController@cancel_subscription_desktop_app')->name('dashboard_user.cancel_subscription_desktop_app');
    Route::post('dashboard_user/verify_subscription_desktop_app', 'DashboardUserController@verify_subscription_desktop_app')->name('dashboard_user.verify_subscription_desktop_app');

    Route::get('dashboard_user/json_customer_mitra', 'DashboardUserController@json_customer_mitra')->name('dashboard_user.json_customer_mitra');
    Route::get('dashboard_user/customer_mitra', 'DashboardUserController@customer_mitra')->name('dashboard_user.customer_mitra');
    Route::get('dashboard_user/show_customer_mitra/{user}', 'DashboardUserController@show_customer_mitra')->name('dashboard_user.show_customer_mitra');
    
});

Route::get('pengajuan-online', 'PagesController@pengajuanOnline')->name('pengajuan-online');


Route::group(['middleware' => 'auth'], function(){
    Route::post('submit-pengajuan-online', 'PagesController@submitPengajuanOnline')->name('submit-pengajuan-online');
    Route::get('pengajuan-online-success', 'PagesController@pengajuanOnlineSuccess')->name('pengajuan-online-success');

    Route::get('pengajuan_kredit_motor/json', 'PengajuanKreditMotorController@json')->name('pengajuan_kredit_motor.json');
    Route::resource('pengajuan_kredit_motor', 'PengajuanKreditMotorController');
});


Route::get('beli-motor', 'PagesController@beliMotor')->name('beli-motor');
Route::get('detail-motor/{slug}', 'PagesController@detailMotor')->name('detail-motor');

Route::get('notifications', 'PagesController@notifications')->name('notifications');

Auth::routes();

Route::view('register/success', 'auth.user-register-success');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');

// User Kredit Motor
Route::get('/login/spv_kredit_motor', 'Auth\LoginController@showSpvKreditMotorLoginForm');
Route::post('/login/spv_kredit_motor', 'Auth\LoginController@spvKreditMotorLogin');

Route::get('/login/cs_kredit_motor', 'Auth\LoginController@showCsKreditMotorLoginForm');
Route::post('/login/cs_kredit_motor', 'Auth\LoginController@csKreditMotorLogin');


// User Pembiayaan Dana
Route::get('/login/manager_pembiayaan_dana', 'Auth\LoginController@showManagerPembiayaanDanaLoginForm');
Route::post('/login/manager_pembiayaan_dana', 'Auth\LoginController@managerPembiayaanDanaLogin');

Route::get('/login/spv_pembiayaan_dana', 'Auth\LoginController@showSpvPembiayaanDanaLoginForm');
Route::post('/login/spv_pembiayaan_dana', 'Auth\LoginController@spvPembiayaanDanaLogin');

Route::get('/login/cs_pembiayaan_dana', 'Auth\LoginController@showCsPembiayaanDanaLoginForm');
Route::post('/login/cs_pembiayaan_dana', 'Auth\LoginController@csPembiayaanDanaLogin');



Route::view('/home', 'home')->middleware('auth');



Route::group(['prefix' => 'onesignal', 'as' => 'onesignal.'], function(){
    Route::post('/user/sendUserId', function(){
        $user = auth()->user();
        $userId = request()->get('userId');
        $user->userId = $userId;
        $user->update();
        return $user;
    })->middleware('auth');

    Route::post('/cs_kredit_motor/sendUserId', function(){
        $user = auth()->guard('cs_kredit_motor')->user();
        $userId = request()->get('userId');
        $user->userId = $userId;
        $user->update();
        return $user;
    })->middleware('auth:cs_kredit_motor');

    Route::post('/spv_kredit_motor/sendUserId', function(){
        $user = auth()->guard('spv_kredit_motor')->user();
        $userId = request()->get('userId');
        $user->userId = $userId;
        $user->update();
        return $user;
    })->middleware('auth:spv_kredit_motor');

    Route::post('/cs_pembiayaan_dana/sendUserId', function(){
        $user = auth()->guard('cs_pembiayaan_dana')->user();
        $userId = request()->get('userId');
        $user->userId = $userId;
        $user->update();
        return $user;
    })->middleware('auth:cs_pembiayaan_dana');

    Route::post('/spv_pembiayaan_dana/sendUserId', function(){
        $user = auth()->guard('spv_pembiayaan_dana')->user();
        $userId = request()->get('userId');
        $user->userId = $userId;
        $user->update();
        return $user;
        
    })->middleware('auth:spv_pembiayaan_dana');

    Route::post('/manager_pembiayaan_dana/sendUserId', function(){
        $user = auth()->guard('manager_pembiayaan_dana')->user();
        $userId = request()->get('userId');
        $user->userId = $userId;
        $user->update();
        return $user;
        
    })->middleware('auth:manager_pembiayaan_dana');

    Route::post('/admin/sendUserId', function(){
        $user = auth()->guard('admin')->user();
        $userId = request()->get('userId');
        $user->userId = $userId;
        $user->update();
        return $user;
        
    })->middleware('auth:admin');
});

Route::get('test/onesignal/user', function(){
    $user = App\User::where('email', 'fakhrurrazi.andi@gmail.com')->first();
    OneSignal::sendNotificationToUser("Some Message", $user->userId, $url = null, $data = null);
});



Route::group(['prefix' => 'spv_kredit_motor', 'as' => 'spv_kredit_motor.', 'middleware' => 'auth:spv_kredit_motor'], function(){
    Route::get('/', 'SpvKreditMotorController@index')->name('index');
    Route::get('/edit_profile', 'SpvKreditMotorController@editProfile')->name('edit_profile');
    Route::put('/update_profile/{spv_kredit_motor}', 'SpvKreditMotorController@updateProfile')->name('update_profile');

    Route::get('/change_password', 'SpvKreditMotorController@changePassword')->name('change_password');
    Route::put('/update_password/{spv_kredit_motor}', 'SpvKreditMotorController@updatePassword')->name('update_password');
    Route::get('/notifications', 'SpvKreditMotorController@notifications')->name('notifications');
    Route::get('/read_notification/{notification}', 'SpvKreditMotorController@readNotification')->name('read_notification');

    
    Route::get('/json_pengajuan_kredit_motor', 'SpvKreditMotorController@json_pengajuan_kredit_motor')->name('json_pengajuan_kredit_motor');
    Route::get('/list_pengajuan_kredit_motor', 'SpvKreditMotorController@list_pengajuan_kredit_motor')->name('list_pengajuan_kredit_motor');
    Route::get('/pengajuan_kredit_motor/{pengajuan_kredit_motor}', 'SpvKreditMotorController@pengajuan_kredit_motor')->name('pengajuan_kredit_motor');
    Route::put('/process_pengajuan_kredit_motor/{pengajuan_kredit_motor}', 'SpvKreditMotorController@process_pengajuan_kredit_motor')->name('process_pengajuan_kredit_motor');
});

Route::group(['prefix' => 'cs_kredit_motor', 'as' => 'cs_kredit_motor.', 'middleware' => 'auth:cs_kredit_motor'], function(){
    Route::get('/', 'CsKreditMotorController@index')->name('index');
    Route::get('/edit_profile', 'CsKreditMotorController@editProfile')->name('edit_profile');
    Route::put('/update_profile/{cs_kredit_motor}', 'CsKreditMotorController@updateProfile')->name('update_profile');

    Route::get('/change_password', 'CsKreditMotorController@changePassword')->name('change_password');
    Route::put('/update_password/{cs_kredit_motor}', 'CsKreditMotorController@updatePassword')->name('update_password');
    Route::get('/notifications', 'CsKreditMotorController@notifications')->name('notifications');
    Route::get('/read_notification/{notification}', 'CsKreditMotorController@readNotification')->name('read_notification');

    
    Route::get('/json_pengajuan_kredit_motor', 'CsKreditMotorController@json_pengajuan_kredit_motor')->name('json_pengajuan_kredit_motor');
    Route::get('/list_pengajuan_kredit_motor', 'CsKreditMotorController@list_pengajuan_kredit_motor')->name('list_pengajuan_kredit_motor');
    Route::get('/pengajuan_kredit_motor/{pengajuan_kredit_motor}', 'CsKreditMotorController@pengajuan_kredit_motor')->name('pengajuan_kredit_motor');
    Route::put('/process_pengajuan_kredit_motor/{pengajuan_kredit_motor}', 'CsKreditMotorController@process_pengajuan_kredit_motor')->name('process_pengajuan_kredit_motor');
});



Route::group(['prefix' => 'manager_pembiayaan_dana', 'as' => 'manager_pembiayaan_dana.', 'middleware' => 'auth:manager_pembiayaan_dana'], function(){
    Route::get('/', 'ManagerPembiayaanDanaController@index')->name('index');
    Route::get('/edit_profile', 'ManagerPembiayaanDanaController@editProfile')->name('edit_profile');
    Route::put('/update_profile/{manager_pembiayaan_dana}', 'ManagerPembiayaanDanaController@updateProfile')->name('update_profile');

    Route::get('/change_password', 'ManagerPembiayaanDanaController@changePassword')->name('change_password');
    Route::put('/update_password/{manager_pembiayaan_dana}', 'ManagerPembiayaanDanaController@updatePassword')->name('update_password');
    Route::get('/notifications', 'ManagerPembiayaanDanaController@notifications')->name('notifications');
    Route::get('/read_notification/{notification}', 'ManagerPembiayaanDanaController@readNotification')->name('read_notification');

    
    Route::get('/json_pengajuan_pembiayaan_dana', 'ManagerPembiayaanDanaController@json_pengajuan_pembiayaan_dana')->name('json_pengajuan_pembiayaan_dana');
    Route::get('/list_pengajuan_pembiayaan_dana', 'ManagerPembiayaanDanaController@list_pengajuan_pembiayaan_dana')->name('list_pengajuan_pembiayaan_dana');
    Route::get('/pengajuan_pembiayaan_dana/{pengajuan_pembiayaan_dana}', 'ManagerPembiayaanDanaController@pengajuan_pembiayaan_dana')->name('pengajuan_pembiayaan_dana');
    Route::put('/process_pengajuan_pembiayaan_dana/{pengajuan_pembiayaan_dana}', 'ManagerPembiayaanDanaController@process_pengajuan_pembiayaan_dana')->name('process_pengajuan_pembiayaan_dana');
});


Route::group(['prefix' => 'spv_pembiayaan_dana', 'as' => 'spv_pembiayaan_dana.', 'middleware' => 'auth:spv_pembiayaan_dana'], function(){
    Route::get('/', 'SpvPembiayaanDanaController@index')->name('index');
    Route::get('/edit_profile', 'SpvPembiayaanDanaController@editProfile')->name('edit_profile');
    Route::put('/update_profile/{spv_pembiayaan_dana}', 'SpvPembiayaanDanaController@updateProfile')->name('update_profile');

    // Route::get('/change_password', 'SpvPembiayaanDanaController@changePassword')->name('change_password');
    // Route::put('/update_password/{spv_pembiayaan_dana}', 'SpvPembiayaanDanaController@updatePassword')->name('update_password');
    Route::get('/notifications', 'SpvPembiayaanDanaController@notifications')->name('notifications');
    Route::get('/read_notification/{notification}', 'SpvPembiayaanDanaController@readNotification')->name('read_notification');

    
    Route::get('/json_pengajuan_pembiayaan_dana', 'SpvPembiayaanDanaController@json_pengajuan_pembiayaan_dana')->name('json_pengajuan_pembiayaan_dana');
    Route::get('/list_pengajuan_pembiayaan_dana', 'SpvPembiayaanDanaController@list_pengajuan_pembiayaan_dana')->name('list_pengajuan_pembiayaan_dana');
    Route::get('/pengajuan_pembiayaan_dana/{pengajuan_pembiayaan_dana}', 'SpvPembiayaanDanaController@pengajuan_pembiayaan_dana')->name('pengajuan_pembiayaan_dana');
    Route::put('/process_pengajuan_pembiayaan_dana/{pengajuan_pembiayaan_dana}', 'SpvPembiayaanDanaController@process_pengajuan_pembiayaan_dana')->name('process_pengajuan_pembiayaan_dana');
});


Route::group(['prefix' => 'cs_pembiayaan_dana', 'as' => 'cs_pembiayaan_dana.', 'middleware' => 'auth:cs_pembiayaan_dana'], function(){
    Route::get('/', 'CsPembiayaanDanaController@index')->name('index');
    Route::get('/edit_profile', 'CsPembiayaanDanaController@editProfile')->name('edit_profile');
    Route::put('/update_profile/{cs_pembiayaan_dana}', 'CsPembiayaanDanaController@updateProfile')->name('update_profile');

    Route::get('/change_password', 'CsPembiayaanDanaController@changePassword')->name('change_password');
    Route::put('/update_password/{cs_pembiayaan_dana}', 'CsPembiayaanDanaController@updatePassword')->name('update_password');
    Route::get('/notifications', 'CsPembiayaanDanaController@notifications')->name('notifications');
    Route::get('/read_notification/{notification}', 'CsPembiayaanDanaController@readNotification')->name('read_notification');

    
    Route::get('/json_pengajuan_pembiayaan_dana', 'CsPembiayaanDanaController@json_pengajuan_pembiayaan_dana')->name('json_pengajuan_pembiayaan_dana');
    Route::get('/list_pengajuan_pembiayaan_dana', 'CsPembiayaanDanaController@list_pengajuan_pembiayaan_dana')->name('list_pengajuan_pembiayaan_dana');
    Route::get('/pengajuan_pembiayaan_dana/{pengajuan_pembiayaan_dana}', 'CsPembiayaanDanaController@pengajuan_pembiayaan_dana')->name('pengajuan_pembiayaan_dana');
    Route::put('/process_pengajuan_pembiayaan_dana/{pengajuan_pembiayaan_dana}', 'CsPembiayaanDanaController@process_pengajuan_pembiayaan_dana')->name('process_pengajuan_pembiayaan_dana');
});





Route::group(['prefix' => 'admin', 'as'=>'admin.', 'middleware' => 'auth:admin'], function(){

    Route::get('/', function(){
        return redirect()->route('admin.dashboard');
    });

    Route::view('firebase_auth', 'admin.firebase-auth');

    Route::get('notifications/json', 'Admin\NotificationController@json')->name('notification.json');
    Route::get('notifications', 'Admin\NotificationController@notifications')->name('notification.notifications');
    Route::get('notifications/remove/{id}', 'Admin\NotificationController@remove');

    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('change_password', 'Admin\DashboardController@changePassword')->name('change_password');
    Route::put('update_password', 'Admin\DashboardController@updatePassword')->name('update_password');

    Route::get('edit_profile', 'Admin\DashboardController@editProfile')->name('edit_profile');
    Route::put('update_profile', 'Admin\DashboardController@updateProfile')->name('update_profile');
    
    Route::get('user/json', 'Admin\UserController@json')->name('user.json');
    Route::get('user/{user}/manage_role', 'Admin\UserController@manageRole')->name('user.manage_role');
    Route::put('user/{user}/update_role', 'Admin\UserController@updateRole')->name('user.update_role');
    Route::get('user/{user}/change_password', 'Admin\UserController@changePassword')->name('user.change_password');
    Route::put('user/{user}/update_password', 'Admin\UserController@updatePassword')->name('user.update_password');

    Route::get('user/report_form', 'Admin\UserController@report_form')->name('user.report_form');
    Route::get('user/report_pdf', 'Admin\UserController@report_pdf')->name('user.report_pdf');

    Route::resource('user', 'Admin\UserController');




    Route::get('request_mitra/json', 'Admin\RequestMitraController@json')->name('request_mitra.json');
    Route::get('request_mitra', 'Admin\RequestMitraController@index')->name('request_mitra.index');
    Route::get('request_mitra/{user}/edit', 'Admin\RequestMitraController@edit')->name('request_mitra.edit');
    Route::put('request_mitra/{user}', 'Admin\RequestMitraController@update')->name('request_mitra.update');
    Route::get('request_mitra/report_form', 'Admin\RequestMitraController@report_form')->name('request_mitra.report_form');
    Route::get('request_mitra/report_pdf', 'Admin\RequestMitraController@report_pdf')->name('request_mitra.report_pdf');
    // Route::resource('request_mitra', 'Admin\RequestMitraController');

    Route::get('request_withdraw/json', 'Admin\RequestWithdrawController@json')->name('request_withdraw.json');
    Route::get('request_withdraw', 'Admin\RequestWithdrawController@index')->name('request_withdraw.index');
    Route::get('request_withdraw/{withdraw}/edit', 'Admin\RequestWithdrawController@edit')->name('request_withdraw.edit');
    Route::put('request_withdraw/{withdraw}', 'Admin\RequestWithdrawController@update')->name('request_withdraw.update');
    Route::get('request_withdraw/report_form', 'Admin\RequestWithdrawController@report_form')->name('request_withdraw.report_form');
    Route::get('request_withdraw/report_pdf', 'Admin\RequestWithdrawController@report_pdf')->name('request_withdraw.report_pdf');

    Route::get('subscription_desktop_app/json', 'Admin\SubscriptionDesktopAppController@json')->name('subscription_desktop_app.json');
    Route::get('subscription_desktop_app', 'Admin\SubscriptionDesktopAppController@index')->name('subscription_desktop_app.index');
    Route::get('subscription_desktop_app/{subscription_desktop_app}/edit', 'Admin\SubscriptionDesktopAppController@edit')->name('subscription_desktop_app.edit');
    Route::put('subscription_desktop_app/{subscription_desktop_app}', 'Admin\SubscriptionDesktopAppController@update')->name('subscription_desktop_app.update');
    Route::get('subscription_desktop_app/report_form', 'Admin\SubscriptionDesktopAppController@report_form')->name('subscription_desktop_app.report_form');
    Route::get('subscription_desktop_app/report_pdf', 'Admin\SubscriptionDesktopAppController@report_pdf')->name('subscription_desktop_app.report_pdf');

    Route::get('cs_kredit_motor/json', 'Admin\CsKreditMotorController@json')->name('cs_kredit_motor.json');
    Route::get('cs_kredit_motor/{cs_kredit_motor}/change_password', 'Admin\CsKreditMotorController@changePassword')->name('cs_kredit_motor.change_password');
    Route::put('cs_kredit_motor/{cs_kredit_motor}/update_password', 'Admin\CsKreditMotorController@updatePassword')->name('cs_kredit_motor.update_password');
    Route::resource('cs_kredit_motor', 'Admin\CsKreditMotorController');

    Route::get('cs_pembiayaan_dana/json', 'Admin\CsPembiayaanDanaController@json')->name('cs_pembiayaan_dana.json');
    Route::get('cs_pembiayaan_dana/{cs_pembiayaan_dana}/change_password', 'Admin\CsPembiayaanDanaController@changePassword')->name('cs_pembiayaan_dana.change_password');
    Route::put('cs_pembiayaan_dana/{cs_pembiayaan_dana}/update_password', 'Admin\CsPembiayaanDanaController@updatePassword')->name('cs_pembiayaan_dana.update_password');
    Route::resource('cs_pembiayaan_dana', 'Admin\CsPembiayaanDanaController');

    Route::get('spv_kredit_motor/json', 'Admin\SpvKreditMotorController@json')->name('spv_kredit_motor.json');
    Route::get('spv_kredit_motor/{spv_kredit_motor}/change_password', 'Admin\SpvKreditMotorController@changePassword')->name('spv_kredit_motor.change_password');
    Route::put('spv_kredit_motor/{spv_kredit_motor}/update_password', 'Admin\SpvKreditMotorController@updatePassword')->name('spv_kredit_motor.update_password');
    Route::resource('spv_kredit_motor', 'Admin\SpvKreditMotorController');

    Route::get('manager_pembiayaan_dana/json', 'Admin\ManagerPembiayaanDanaController@json')->name('manager_pembiayaan_dana.json');
    Route::get('manager_pembiayaan_dana/{manager_pembiayaan_dana}/change_password', 'Admin\ManagerPembiayaanDanaController@changePassword')->name('manager_pembiayaan_dana.change_password');
    Route::put('manager_pembiayaan_dana/{manager_pembiayaan_dana}/update_password', 'Admin\ManagerPembiayaanDanaController@updatePassword')->name('manager_pembiayaan_dana.update_password');
    Route::resource('manager_pembiayaan_dana', 'Admin\ManagerPembiayaanDanaController');

    Route::get('spv_pembiayaan_dana/json', 'Admin\SpvPembiayaanDanaController@json')->name('spv_pembiayaan_dana.json');
    Route::get('spv_pembiayaan_dana/{spv_pembiayaan_dana}/change_password', 'Admin\SpvPembiayaanDanaController@changePassword')->name('spv_pembiayaan_dana.change_password');
    Route::put('spv_pembiayaan_dana/{spv_pembiayaan_dana}/update_password', 'Admin\SpvPembiayaanDanaController@updatePassword')->name('spv_pembiayaan_dana.update_password');
    Route::get('spv_pembiayaan_dana/report_form', 'Admin\SpvPembiayaanDanaController@report_form')->name('spv_pembiayaan_dana.report_form');
    Route::get('spv_pembiayaan_dana/report_pdf', 'Admin\SpvPembiayaanDanaController@report_pdf')->name('spv_pembiayaan_dana.report_pdf');
    Route::resource('spv_pembiayaan_dana', 'Admin\SpvPembiayaanDanaController');

    Route::get('role/json', 'Admin\RoleController@json')->name('role.json');
    Route::get('role/{role}/manage_permission', 'Admin\RoleController@managePermission')->name('user.manage_permission');
    Route::put('role/{role}/update_permission', 'Admin\RoleController@updatePermission')->name('role.update_permission');
    Route::resource('role', 'Admin\RoleController');

    Route::get('permission/json', 'Admin\PermissionController@json')->name('permission.json');
    Route::resource('permission', 'Admin\PermissionController');

    Route::get('pengajuan_pembiayaan_dana/export_pdf', 'Admin\PengajuanPembiayaanDanaController@export_pdf')->name('pengajuan_pembiayaan_dana.export_pdf');
    Route::get('pengajuan_pembiayaan_dana/json', 'Admin\PengajuanPembiayaanDanaController@json')->name('pengajuan_pembiayaan_dana.json');
    Route::resource('pengajuan_pembiayaan_dana', 'Admin\PengajuanPembiayaanDanaController');
    
    Route::get('pengajuan_kredit_motor/export_pdf', 'Admin\PengajuanKreditMotorController@export_pdf')->name('pengajuan_kredit_motor.export_pdf');
    Route::get('pengajuan_kredit_motor/json', 'Admin\PengajuanKreditMotorController@json')->name('pengajuan_kredit_motor.json');
    Route::resource('pengajuan_kredit_motor', 'Admin\PengajuanKreditMotorController');
    

    Route::get('pabrikan_motor/json', 'Admin\PabrikanMotorController@json')->name('pabrikan_motor.json');
    Route::resource('pabrikan_motor', 'Admin\PabrikanMotorController');

    Route::get('type_motor/json', 'Admin\TypeMotorController@json')->name('type_motor.json');
    Route::resource('type_motor', 'Admin\TypeMotorController');

    Route::get('type_konsumen_pembiayaan_dana/json', 'Admin\TypeKonsumenPembiayaanDanaController@json')->name('type_konsumen_pembiayaan_dana.json');
    Route::resource('type_konsumen_pembiayaan_dana', 'Admin\TypeKonsumenPembiayaanDanaController');


    Route::get('status_rumah/json', 'Admin\StatusRumahController@json')->name('status_rumah.json');
    Route::resource('status_rumah', 'Admin\StatusRumahController');

    Route::get('status_stnk/json', 'Admin\StatusStnkController@json')->name('status_stnk.json');
    Route::resource('status_stnk', 'Admin\StatusStnkController');

    Route::get('status_bpkb/json', 'Admin\StatusBpkbController@json')->name('status_bpkb.json');
    Route::resource('status_bpkb', 'Admin\StatusBpkbController');

    Route::get('warna_motor/json', 'Admin\WarnaMotorController@json')->name('warna_motor.json');
    Route::resource('warna_motor', 'Admin\WarnaMotorController');

    Route::get('contact_message/json', 'Admin\ContactMessageController@json')->name('contact_message.json');
    Route::resource('contact_message', 'Admin\ContactMessageController');

    Route::get('testimoni_gallery/json', 'Admin\TestimoniGalleryController@json')->name('testimoni_gallery.json');
    Route::resource('testimoni_gallery', 'Admin\TestimoniGalleryController');

    Route::get('kapasitas_mesin/json', 'Admin\KapasitasMesinController@json')->name('kapasitas_mesin.json');
    Route::resource('kapasitas_mesin', 'Admin\KapasitasMesinController');

    Route::get('jenis_transmisi/json', 'Admin\JenisTransmisiController@json')->name('jenis_transmisi.json');
    Route::resource('jenis_transmisi', 'Admin\JenisTransmisiController');

    Route::get('kategori_spesifikasi/json', 'Admin\KategoriSpesifikasiController@json')->name('kategori_spesifikasi.json');
    Route::resource('kategori_spesifikasi', 'Admin\KategoriSpesifikasiController');

    Route::get('jenis_pembakaran/json', 'Admin\JenisPembakaranController@json')->name('jenis_pembakaran.json');
    Route::resource('jenis_pembakaran', 'Admin\JenisPembakaranController');

    Route::get('content_variable/json', 'Admin\ContentVariableController@json')->name('content_variable.json');
    Route::resource('content_variable', 'Admin\ContentVariableController');

    Route::get('faq/json', 'Admin\FaqController@json')->name('faq.json');
    Route::resource('faq', 'Admin\FaqController');

    Route::get('tempo_angsuran_motor/json', 'Admin\TempoAngsuranMotorController@json')->name('tempo_angsuran_motor.json');
    Route::resource('tempo_angsuran_motor', 'Admin\TempoAngsuranMotorController');

    Route::get('tempo_angsuran_pembiayaan_dana/json', 'Admin\TempoAngsuranPembiayaanDanaController@json')->name('tempo_angsuran_pembiayaan_dana.json');
    Route::resource('tempo_angsuran_pembiayaan_dana', 'Admin\TempoAngsuranPembiayaanDanaController');

    Route::get('wilayah/json', 'Admin\WilayahController@json')->name('wilayah.json');
    Route::resource('wilayah', 'Admin\WilayahController');

    Route::get('wilayah_kredit_motor/json', 'Admin\WilayahKreditMotorController@json')->name('wilayah_kredit_motor.json');
    Route::resource('wilayah_kredit_motor', 'Admin\WilayahKreditMotorController');

    Route::get('wilayah_pembiayaan_dana/json', 'Admin\WilayahPembiayaanDanaController@json')->name('wilayah_pembiayaan_dana.json');
    Route::resource('wilayah_pembiayaan_dana', 'Admin\WilayahPembiayaanDanaController');

    Route::get('motor/json', 'Admin\MotorController@json')->name('motor.json');
    Route::resource('motor', 'Admin\MotorController');

    Route::get('motor_pembiayaan_dana/json', 'Admin\MotorPembiayaanDanaController@json')->name('motor_pembiayaan_dana.json');
    Route::resource('motor_pembiayaan_dana', 'Admin\MotorPembiayaanDanaController');

    Route::get('photo_motor/json/{motor}', 'Admin\PhotoMotorController@json')->name('photo_motor.json');
    Route::get('photo_motor/{motor}', 'Admin\PhotoMotorController@index')->name('photo_motor.index');
    Route::get('photo_motor/create/{motor}', 'Admin\PhotoMotorController@create')->name('photo_motor.create');
    Route::post('photo_motor/{motor}', 'Admin\PhotoMotorController@store')->name('photo_motor.store');
    Route::delete('photo_motor/{photo_motor}', 'Admin\PhotoMotorController@destroy')->name('photo_motor.destroy');
    // Route::resource('photo_motor', 'Admin\MotorController')->only(['create']);

    Route::get('angsuran_motor/json/{motor}', 'Admin\AngsuranMotorController@json')->name('angsuran_motor.json');
    Route::get('angsuran_motor/{motor}', 'Admin\AngsuranMotorController@index')->name('angsuran_motor.index');
    Route::get('angsuran_motor/create/{motor}', 'Admin\AngsuranMotorController@create')->name('angsuran_motor.create');
    Route::post('angsuran_motor/{motor}', 'Admin\AngsuranMotorController@store')->name('angsuran_motor.store');
    Route::get('angsuran_motor/{angsuran_motor}/edit', 'Admin\AngsuranMotorController@edit')->name('angsuran_motor.edit');
    Route::put('angsuran_motor/{angsuran_motor}', 'Admin\AngsuranMotorController@update')->name('angsuran_motor.update');
    Route::delete('angsuran_motor/{angsuran_motor}', 'Admin\AngsuranMotorController@destroy')->name('angsuran_motor.destroy');

    Route::get('angsuran_pembiayaan_dana/json', 'Admin\AngsuranPembiayaanDanaController@json')->name('angsuran_pembiayaan_dana.json');
    Route::resource('angsuran_pembiayaan_dana', 'Admin\AngsuranPembiayaanDanaController');

    // Route::get('angsuran_pembiayaan_dana/json/{motor_pembiayaan_dana}', 'Admin\AngsuranPembiayaanDanaController@json')->name('angsuran_pembiayaan_dana.json');
    // Route::get('angsuran_pembiayaan_dana/{motor_pembiayaan_dana}', 'Admin\AngsuranPembiayaanDanaController@index')->name('angsuran_pembiayaan_dana.index');
    // Route::get('angsuran_pembiayaan_dana/create/{motor_pembiayaan_dana}', 'Admin\AngsuranPembiayaanDanaController@create')->name('angsuran_pembiayaan_dana.create');
    // Route::post('angsuran_pembiayaan_dana/{motor_pembiayaan_dana}', 'Admin\AngsuranPembiayaanDanaController@store')->name('angsuran_pembiayaan_dana.store');
    // Route::get('angsuran_pembiayaan_dana/{angsuran_pembiayaan_dana}/edit', 'Admin\AngsuranPembiayaanDanaController@edit')->name('angsuran_pembiayaan_dana.edit');
    // Route::put('angsuran_pembiayaan_dana/{angsuran_pembiayaan_dana}', 'Admin\AngsuranPembiayaanDanaController@update')->name('angsuran_pembiayaan_dana.update');
    // Route::delete('angsuran_pembiayaan_dana/{angsuran_pembiayaan_dana}', 'Admin\AngsuranPembiayaanDanaController@destroy')->name('angsuran_pembiayaan_dana.destroy');


    Route::get('testimoni_motor/json/{motor}', 'Admin\TestimoniMotorController@json')->name('testimoni_motor.json');
    Route::get('testimoni_motor/{motor}', 'Admin\TestimoniMotorController@index')->name('testimoni_motor.index');
    Route::get('testimoni_motor/create/{motor}', 'Admin\TestimoniMotorController@create')->name('testimoni_motor.create');
    Route::post('testimoni_motor/{motor}', 'Admin\TestimoniMotorController@store')->name('testimoni_motor.store');
    Route::get('testimoni_motor/{testimoni_motor}/edit', 'Admin\TestimoniMotorController@edit')->name('testimoni_motor.edit');
    Route::put('testimoni_motor/{testimoni_motor}', 'Admin\TestimoniMotorController@update')->name('testimoni_motor.update');
    Route::delete('testimoni_motor/{testimoni_motor}', 'Admin\TestimoniMotorController@destroy')->name('testimoni_motor.destroy');


    Route::get('spesifikasi_motor/json/{motor}', 'Admin\SpesifikasiMotorController@json')->name('spesifikasi_motor.json');
    Route::get('spesifikasi_motor/{motor}', 'Admin\SpesifikasiMotorController@index')->name('spesifikasi_motor.index');
    Route::get('spesifikasi_motor/create/{motor}', 'Admin\SpesifikasiMotorController@create')->name('spesifikasi_motor.create');
    Route::post('spesifikasi_motor/{motor}', 'Admin\SpesifikasiMotorController@store')->name('spesifikasi_motor.store');
    Route::get('spesifikasi_motor/{spesifikasi_motor}/edit', 'Admin\SpesifikasiMotorController@edit')->name('spesifikasi_motor.edit');
    Route::put('spesifikasi_motor/{spesifikasi_motor}', 'Admin\SpesifikasiMotorController@update')->name('spesifikasi_motor.update');
    Route::delete('spesifikasi_motor/{spesifikasi_motor}', 'Admin\SpesifikasiMotorController@destroy')->name('spesifikasi_motor.destroy');
});



