<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Admin;
use App\Motor;
use App\Wilayah;
use App\TypeMotor;
use App\StatusBpkb;
use App\StatusStnk;
use App\WarnaMotor;
use App\StatusRumah;
use App\AngsuranMotor;
use App\CsKreditMotor;
use App\ContactMessage;
use App\KapasitasMesin;
use App\TempoAngsuranMotor;
use App\WilayahKreditMotor;
use App\KategoriSpesifikasi;
use App\MotorPembiayaanDana;
use Illuminate\Http\Request;
use App\PengajuanKreditMotor;
use App\WilayahPembiayaanDana;
use App\AngsuranPembiayaanDana;
use App\SubscriptionDesktopApp;
use App\PengajuanPembiayaanDana;
use Illuminate\Support\Facades\DB;
use App\TempoAngsuranPembiayaanDana;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\AngsuranPembiayaanDanaDetail;
use Illuminate\Support\Facades\Storage;
use App\CsKreditMotorWilayahKreditMotor;
use Illuminate\Support\Facades\Validator;
use App\Rules\PlafondPembiayaanDiInginkan;
use Illuminate\Support\Facades\Notification;


// use App\Notifications\CsKreditMotor\NewPengajuan;

class PagesController extends Controller
{
    public function index()
    {
    	return view('home');
    }

    public function tentangKami()
    {
    	return view('tentang-kami');
    }

    public function akadKredit(request $request, $mitra_code = null)
    {

        if($mitra_code !== null){
            if($request->session()->get('mitra_code') !== $mitra_code){
                $request->session()->put('mitra_code', $mitra_code); // continue
            }
        }else{
            
            if($request->session()->has('mitra_code')){
                return redirect()->route('akad-kredit', $request->session()->get('mitra_code'));
            }
        }

        // if($mitra_code !== null){

        //     if ($request->session()->has('mitra_code')) {
        //         if($mitra_code !== $request->session()->get('mitra_code')){
        //             $request->session()->put('mitra_code', $mitra_code);
        //         }
        //     }else{
        //         $request->session()->put('mitra_code', $mitra_code);
        //         return redirect()->route('akad-kredit', $mitra_code);
        //     }
        // }else{
        //     if ($request->session()->has('mitra_code')) {
        //         return redirect()->route('akad-kredit', $mitra_code);
        //     }
        // }

        // lanjut
        
        

        $list_wilayah_pembiayaan_dana = WilayahPembiayaanDana::orderBy('name')->get();
        $list_tempo_angsuran_pembiayaan_dana = TempoAngsuranPembiayaanDana::orderBy('tempo')->get();
        $list_motor_pembiayaan_dana = MotorPembiayaanDana::all();
        $list_status_stnk = StatusStnk::all();
        $list_status_bpkb = StatusBpkb::all();
        $list_status_rumah = StatusRumah::all();
		$list_tahun = array();
		for($tahun = date('Y') ;$tahun >= (date('Y') - 10); $tahun--){
			$list_tahun[]=$tahun;
        }
        
        // $mitra = ($mitra_code == null) ? null : User::where('mitra_code', $mitra_code)->first();

        // dd($mitra);

    	return view('akad-kredit', compact(
            'list_wilayah_pembiayaan_dana', 
            'list_tempo_angsuran_pembiayaan_dana', 
            'list_motor_pembiayaan_dana', 
            'list_status_stnk',
            'list_status_bpkb',
            'list_status_rumah',
            'list_tahun'
        ));
    }

