<?php

namespace App\Http\Controllers;

use App\Admin;
use App\CsPembiayaanDana;
use App\SpvPembiayaanDana;
use App\Rules\PasswordCheck;
use Illuminate\Http\Request;
use App\PengajuanPembiayaanDana;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;


class CsPembiayaanDanaController extends Controller
{
    public function index()
    {
        $cs_pembiayaan_dana = auth()->guard('cs_pembiayaan_dana')->user();
        
        return view('cs_pembiayaan_dana.index', compact('cs_pembiayaan_dana'));
    }

    public function editProfile()
    {
        $cs_pembiayaan_dana = auth()->guard('cs_pembiayaan_dana')->user();
        
        return view('cs_pembiayaan_dana.edit_profile', compact('cs_pembiayaan_dana'));
    }

    public function updateProfile(Request $request, CsPembiayaanDana $cs_pembiayaan_dana)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
        ];

        if($request->hasFile('photo_profile')){
            $photo_profile = $request->file('photo_profile');
            Storage::disk('public')->put($photo_profile->getClientOriginalName(),  File::get($photo_profile));
            $data['photo_profile'] = $photo_profile->getClientOriginalName();
        }
        
        $update = $cs_pembiayaan_dana->update($data);
        
        return redirect()->route('cs_pembiayaan_dana.index');
    }

    public function changePassword()
    {
        $cs_pembiayaan_dana = auth()->guard('cs_pembiayaan_dana')->user();
        return view('cs_pembiayaan_dana.change_password', compact('cs_pembiayaan_dana'));
    }

    public function updatePassword(Request $request, CsPembiayaanDana $cs_pembiayaan_dana)
    {
        $request->validate([
            'old_password' => ['required', 'string', 'max:255', new PasswordCheck($cs_pembiayaan_dana)],
            'new_password' => ['required', 'string', 'max:255', 'confirmed'],
        ]);
        
        $data = [
            'password' => Hash::make($request->get('new_password')),
        ];
        
        $update = $cs_pembiayaan_dana->update($data);
        
        return redirect()->route('cs_pembiayaan_dana.index');
    }

    public function notifications()
    {
        $cs_pembiayaan_dana = auth()->guard('cs_pembiayaan_dana')->user();
        return view('cs_pembiayaan_dana.notifications', compact('cs_pembiayaan_dana'));
    }

    

    public function json_pengajuan_pembiayaan_dana(Request $request)
    {
        $limit = $request->filled('limit') ? $request->get('limit') : 10;
		$offset = $request->filled('offset') ? $request->get('offset') : 0;
		$search = $request->filled('search') ? $request->get('search') : '';
		$sort = $request->filled('sort') ? $request->get('sort') : 'id';
        $order = $request->filled('order') ? $request->get('order') : 'ASC';
        
        $cs_pembiayaan_dana = auth()->guard('cs_pembiayaan_dana')->user();

        $pengajuan_pembiayaan_dana = PengajuanPembiayaanDana::where('cs_pembiayaan_dana_id', $cs_pembiayaan_dana->id)->with([
            'user',
            'wilayah_pembiayaan_dana',
            'tempo_angsuran_pembiayaan_dana',
            'motor_pembiayaan_dana',
            'status_stnk',
            'status_bpkb',
            'status_rumah',
            'cs_pembiayaan_dana',
            'spv_pembiayaan_dana'
        ])->search($search);
        $data['total'] = $pengajuan_pembiayaan_dana->count();


        $pengajuan_pembiayaan_dana->skip($offset);
        $pengajuan_pembiayaan_dana->limit($limit);
        $pengajuan_pembiayaan_dana->orderBy($sort, $order);

        $data['rows'] = $pengajuan_pembiayaan_dana->get();

        return $data;
    }

    public function list_pengajuan_pembiayaan_dana()
    {
        return view('cs_pembiayaan_dana.list_pengajuan_pembiayaan_dana');
    }

    public function pengajuan_pembiayaan_dana(PengajuanPembiayaanDana $pengajuan_pembiayaan_dana)
    {
        return view('cs_pembiayaan_dana.pengajuan_pembiayaan_dana', compact('pengajuan_pembiayaan_dana'));
    }

    public function process_pengajuan_pembiayaan_dana(Request $request, PengajuanPembiayaanDana $pengajuan_pembiayaan_dana)
    {
        $pengajuan_pembiayaan_dana_id = $pengajuan_pembiayaan_dana->id;

        $rules = [
            'cs_pembiayaan_dana_status' => 'required',
        ];

        if($request->get('cs_pembiayaan_dana_status') == 'approved'){

            // $rules['plafond_pembiayaan_diinginkan'] = 'required';
            $rules['plafond_pembiayaan_disetujui'] = 'required';
            $rules['tempo_angsuran_pembiayaan_dana_id_disetujui'] = 'required';
            $rules['angsuran'] = 'required';
            $rules['spv_pembiayaan_dana_id'] = 'required';
        }

        if($request->get('cs_pembiayaan_dana_status') == 'denied'){

            // $rules['plafond_pembiayaan_diinginkan'] = 'required';
            $rules['user_note'] = 'required';
        }

        

        $request->validate($rules);

        
        

        if($request->get('cs_pembiayaan_dana_status') == 'denied'){

            $pengajuan_pembiayaan_dana->cs_pembiayaan_dana_status = $request->get('cs_pembiayaan_dana_status');
            $pengajuan_pembiayaan_dana->cs_pembiayaan_dana_note = $request->get('cs_pembiayaan_dana_note');
            $pengajuan_pembiayaan_dana->user_note = $request->get('user_note');

            $pengajuan_pembiayaan_dana->save();
            $pengajuan_pembiayaan_dana = PengajuanPembiayaanDana::find($pengajuan_pembiayaan_dana_id);

            $pengajuan_pembiayaan_dana->user->notify(new \App\Notifications\User\PengajuanPembiayaanDanaDenied($pengajuan_pembiayaan_dana));

            if($pengajuan_pembiayaan_dana->mitra){
                $pengajuan_pembiayaan_dana->mitra->notify(new \App\Notifications\User\Mitra\PengajuanPembiayaanDanaDeniedByCs($pengajuan_pembiayaan_dana));
            }

            $admins = Admin::all();
            Notification::send($admins, new \App\Notifications\Admin\PengajuanPembiayaanDanaDeniedByCs($pengajuan_pembiayaan_dana));
        }

        if($request->get('cs_pembiayaan_dana_status') == 'approved'){

            // $pengajuan_pembiayaan_dana->plafond_pembiayaan_diinginkan = str_replace('.', '', $request->get('plafond_pembiayaan_diinginkan'));

            $pengajuan_pembiayaan_dana->plafond_pembiayaan_disetujui = str_replace('.', '', $request->get('plafond_pembiayaan_disetujui'));
            $pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana_id_disetujui = $request->get('tempo_angsuran_pembiayaan_dana_id_disetujui');
            $pengajuan_pembiayaan_dana->angsuran = str_replace('.', '', $request->get('angsuran'));
            $pengajuan_pembiayaan_dana->spv_pembiayaan_dana_id = $request->get('spv_pembiayaan_dana_id');

            $spv_pembiayaan_dana = SpvPembiayaanDana::find($request->get('spv_pembiayaan_dana_id'));
            $pengajuan_pembiayaan_dana->manager_pembiayaan_dana_id = $spv_pembiayaan_dana->manager_pembiayaan_dana->id;

            $pengajuan_pembiayaan_dana->cs_pembiayaan_dana_status = $request->get('cs_pembiayaan_dana_status');
            $pengajuan_pembiayaan_dana->cs_pembiayaan_dana_note = $request->get('cs_pembiayaan_dana_note');

            

            if($request->hasFile('image_ktp')){

                $image_ktp = $request->file('image_ktp');
                Storage::disk('public')->put($image_ktp->getClientOriginalName(), File::get($image_ktp));
                
                $pengajuan_pembiayaan_dana->image_ktp = $image_ktp->getClientOriginalName();
            }

            if($request->hasFile('image_kk')){

                $image_kk = $request->file('image_kk');
                Storage::disk('public')->put($image_kk->getClientOriginalName(), File::get($image_kk));

                $pengajuan_pembiayaan_dana->image_kk = $image_kk->getClientOriginalName();
            }

            if($request->hasFile('image_stnk')){

                $image_stnk = $request->file('image_stnk');
                Storage::disk('public')->put($image_stnk->getClientOriginalName(), File::get($image_stnk));

                $pengajuan_pembiayaan_dana->image_stnk = $image_stnk->getClientOriginalName();
            }

            if($request->hasFile('image_bpkb')){

                $image_bpkb = $request->file('image_bpkb');
                Storage::disk('public')->put($image_bpkb->getClientOriginalName(), File::get($image_bpkb));

                $pengajuan_pembiayaan_dana->image_bpkb = $image_bpkb->getClientOriginalName();
            }

            $pengajuan_pembiayaan_dana->save();
            $pengajuan_pembiayaan_dana = PengajuanPembiayaanDana::find($pengajuan_pembiayaan_dana_id);
            
            
            $pengajuan_pembiayaan_dana->spv_pembiayaan_dana->notify(new \App\Notifications\SpvPembiayaanDana\PengajuanPembiayaanDanaApprovedByCs($pengajuan_pembiayaan_dana));

            if($pengajuan_pembiayaan_dana->mitra){
                $pengajuan_pembiayaan_dana->mitra->notify(new \App\Notifications\User\Mitra\PengajuanPembiayaanDanaApprovedByCs($pengajuan_pembiayaan_dana));
            }

            $admins = Admin::all();
            Notification::send($admins, new \App\Notifications\Admin\PengajuanPembiayaanDanaApprovedByCs($pengajuan_pembiayaan_dana));
        }
        
        return redirect()->route('cs_pembiayaan_dana.list_pengajuan_pembiayaan_dana');


    }
}
