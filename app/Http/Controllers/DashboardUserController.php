<?php

namespace App\Http\Controllers;

use App\User;
use App\Withdraw;
use App\WithdrawCart;
use App\WithdrawDetail;
use Illuminate\Http\Request;
use App\SubscriptionDesktopApp;
use App\PengajuanPembiayaanDana;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardUserController extends Controller
{

    public function dokumentasi_mitra()
    {
        return view('dashboard_user.dokumentasi_mitra');
    }

    public function index()
    {
        // return auth()->user();
        return view('dashboard_user.index');
    }

    public function edit_profile()
    {
        return view('dashboard_user.edit_profile');
    }

    public function update_profile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'. $user->id],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no_handphone_1' => ['required'],
            // 'no_handphone_2' => ['required'],
            'jenis_identitas' => ['required'],
            'no_identitas' => ['required'],
            // 'kota' => ['required'],
            'alamat' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'province_id' => ['required'],
            'city_id' => ['required'],
            'district_id' => ['required'],
        ]);

        $data = [
            'name' => $request->get('name'), 
            'email' => $request->get('email'), 
            // 'password' => $request->get('password'),
            'no_handphone_1' => $request->get('no_handphone_1'),
            'no_handphone_2' => $request->get('no_handphone_2'),
            'jenis_identitas' => $request->get('jenis_identitas'),
            'no_identitas' => $request->get('no_identitas'),
            'alamat' => $request->get('alamat'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'province_id' => $request->get('province_id'),
            'city_id' => $request->get('city_id'),
            'district_id' => $request->get('district_id'),
            // 'village_id' => $request->get('village_id'),
            // 'userId' => $request->get('userId'),
            // 'mitra_status' => $request->get('mitra_status'),
            // 'upline_mitra_id' => $request->get('upline_mitra_id'),
            'nama_bank' => $request->get('nama_bank'),
            'no_rekening_bank' => $request->get('no_rekening_bank'),
            // 'photo' => $request->get('photo'),
            // 'mitra_code' => $request->get('mitra_code'),
        ];

        if($request->hasFile('photo')){

            $photo = $request->file('photo');
            Storage::disk('public')->put($photo->getClientOriginalName(), File::get($photo));
            
            $data['photo'] = $photo->getClientOriginalName();
        }

        // return $data;

        $user = User::find($user->id);

        $user->update($data);

        return redirect()->route('dashboard_user.index')->with('status', true);
    }

    public function edit_password()
    {
        // dd([
        //     auth()->user()->password,
        //     sha1('jikajikajika3')
        // ]);
        return view('dashboard_user.edit_password');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'old_password' => ['required', function($attribute, $value, $fail){
                // $hash_old_password = Hash::make($value);
                // if(auth()->user()->password == $hash_old_password){
                //     $fail($attribute. ' is invalid');
                // }

                if(!Hash::check($value, auth()->user()->password)){
                    $fail($attribute. ' is invalid');
                }
            }],
            'new_password' => ['required', 'confirmed'],
        ]);

        $user = Auth::user();

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('dashboard_user.edit_password')->with('status', true);
    }

    public function json_pengajuan_pembiayaan_dana(Request $request)
    {
        $limit = $request->filled('limit') ? $request->get('limit') : 10;
        $offset = $request->filled('offset') ? $request->get('offset') : 0;
        $search = $request->filled('search') ? $request->get('search') : '';
        $sort = $request->filled('sort') ? $request->get('sort') : 'id';
        $order = $request->filled('order') ? $request->get('order') : 'ASC';
        
        $pengajuan_pembiayaan_dana = PengajuanPembiayaanDana::with([
            'wilayah_pembiayaan_dana',
            'tempo_angsuran_pembiayaan_dana',
            'motor_pembiayaan_dana',
            'status_stnk',
            'status_bpkb',
            'status_rumah',

        ])->where('user_id', auth()->user()->id)->search($search);
        $data['total'] = $pengajuan_pembiayaan_dana->count();


        $pengajuan_pembiayaan_dana->skip($offset);
        $pengajuan_pembiayaan_dana->limit($limit);
        $pengajuan_pembiayaan_dana->orderBy($sort, $order);

        $data['rows'] = $pengajuan_pembiayaan_dana->get();

        return $data;
    
    }

    public function pengajuan_pembiayaan_dana()
    {
        return view('dashboard_user.pengajuan_pembiayaan_dana');
    }
    

    public function show_pengajuan_pembiayaan_dana(PengajuanPembiayaanDana $pengajuan_pembiayaan_dana)
    {
        return view('dashboard_user.show_pengajuan_pembiayaan_dana', compact('pengajuan_pembiayaan_dana'));
    }


    public function json_pengajuan_pembiayaan_dana_mitra(Request $request, $status = 'approved')
    {
        $limit = $request->filled('limit') ? $request->get('limit') : 10;
        $offset = $request->filled('offset') ? $request->get('offset') : 0;
        $search = $request->filled('search') ? $request->get('search') : '';
        $sort = $request->filled('sort') ? $request->get('sort') : 'id';
        $order = $request->filled('order') ? $request->get('order') : 'ASC';

        if($status == 'pending'){
            $pengajuan_pembiayaan_dana = PengajuanPembiayaanDana::with([
                'wilayah_pembiayaan_dana',
                'tempo_angsuran_pembiayaan_dana',
                'motor_pembiayaan_dana',
                'status_stnk',
                'status_bpkb',
                'status_rumah',
                'user',
                'withdraw_cart'
            ])->whereRaw(" 
                mitra_id = ". auth()->user()->id ." AND 
                (
                    CASE
                        WHEN cs_pembiayaan_dana_status = 'denied' THEN 'Denied'
                        WHEN cs_pembiayaan_dana_status = 'approved' THEN 
                            CASE 
                                WHEN spv_pembiayaan_dana_status = 'denied' THEN 'Denied'
                                WHEN spv_pembiayaan_dana_status = 'approved' THEN 'Approved'
                                ELSE 'Pending'
                            END
                        ELSE 'Pending'
                    END
                ) = 'Pending'
            ")->search($search);
        }

        if($status == 'denied'){
            $pengajuan_pembiayaan_dana = PengajuanPembiayaanDana::with([
                'wilayah_pembiayaan_dana',
                'tempo_angsuran_pembiayaan_dana',
                'motor_pembiayaan_dana',
                'status_stnk',
                'status_bpkb',
                'status_rumah',
                'user',
                'withdraw_cart'
            ])->whereRaw(" 
                mitra_id = ". auth()->user()->id ." AND 
                (
                    CASE
                        WHEN cs_pembiayaan_dana_status = 'denied' THEN 'Denied'
                        WHEN cs_pembiayaan_dana_status = 'approved' THEN 
                            CASE 
                                WHEN spv_pembiayaan_dana_status = 'denied' THEN 'Denied'
                                WHEN spv_pembiayaan_dana_status = 'approved' THEN 'Approved'
                                ELSE 'Pending'
                            END
                        ELSE 'Pending'
                    END
                ) = 'Denied'
            ")->search($search);
        }
        
        if($status == 'approved'){
            $pengajuan_pembiayaan_dana = PengajuanPembiayaanDana::with([
                'wilayah_pembiayaan_dana',
                'tempo_angsuran_pembiayaan_dana',
                'motor_pembiayaan_dana',
                'status_stnk',
                'status_bpkb',
                'status_rumah',
                'user',
                'withdraw_cart'
            ])->whereRaw(" 
                mitra_id = ". auth()->user()->id ." AND 
                (
                    CASE
                        WHEN cs_pembiayaan_dana_status = 'denied' THEN 'Denied'
                        WHEN cs_pembiayaan_dana_status = 'approved' THEN 
                            CASE 
                                WHEN spv_pembiayaan_dana_status = 'denied' THEN 'Denied'
                                WHEN spv_pembiayaan_dana_status = 'approved' THEN 'Approved'
                                ELSE 'Pending'
                            END
                        ELSE 'Pending'
                    END
                ) = 'Approved'
            ")->search($search);
        }


        

        


        

        $data['total'] = $pengajuan_pembiayaan_dana->count();


        $pengajuan_pembiayaan_dana->skip($offset);
        $pengajuan_pembiayaan_dana->limit($limit);
        $pengajuan_pembiayaan_dana->orderBy($sort, $order);

        $data['rows'] = $pengajuan_pembiayaan_dana->get();

        return $data;
    
    }

    public function pengajuan_pembiayaan_dana_mitra()
    {
        return view('dashboard_user.pengajuan_pembiayaan_dana_mitra');
    }
    

    public function show_pengajuan_pembiayaan_dana_mitra(PengajuanPembiayaanDana $pengajuan_pembiayaan_dana)
    {
        
        return view('dashboard_user.show_pengajuan_pembiayaan_dana_mitra', compact('pengajuan_pembiayaan_dana'));
    }

    public function json_withdraw_cart(Request $request)
    {
        $user = Auth::user();

        $limit = $request->filled('limit') ? $request->get('limit') : 10;
        $offset = $request->filled('offset') ? $request->get('offset') : 0;
        $search = $request->filled('search') ? $request->get('search') : '';
        $sort = $request->filled('sort') ? $request->get('sort') : 'id';
        $order = $request->filled('order') ? $request->get('order') : 'DESC';

        $withdraw_carts = WithdrawCart::whereHas('pengajuan_pembiayaan_dana')->with([
            'user',
            'pengajuan_pembiayaan_dana'
        ])->where([
            ['user_id', '=', $user->id]
        ])->search($search);

        $data['total'] = $withdraw_carts->count();


        $withdraw_carts->skip($offset);
        $withdraw_carts->limit($limit);
        $withdraw_carts->orderBy($sort, $order);

        $data['rows'] = $withdraw_carts->get();

        return $data;
    }

    public function json_withdraw_request(Request $request)
    {
        $user = Auth::user();

        $limit = $request->filled('limit') ? $request->get('limit') : 10;
        $offset = $request->filled('offset') ? $request->get('offset') : 0;
        $search = $request->filled('search') ? $request->get('search') : '';
        $sort = $request->filled('sort') ? $request->get('sort') : 'id';
        $order = $request->filled('order') ? $request->get('order') : 'DESC';

        $withdraw = Withdraw::with([
            'user',
            'withdraw_detail'
        ])->where([
            ['user_id', '=', $user->id]
        ])->search($search);

        $data['total'] = $withdraw->count();


        $withdraw->skip($offset);
        $withdraw->limit($limit);
        $withdraw->orderBy($sort, $order);

        $data['rows'] = $withdraw->get();

        return $data;
    }

    public function json_withdraw_request_detail(Request $request, Withdraw $withdraw)
    {
        
        $limit = $request->filled('limit') ? $request->get('limit') : 10;
        $offset = $request->filled('offset') ? $request->get('offset') : 0;
        $search = $request->filled('search') ? $request->get('search') : '';
        $sort = $request->filled('sort') ? $request->get('sort') : 'id';
        $order = $request->filled('order') ? $request->get('order') : 'DESC';

        
        $withdraw_detail = WithdrawDetail::whereHas('pengajuan_pembiayaan_dana')->with([
            'pengajuan_pembiayaan_dana'
        ])->where([
            ['withdraw_id', '=', $withdraw->id]
        ])->search($search);
        // $pengajuan_pembiayaan_dana = PengajuanPembiayaanDana::whereHas('withdraw_detail')->with([
        //     'wilayah_pembiayaan_dana',
        //     'tempo_angsuran_pembiayaan_dana',
        //     'motor_pembiayaan_dana',
        //     'status_stnk',
        //     'status_bpkb',
        //     'status_rumah',
        //     'user',
        //     'withdraw_detail'
        // ])->whereRaw(" 
        //     mitra_id = ". auth()->user()->id ." AND 
        //     (
        //         CASE
        //             WHEN cs_pembiayaan_dana_status = 'denied' THEN 'Denied'
        //             WHEN cs_pembiayaan_dana_status = 'approved' THEN 
        //                 CASE 
        //                     WHEN spv_pembiayaan_dana_status = 'denied' THEN 'Denied'
        //                     WHEN spv_pembiayaan_dana_status = 'approved' THEN 'Approved'
        //                     ELSE 'Pending'
        //                 END
        //             ELSE 'Pending'
        //         END
        //     ) = 'Approved'
        // ")->search($search);
        

        $data['total'] = $withdraw_detail->count();


        $withdraw_detail->skip($offset);
        $withdraw_detail->limit($limit);
        $withdraw_detail->orderBy($sort, $order);

        $data['rows'] = $withdraw_detail->get();

        return $data;
    
    }

    public function withdraw_cart()
    {

        $user = Auth::user();
        
        $withdraw_carts = WithdrawCart::whereHas('pengajuan_pembiayaan_dana')->get();

        return view('dashboard_user.withdraw_cart', compact('withdraw_carts'));
    }

    public function withdraw_request_detail(Withdraw $withdraw)
    {
        return view('dashboard_user.withdraw_request_detail', compact('withdraw'));
    }

    public function submit_withdraw_request(Request $request)
    {
    
        
        $user = Auth::user();

        $withdraw_carts = WithdrawCart::where([
            ['user_id', '=', $user->id]
        ])->get();

        $withdraw = Withdraw::create([
            'user_id' => $user->id,
            'status' => 1
        ]);

        foreach($withdraw_carts as $withdraw_cart){
            WithdrawDetail::create([
                'withdraw_id' => $withdraw->id,
                'pengajuan_pembiayaan_dana_id' => $withdraw_cart->pengajuan_pembiayaan_dana_id
            ]);

            WithdrawCart::find($withdraw_cart->id)->delete();   
        }

        return redirect()->route('dashboard_user.withdraw_request')->with('status', true);
    }

    
    public function add_to_withdraw_cart(Request $request)
    {
        $pengajuan_pembiayaan_dana_id = $request->get('id');

        $user = Auth::user();

        $withdraw_cart = WithdrawCart::create([
            'pengajuan_pembiayaan_dana_id' => $pengajuan_pembiayaan_dana_id,
            'user_id' => $user->id
        ]);

        if($withdraw_cart){
            return response()->json([
                'status' => true,
                'message' => 'Added to withdraw cart'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Failed add to withdraw cart'
            ]);
        }
    }

    public function add_to_withdrawal_request(Request $request)
    {
        $pengajuan_pembiayaan_dana_id = $request->get('id');

        $user = Auth::user();


        // check apakah sudah melakukan withdraw dan di setujui pada bulan ini ?
        $withdraw = Withdraw::whereRaw("
            user_id = $user->id AND 
            status = 0 AND 
            YEAR(created_at) = ". date('Y') ." AND 
            MONTH('created_at') = ". date('m')
        );

        if($withdraw->count() == 0){
            $withdraw = Withdraw::create([
                'user_id' => $user->id,
                'status' => 0
            ]);
        }else{
            $withdraw->first();
        }

        $withdraw = Withdraw::whereRaw("
            user_id = $user->id AND 
            status = 0 AND 
            YEAR(created_at) = ". date('Y') ." AND 
            MONTH('created_at') = ". date('m')
        )->first();

        

        if($withdraw == NULL){

            $withdraw = Withdraw::create([
                'user_id' => $user->id,
                'status' => 0
            ]);

            $withdraw_detail = WithdrawDetail::create([
                'withdraw_id' => $withdraw->id,
                'pengajuan_pembiayaan_dana_id' => $pengajuan_pembiayaan_dana_id
            ]);
    
            $withdraw = Withdraw::with([
                'user',
                'withdraw_detail'
            ])->where([
                ['user_id', '=', $user->id],
                ['status', '=', 0],
            ])->first();

            return response()->json([
                'status' => true,
                'message' => '',
                'data' => [
                    'withdraw' => $withdraw
                ]
            ]);
        }else{
            return [
                'status' => false,
                'message' => 'Anda sudah melakukan request untuk bulan ini, withdraw hanya di perbolehkan 1 bulan sekali',
                'data' => []
            ];
        }



        
    }

    public function remove_from_withdrawal_request(Request $request)
    {
        $withdraw_cart_id = $request->get('id');

        $user = Auth::user();

        $withdraw_cart = WithdrawCart::find($withdraw_cart_id);
        $withdraw_cart->delete();

        return response()->json([
            'status' => true
        ]);
    }

    public function get_widget()
    {
        return view('dashboard_user.get_widget');
    }

    public function subscription_desktop_app()
    {
        $user = auth()->user(); 
        $subscription = SubscriptionDesktopApp::where([
            ['user_id', '=', $user->id]
        ])->whereIn('status', ['pending', 'waiting', 'approved'])->first();
        
            
        return view('dashboard_user.subscription_desktop_app', compact('subscription'));
    }

    public function submit_subscription_desktop_app(Request $request)
    {

        
        $request->validate([
            'subscription_duration' => 'required'
        ]);

        $data = [
            'user_id' => Auth()->user()->id, 
            'subscription_duration' => $request->get('subscription_duration'),
            'price' => ($request->get('subscription_duration') * config('app.subscription_desktop_app_price')) + rand(0, 999), 
            'description' => 'Subscription Desktop App Request - '. $request->get('subscription_duration') . ' Month', 
            'status' => 'pending', 
        ];

        SubscriptionDesktopApp::create($data);

        return redirect()->route('dashboard_user.subscription_desktop_app');
    }

    public function verify_subscription_desktop_app(Request $request)
    {

        $user = auth()->user(); 
        $subscription = SubscriptionDesktopApp::where([
            ['user_id', '=', $user->id]
        ])->whereIn('status', ['pending'])->first();

        $request->validate([
            'bukti_transaksi' => ['required', 'mimes:jpg,jpeg,bmp,png'],
            'nama_bank' => ['required'],
            'no_rekening' => ['required'],
            'nama_rekening' => ['required']
        ]);

        $bukti_transaksi = $request->file('bukti_transaksi');
        
        Storage::disk('public')->put($bukti_transaksi->getClientOriginalName(), File::get($bukti_transaksi));
        
        $subscription->update([
            'bukti_transaksi' => $bukti_transaksi->getClientOriginalName(),
            'nama_bank' => $request->get('nama_bank'),
            'no_rekening' => $request->get('no_rekening'),
            'nama_rekening' => $request->get('nama_rekening'),
            'status' => 'waiting'
        ]);

        return redirect()->route('dashboard_user.subscription_desktop_app');

    }

    public function cancel_subscription_desktop_app(Request $request)
    {
        $user = auth()->user(); 
        $subscription = SubscriptionDesktopApp::where([
            ['user_id', '=', $user->id]
        ])->whereIn('status', ['pending'])->first();

        $subscription->update([
            'status' => 'suspend'
        ]);

        return redirect()->route('dashboard_user.subscription_desktop_app');
    }



    public function withdraw_request()
    {
        return view('dashboard_user.withdraw_request');
    }

    public function json_customer_mitra(Request $request)
    {
        $user = Auth::user();

        $limit = $request->filled('limit') ? $request->get('limit') : 10;
		$offset = $request->filled('offset') ? $request->get('offset') : 0;
		$search = $request->filled('search') ? $request->get('search') : '';
		$sort = $request->filled('sort') ? $request->get('sort') : 'id';
        $order = $request->filled('order') ? $request->get('order') : 'DESC';
        
        $user = User::with(['mitra'])->where('mitra_id', $user->id)->where('email', '!=', 'fakhrurrazi.andi@gmail.com')->search($search);
        $data['total'] = $user->count();

        $user->skip($offset);
        $user->limit($limit);
        $user->orderBy($sort, $order);

        $data['rows'] = $user->get();

        return $data;
    }

    public function customer_mitra()
    {
        return view('dashboard_user.customer_mitra');
    }

    public function show_customer_mitra(User $user)
    {
        return view('dashboard_user.show_customer_mitra', compact('user'));
    }

   
}