    public function get_pencairan_pembiayaan_dana(Request $request)
    {

        // return $request->all();
        $motor_pembiayaan_dana_id   = $request->get('motor_pembiayaan_dana_id');
        $wilayah_pembiayaan_dana_id = $request->get('wilayah_pembiayaan_dana_id');
        $tahun_motor                = $request->get('tahun_motor');
        $status_stnk_id             = $request->get('status_stnk_id');
        $status_bpkb_id             = $request->get('status_bpkb_id');
        $tempo_angsuran_pembiayaan_dana_id        = $request->get('tempo_angsuran_pembiayaan_dana_id');

        

        $angsuran_pembiayaan_dana = AngsuranPembiayaanDana::where([
            ['motor_pembiayaan_dana_id', '=', $motor_pembiayaan_dana_id],
            ['wilayah_pembiayaan_dana_id', '=', $wilayah_pembiayaan_dana_id],
            ['tahun', '=', $tahun_motor],
            ['status_stnk_id', '=', $status_stnk_id],
            ['status_bpkb_id', '=', $status_bpkb_id],
        ])->first();

        $angsuran_pembiayaan_dana_detail = null;

        if($angsuran_pembiayaan_dana){

            $angsuran_pembiayaan_dana_detail = AngsuranPembiayaanDanaDetail::where([
                ['angsuran_pembiayaan_dana_id', '=', $angsuran_pembiayaan_dana->id],
                ['tempo_angsuran_pembiayaan_dana_id', '=', $tempo_angsuran_pembiayaan_dana_id],
            ])->first();

            return [
                'status' => true,
                'data' => [
                    'angsuran_pembiayaan_dana' => $angsuran_pembiayaan_dana,
                    'angsuran_pembiayaan_dana_detail' => $angsuran_pembiayaan_dana_detail
                ]
            ];
        }else{
            return [
                'status' => false,
            ];
        }

        

        // return $angsuran_pembiayaan_dana;
    }

    public function submitAkadKredit(Request $request)
    {
        // return $request->all();
        $user = Auth::user();

        if($user->ref_code !== null){
            $mitra = User::where('ref_code', $user->ref_code)->first();
        }else{
            $mitra = null;
        }

        

        $request->merge([
            'user_id' => $user->id,
        ]);
        
        $rules = [
            'user_id'                                      => 'required', 
            'wilayah_pembiayaan_dana_id'                   => 'required', 
            'tempo_angsuran_pembiayaan_dana_id'            => 'required', 
            'motor_pembiayaan_dana_id'                     => 'required', 
            'status_stnk_id'                               => 'required', 
            'status_bpkb_id'                               => 'required', 
            'status_rumah_id'                              => 'required', 
            'tahun_motor'                                  => 'required', 
            // 'status_keberadaan_bpkb'                       => 'required', 
            'status_kartu_kredit'                          => 'required', 
            'status_pinjaman'                          => 'required', 
            'keperluan_pinjaman'                          => 'required', 
            
            'status_pekerjaan'                             => 'required', 
            'status_sosial'                                => 'required', 
            
            
            'bersedia_disurvey'                            => 'required', 
          
            // 'cs_pembiayaan_dana_id'                        => 'required', 
            // 'cs_pembiayaan_dana_status'                    => 'required', 
            // 'cs_pembiayaan_dana_note'                      => 'required', 
            // 'spv_pembiayaan_dana_id'                       => 'required', 
            // 'spv_pembiayaan_dana_status'                   => 'required', 
            // 'spv_pembiayaan_dana_note'                     => 'required', 
            // 'manager_pembiayaan_dana_id'                   => 'required', 
            'plafond_pembiayaan_diinginkan'                => 'required', 
            // 'plafond_pembiayaan_disetujui'                 => 'required', 
            // 'tempo_angsuran_pembiayaan_dana_id_disetujui'  => 'required', 
            // 'angsuran'                                     => 'required', 
            'image_ktp'                                    => 'required|image', 
            // 'image_kk'                                     => 'required|image', 
            'image_stnk'                                   => 'required|image', 
            'image_bpkb'                                   => 'required|image', 
            // 'sumber_informasi'                                   => 'required', 

        ];
        

        // if($request->get('status_keberadaan_bpkb') == 'Masih di Leasing/Koperasi'){

        //     $rules = array_merge($rules, [
        //         'leasing_koperasi__sisa_tempo_angsuran'        => 'required', 
        //         'leasing_koperasi__nilai_angsuran'             => 'required', 
        //         'leasing_koperasi__status_pembayaran_angsuran' => 'required', 
        //     ]);

        //     if($request->get('leasing_koperasi__status_pembayaran_angsuran') == 'tidak lancar'){
        //         $rules = array_merge($rules, [
        //             'leasing_koperasi__total_keterlambatan'        => 'required', 
        //         ]);
        //     }

        // }

        if($request->get('status_kartu_kredit') == 'ya'){
            $rules = array_merge($rules, [
                'status_pembayaran_kartu_kredit'               => 'required', 
                
            ]);
        }

        if($request->get('status_pinjaman') == 'ya'){
            $rules = array_merge($rules, [
                'nama_penyedia_pinjaman'               => 'required', 
                'status_tunggakan_pinjaman'               => 'required', 
                'pernah_terlambat'               => 'required', 
            ]);
        }

        switch($request->get('status_sosial')){
            case 'Menikah':
                $rules = array_merge($rules, [
                    'persetujuan_pasangan'                         => 'required', 
                ]);
                break;

            case 'Belum Nikah':
                $rules = array_merge($rules, [
                    'persetujuan_orang_tua'                         => 'required', 
                ]);
                break;
        }

        if($request->get('bersedia_disurvey') == 'tidak'){
            $rules = array_merge($rules, [
                'alasan_tidak_bersedia_disurvey'               => 'required', 
            ]);
        }

        // if($request->get('sumber_informasi') == 'Mitra Kami'){
        //     $rules = array_merge($rules, [
        //         'mitra_id'               => 'required', 
        //     ]);
        // }

        
        // $request->validate($rules);

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){

            $errors = $validator->errors();

            $error_message = '';
            foreach($errors->getMessages() as $message){
                $error_message .= $message[0];
                if($error_message !== ''){
                    break;
                }
            }

            return response()->json([
                'status' => false,
                'message' => $error_message,
                'errors' => $validator->errors(),
            ]);
        }

        // return;

        

        // return $request->all();

        // $request->validate([
        //     'wilayah_pembiayaan_dana_id' => 'required',
        //     // 'plafond_pembiayaan' => 'required',
        //     'tempo_angsuran_pembiayaan_dana_id' => 'required',
        //     'motor_pembiayaan_dana_id' => 'required',
        //     'status_stnk_id' => 'required',
        //     'status_bpkb_id' => 'required',
        //     'status_rumah_id' => 'required',
        //     'tahun_motor' => 'required',
        //     // 'plafond_pembiayaan_minimal' => 'required',
		// 	// 'plafond_pembiayaan_disetujui' => 'required',
        //     'plafond_pembiayaan_diinginkan' => 'required|numeric|min:0|not_in:0',
        //     'angsuran' => 'required',

        //     'image_ktp' => 'image|mimes:jpeg,png,jpg,gif',
        //     'image_kk' => 'image|mimes:jpeg,png,jpg,gif',
        //     'image_stnk' => 'image|mimes:jpeg,png,jpg,gif',
        //     'image_bpkb' => 'image|mimes:jpeg,png,jpg,gif',
        // ]);

        // $this->validate($request, [
        //     'wilayah_pembiayaan_dana_id' => 'required',
        //     // 'plafond_pembiayaan' => 'required',
        //     'tempo_angsuran_pembiayaan_dana_id' => 'required',
        //     'motor_pembiayaan_dana_id' => 'required',
        //     'status_stnk_id' => 'required',
        //     'status_bpkb_id' => 'required',
        //     'status_rumah_id' => 'required',
        //     'tahun_motor' => 'required',
        //     // 'plafond_pembiayaan_minimal' => 'required',
		// 	// 'plafond_pembiayaan_disetujui' => 'required',
        //     'plafond_pembiayaan_diinginkan' => 'required|numeric|min:0|not_in:0',
        //     'angsuran' => 'required',

        //     'image_ktp' => 'image|mimes:jpeg,png,jpg,gif',
        //     'image_kk' => 'image|mimes:jpeg,png,jpg,gif',
        //     'image_stnk' => 'image|mimes:jpeg,png,jpg,gif',
        //     'image_bpkb' => 'image|mimes:jpeg,png,jpg,gif',
        // ]);

        $data = [
            'user_id'                                      => $request->get('user_id'), 
            'wilayah_pembiayaan_dana_id'                   => $request->get('wilayah_pembiayaan_dana_id'), 
            'tempo_angsuran_pembiayaan_dana_id'            => $request->get('tempo_angsuran_pembiayaan_dana_id'), 
            'motor_pembiayaan_dana_id'                     => $request->get('motor_pembiayaan_dana_id'), 
            'status_stnk_id'                               => $request->get('status_stnk_id'), 
            'status_bpkb_id'                               => $request->get('status_bpkb_id'), 
            'status_rumah_id'                              => $request->get('status_rumah_id'), 
            'tahun_motor'                                  => $request->get('tahun_motor'), 
            // 'status_keberadaan_bpkb'                       => $request->get('status_keberadaan_bpkb'), 
           
            
            'status_kartu_kredit'                          => $request->get('status_kartu_kredit'), 
            'status_pekerjaan'                             => $request->get('status_pekerjaan'), 
            'status_sosial'                                => $request->get('status_sosial'), 

            
            'status_pinjaman'                          => $request->get('status_pinjaman'), 
            'keperluan_pinjaman'                          => $request->get('keperluan_pinjaman'), 
            
            
            'bersedia_disurvey'                            => $request->get('bersedia_disurvey'), 
            
            // 'cs_pembiayaan_dana_id'                        => $request->get('cs_pembiayaan_dana_id'), 
            // 'cs_pembiayaan_dana_status'                    => $request->get('cs_pembiayaan_dana_status'), 
            // 'cs_pembiayaan_dana_note'                      => $request->get('cs_pembiayaan_dana_note'), 
            // 'spv_pembiayaan_dana_id'                       => $request->get('spv_pembiayaan_dana_id'), 
            // 'spv_pembiayaan_dana_status'                   => $request->get('spv_pembiayaan_dana_status'), 
            // 'spv_pembiayaan_dana_note'                     => $request->get('spv_pembiayaan_dana_note'), 
            // 'manager_pembiayaan_dana_id'                   => $request->get('manager_pembiayaan_dana_id'), 
            'plafond_pembiayaan_diinginkan'                => str_replace('.', '', $request->get('plafond_pembiayaan_diinginkan')), 
            // 'plafond_pembiayaan_disetujui'                 => $request->get('plafond_pembiayaan_disetujui'), 
            // 'tempo_angsuran_pembiayaan_dana_id_disetujui'  => $request->get('tempo_angsuran_pembiayaan_dana_id_disetujui'), 
            // 'angsuran'                                     => $request->get('angsuran'), 
            // 'image_ktp'                                    => $request->get('image_ktp'), 
            // 'image_kk'                                     => $request->get('image_kk'), 
            // 'image_stnk'                                   => $request->get('image_stnk'), 
            // 'image_bpkb'                                   => $request->get('image_bpkb'), 
            'sumber_informasi'                                   => $request->get('sumber_informasi'), 
            
            'mitra_id'               => $mitra ? $mitra->id : null, 
            'mitra_profit'               => $mitra ? config('app.mitra_profit') : null, 
            'mitra_profit_withdraw_status' => 0,
        ];

        // if($request->get('status_keberadaan_bpkb') == 'Leasing/Koperasi'){

        //     $data = array_merge($data, [
        //         'leasing_koperasi__sisa_tempo_angsuran'        => $request->get('leasing_koperasi__sisa_tempo_angsuran'), 
        //         'leasing_koperasi__nilai_angsuran'             => (int) str_replace(['.', ','], '', $request->get('leasing_koperasi__nilai_angsuran')), 
        //         'leasing_koperasi__status_pembayaran_angsuran' => $request->get('leasing_koperasi__status_pembayaran_angsuran'), 
        //     ]);

        //     if($request->get('leasing_koperasi__status_pembayaran_angsuran') == 'tidak lancar'){
        //         $data = array_merge($data, [
        //             'leasing_koperasi__total_keterlambatan'        => $request->get('leasing_koperasi__total_keterlambatan'), 
        //         ]);
        //     }

        // }

        if($request->get('status_kartu_kredit') == 'ya'){
            $data = array_merge($data, [
                'status_pembayaran_kartu_kredit'               => $request->get('status_pembayaran_kartu_kredit'), 
                
            ]);
        }

        if($request->get('status_pinjaman') == 'ya'){
            $data = array_merge($data, [
                'nama_penyedia_pinjaman'               => $request->get('nama_penyedia_pinjaman'), 
                'status_tunggakan_pinjaman'               => $request->get('status_tunggakan_pinjaman'), 
                'pernah_terlambat'               => $request->get('pernah_terlambat'), 
            ]);
        }

        switch($request->get('status_sosial')){
            case 'Menikah':
                $data = array_merge($data, [
                    'persetujuan_pasangan'                         => $request->get('persetujuan_pasangan'), 
                ]);
                break;

            case 'Belum Nikah':
                $data = array_merge($data, [
                    'persetujuan_orang_tua'                        => $request->get('persetujuan_orang_tua'), 
                ]);
                break;
        }

        if($request->get('bersedia_disurvey') == 'tidak'){
            $data = array_merge($data, [
                'alasan_tidak_bersedia_disurvey'               => $request->get('alasan_tidak_bersedia_disurvey'), 
            ]);
        }

        // if($request->get('sumber_informasi') == 'Mitra Kami'){
        //     $data = array_merge($data, [
        //         'mitra_id'               => $request->get('mitra_id'), 
        //         'mitra_profit'               => config('app.mitra_profit'), 
        //         'mitra_profit_withdraw_status' => 0,
        //     ]);
        // }
        


        if($request->hasFile('image_ktp')){

            $image_ktp = $request->file('image_ktp');
            Storage::disk('public')->put($image_ktp->getClientOriginalName(), File::get($image_ktp));
            
            $data['image_ktp'] = $image_ktp->getClientOriginalName();
        }

        if($request->hasFile('image_kk')){

            $image_kk = $request->file('image_kk');
            Storage::disk('public')->put($image_kk->getClientOriginalName(), File::get($image_kk));

            $data['image_kk'] = $image_kk->getClientOriginalName();
        }

        if($request->hasFile('image_stnk')){

            $image_stnk = $request->file('image_stnk');
            Storage::disk('public')->put($image_stnk->getClientOriginalName(), File::get($image_stnk));

            $data['image_stnk'] = $image_stnk->getClientOriginalName();
        }

        if($request->hasFile('image_bpkb')){

            $image_bpkb = $request->file('image_bpkb');
            Storage::disk('public')->put($image_bpkb->getClientOriginalName(), File::get($image_bpkb));

            $data['image_bpkb'] = $image_bpkb->getClientOriginalName();
        }

        // return $request->all();
        // dd($data['image_ktp']);
        // return $data;
        
        $pengajuan_pembiayaan_dana = PengajuanPembiayaanDana::create($data);

        // dd($pengajuan_pembiayaan_dana);

        if($pengajuan_pembiayaan_dana){
            
            // Make Notiication

            $wilayah_pembiayaan_dana = WilayahPembiayaanDana::find($request->wilayah_pembiayaan_dana_id);

            $cs_pembiayaan_dana = $wilayah_pembiayaan_dana->cs_pembiayaan_dana()->inRandomOrder()->first();
            
            if($cs_pembiayaan_dana){

                $pengajuan_pembiayaan_dana->cs_pembiayaan_dana_id = $cs_pembiayaan_dana->id;
                $pengajuan_pembiayaan_dana->update();
                
                $cs_pembiayaan_dana->notify(new \App\Notifications\CsPembiayaanDana\PengajuanPembiayaanDanaNew($pengajuan_pembiayaan_dana));

                // dd($pengajuan_pembiayaan_dana->user);
                // dd($pengajuan_pembiayaan_dana->mitra);

                $pengajuan_pembiayaan_dana->user->notify(new \App\Notifications\User\PengajuanPembiayaanDanaNew($pengajuan_pembiayaan_dana));
                
                if($pengajuan_pembiayaan_dana->mitra){
                    $pengajuan_pembiayaan_dana->mitra->notify(new \App\Notifications\User\PengajuanPembiayaanDanaNewFromDownline($pengajuan_pembiayaan_dana));
                }
                

                $admins = Admin::all();
                Notification::send($admins, new \App\Notifications\Admin\PengajuanPembiayaanDanaNew($pengajuan_pembiayaan_dana));

                
                // $pengajuan_pembiayaan_dana->spv_pembiayaan_dana_id = $cs_pembiayaan_dana->spv_pembiayaan_dana->id;
                // $pengajuan_pembiayaan_dana->manager_pembiayaan_dana_id = $cs_pembiayaan_dana->spv_pembiayaan_dana->manager_pembiayaan_dana->id;
                
                
            }

            
            

            return response()->json([
                'status' => true,
                'message' => 'Pengajuan Berhasil'
            ]);

            // return redirect()->route('akad-kredit-success');
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Mohon maaf kami sedang mengalami gangguan teknis, harap mencoba beberapa saat lagi'
            ]);
        }
    }
    
    public function pengajuanOnline()
    {
        $list_wilayah_kredit_motor = WilayahKreditMotor::all();
        $list_motor = Motor::whereHas('angsuran_motor')->with([
            'angsuran_motor' => function($q){
                $q->with(['angsuran_motor_detail' => function($q){
                    $q->with('tempo_angsuran_motor');
                }]);
            }
        ])->get();
    	return view('pengajuan-online',compact('list_wilayah_kredit_motor', 'list_motor'));
    }

    public function submitPengajuanOnline(Request $request)
    {
        // return $request->all();
        $user = Auth::user();

        $request->validate([
            'wilayah_kredit_motor_id' => 'required',
            'motor_id' => 'required',
            'angsuran_motor_id' => 'required',
            'angsuran_motor_detail_id' => 'required',
        ]);

        $data = [
            'user_id' => $user->id,
            'wilayah_kredit_motor_id' => $request->get('wilayah_kredit_motor_id'),
            'angsuran_motor_id' => $request->get('angsuran_motor_id'),
            'angsuran_motor_detail_id' => $request->get('angsuran_motor_detail_id'),
        ];

        $pengajuan_kredit_motor = PengajuanKreditMotor::create($data);

        if($pengajuan_kredit_motor){
            
            // Make Notiication

            $wilayah_kredit_motor = WilayahKreditMotor::find($request->wilayah_kredit_motor_id);

            $cs_kredit_motor = $wilayah_kredit_motor->cs_kredit_motor()->inRandomOrder()->first();
            $pengajuan_kredit_motor->cs_kredit_motor_id = $cs_kredit_motor->id;
            $pengajuan_kredit_motor->update();
            
            $cs_kredit_motor->notify(new \App\Notifications\CsKreditMotor\PengajuanKreditMotorNew($pengajuan_kredit_motor));

            $pengajuan_kredit_motor->user->notify(new \App\Notifications\User\PengajuanKreditMotorNew($pengajuan_kredit_motor));

            $admins = Admin::all();
            Notification::send($admins, new \App\Notifications\Admin\PengajuanKreditMotorNew($pengajuan_kredit_motor));

            

            return redirect()->route('pengajuan-online-success');
        }
    }

    public function pengajuanOnlineSuccess()
    {
        return view('pengajuan-online-success');
    }


    public function akadKreditSuccess()
    {
        return view('akad-kredit-success');
    }

    public function beliMotor(Request $request)
    {
        

        $list_type_motor = TypeMotor::all();
        $list_warna_motor = WarnaMotor::all();
        $list_kapasitas_mesin = KapasitasMesin::all();

        // $type_motor_ids      = $request->get('type_motor_ids');
        // $warna_motor_ids     = $request->get('warna_motor_ids');
        // $kapasitas_mesin_ids = $request->get('kapasitas_mesin_ids');
        // $tahun               = $request->get('tahun');

        $query = Motor::query();

        $query->when(request()->has('type_motor_ids'), function($q){
            $q->whereIn('type_motor_id', request()->get('type_motor_ids'));
        });

        $query->when(request()->has('kapasitas_mesin_ids'), function($q){
            $q->whereIn('kapasitas_mesin_id', request()->get('kapasitas_mesin_ids'));
        });

        $query->when(request()->has('tahun'), function($q){
            $q->whereIn('tahun', request()->get('tahun'));
        });

        $query->when(request()->has('keyword'), function($q){
            $q->where('name', 'LIKE', '%'. request()->get('keyword') .'%');
        });
        

        $list_motor = $query->whereHas('angsuran_motor')->paginate(9);

        return view('beli-motor', compact( 'list_motor', 'list_type_motor', 'list_warna_motor', 'list_kapasitas_mesin'));
    }

    public function detailMotor($slug, Request $request)
    {
        $cs_kredit_motor_ids = CsKreditMotor::pluck('id');
        $wilayah_kredit_motor_ids = CsKreditMotorWilayahKreditMotor::whereIn('cs_kredit_motor_id', $cs_kredit_motor_ids)->groupBy('wilayah_kredit_motor_id')->pluck('wilayah_kredit_motor_id');
        $list_wilayah_kredit_motor = WilayahKreditMotor::whereIn('id', $wilayah_kredit_motor_ids)->get();


        $list_motor = Motor::all();
        $motor = Motor::with([
            'testimoni_motor',
            'angsuran_motor.angsuran_motor_detail.tempo_angsuran_motor',
            'spesifikasi_motor',
        ])->where('slug', $slug)->first();
        $list_kategori_spesifikasi = KategoriSpesifikasi::all();

        // return $motor;
        return view('detail-motor', compact('motor', 'list_wilayah_kredit_motor', 'list_motor', 'list_kategori_spesifikasi'));
    }

    public function notifications()
    {
        
        return view('notifications');
    }

    public function contactUs()
    {
        return view('contact-us');
    }

    public function submitContactUs(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'message' => 'required'
        ]);

        ContactMessage::create($request->all());

        return redirect()->route('kontak-kami')->with([
            'kontak_kami_success' => true
        ]);
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function profile()
    {
        
        return view('profile');
    }

    public function updateProfile(Request $request)
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

        

        $user = User::find($user->id);

        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            // 'password' => $request->get('password'),
            'no_handphone_1' => $request->get('no_handphone_1'),
            // 'no_handphone_2' => $request->get('no_handphone_2'),
            'jenis_identitas' => $request->get('jenis_identitas'),
            'no_identitas' => $request->get('no_identitas'),
            // 'kota' => $request->get(''),
            'alamat' => $request->get('alamat'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'province_id' => $request->get('province_id'),
            'city_id' => $request->get('city_id'),
            'district_id' => $request->get('district_id'),
        ]);

        return redirect()->route('profile')->with('status', true);
    }


    public function mitraRequest()
    {
        
        return view('mitra-request');
    }

    public function submitMitraRequest(Request $request)
    {

        // return $request->all();
        $user = Auth::user();

        $request->validate([
            'nama_bank' => 'required',
            'no_rekening_bank' => 'required',
            'photo' => 'required'
        ]);

        $data = [
            'mitra_status' => 1,
            'nama_bank' => $request->get('nama_bank'),
            'no_rekening_bank' => $request->get('no_rekening_bank'),
            'pekerjaan' => $request->get('pekerjaan'), 
            'spesifikasi_perangkat_komputer' => $request->get('spesifikasi_perangkat_komputer'), 
            'software_marketing_digital' => $request->get('software_marketing_digital'), 
            'alamat_website' => $request->get('alamat_website'), 
            'bersedia_dipasang_widget' => $request->get('bersedia_dipasang_widget'), 
            'target_income_pasif_sebagai_mitra' => $request->get('target_income_pasif_sebagai_mitra'), 
            'nama_facebook' => $request->get('nama_facebook'), 
        ];

        if($request->hasFile('photo')){

            $photo = $request->file('photo');
            Storage::disk('public')->put($photo->getClientOriginalName(), File::get($photo));
            
            $data['photo'] = $photo->getClientOriginalName();
        }

        $user = User::find($user->id);
        $user->update($data);

        return redirect()->route('mitra-request-success');
    }

    public function mitraRequestSucess()
    {
        return view('mitra-request-success');
    }

    public function mitraKami(Request $request)
    {
        // $list_mitra = User::where('mitra_status', 2)->paginate(12);
        
        // $raw_query = DB::select( DB::raw("select * from (
        //                                     select
        //                                         users.name,
        //                                         users.email,
        //                                         users.photo,
        //                                         indonesia_provinces.name as province_name,
        //                                         indonesia_cities.name as city_name,
        //                                         indonesia_districts.name as district_name,
        //                                         (select count(*) from pengajuan_pembiayaan_dana WHERE pengajuan_pembiayaan_dana.mitra_id = users.id) as count_pengajuan,
        //                                         (select count(*) from pengajuan_pembiayaan_dana WHERE pengajuan_pembiayaan_dana.mitra_id = users.id AND pengajuan_pembiayaan_dana.cs_pembiayaan_dana_status = 'approved' AND pengajuan_pembiayaan_dana.spv_pembiayaan_dana_status = 'approved') as count_pengajuan_closing,
        //                                         users.created_at,
        //                                         users.updated_at
        //                                     from users
        //                                     LEFT JOIN indonesia_provinces on users.province_id = indonesia_provinces.id
        //                                     LEFT JOIN indonesia_cities on users.city_id = indonesia_cities.id
        //                                     LEFT JOIN indonesia_districts on users.district_id = indonesia_districts.id

        //                                     where users.mitra_status = 2 AND users.id NOT IN (2138, 3478, 3861)
        //                                 ) x order by x.count_pengajuan DESC, x.count_pengajuan_closing DESC, x.created_at DESC LIMIT 12 ") );

        $raw_query = DB::table('users')
                        ->join('indonesia_provinces', 'users.province_id', '=', 'indonesia_provinces.id')
                        ->join('indonesia_cities', 'users.city_id', '=', 'indonesia_cities.id')
                        ->join('indonesia_districts', 'users.district_id', '=', 'indonesia_districts.id')
                        ->select([
                            "users.name",
                            "users.email",
                            "users.photo",
                            "indonesia_provinces.name as province_name",
                            "indonesia_cities.name as city_name",
                            "indonesia_districts.name as district_name",
                            DB::raw("(select count(*) from pengajuan_pembiayaan_dana WHERE pengajuan_pembiayaan_dana.mitra_id = users.id) as count_pengajuan"),
                            DB::raw("(select count(*) from pengajuan_pembiayaan_dana WHERE pengajuan_pembiayaan_dana.mitra_id = users.id AND pengajuan_pembiayaan_dana.cs_pembiayaan_dana_status = 'approved' AND pengajuan_pembiayaan_dana.spv_pembiayaan_dana_status = 'approved') as count_pengajuan_closing"),
                            "users.created_at",
                            "users.updated_at",
                        ])->where([
                            ['users.mitra_status',  '=',  '2'],
                        ])->whereNotIn('users.id', [2138, 3478, 3861])
                        ->orderBy("count_pengajuan", 'DESC')
                        ->orderBy("count_pengajuan_closing", 'DESC');

        $totalCount = $raw_query->count();
        $page = $request->input('page') ?:1;

        if ($page) {
            $skip = 12 * ($page - 1);
            $raw_query = $raw_query->take(12)->skip($skip);
        } else {
            $raw_query = $raw_query->take(12)->skip(0);
        }

        $parameters = $request->getQueryString();

        $parameters = preg_replace('/&page(=[^&]*)?|^page(=[^&]*)?&?/','', $parameters);

        $path = route('mitra-kami') . $parameters;

        $list_mitra = $raw_query->get()->toArray();

        $paginator = new \Illuminate\Pagination\LengthAwarePaginator($list_mitra, $totalCount, 12, $page);

        $paginator = $paginator->withPath($path);

        return view('mitra-kami', compact('list_mitra', 'paginator'));
    }

    public function widget($widget_code, $mitra_code)
    {
        
        $user = User::where([
            ['mitra_code', '=', $mitra_code]
        ])->first();
        return view('widget', compact('widget_code', 'mitra_code'));
    }
}
