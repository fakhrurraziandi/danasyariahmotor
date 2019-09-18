<?php

namespace App\Http\Controllers;

use App\ManagerPembiayaanDana;
use App\Rules\PasswordCheck;
use Illuminate\Http\Request;
use App\PengajuanPembiayaanDana;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Notifications\User\PengajuanPembiayaanDanaApproved;
use App\Notifications\CsPembiayaanDana\PengajuanPembiayaanDanaDeniedBySpv;
use App\Notifications\ManagerPembiayaanDana\PengajuanPembiayaanDanaApprovedByCs;
use App\Notifications\CsPembiayaanDana\PengajuanPembiayaanDanaApprovedBySpv;

class ManagerPembiayaanDanaController extends Controller
{
    public function index()
    {
        $manager_pembiayaan_dana = auth()->guard('manager_pembiayaan_dana')->user();
        
        return view('manager_pembiayaan_dana.index', compact('manager_pembiayaan_dana'));
    }

    public function editProfile()
    {
        $manager_pembiayaan_dana = auth()->guard('manager_pembiayaan_dana')->user();
        
        return view('manager_pembiayaan_dana.edit_profile', compact('manager_pembiayaan_dana'));
    }

    public function updateProfile(Request $request, ManagerPembiayaanDana $manager_pembiayaan_dana)
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
        
        $update = $manager_pembiayaan_dana->update($data);
        
        return redirect()->route('manager_pembiayaan_dana.index');
    }

    public function changePassword()
    {
        $manager_pembiayaan_dana = auth()->guard('manager_pembiayaan_dana')->user();
        return view('manager_pembiayaan_dana.change_password', compact('manager_pembiayaan_dana'));
    }

    public function updatePassword(Request $request, ManagerPembiayaanDana $manager_pembiayaan_dana)
    {
        $request->validate([
            'old_password' => ['required', 'string', 'max:255', new PasswordCheck($manager_pembiayaan_dana)],
            'new_password' => ['required', 'string', 'max:255', 'confirmed'],
        ]);
        
        $data = [
            'password' => Hash::make($request->get('new_password')),
        ];
        
        $update = $manager_pembiayaan_dana->update($data);
        
        return redirect()->route('manager_pembiayaan_dana.index');
    }

    public function notifications()
    {
        $manager_pembiayaan_dana = auth()->guard('manager_pembiayaan_dana')->user();
        return view('manager_pembiayaan_dana.notifications', compact('manager_pembiayaan_dana'));
    }

    

    public function json_pengajuan_pembiayaan_dana(Request $request)
    {
        $limit = $request->filled('limit') ? $request->get('limit') : 10;
		$offset = $request->filled('offset') ? $request->get('offset') : 0;
		$search = $request->filled('search') ? $request->get('search') : '';
		$sort = $request->filled('sort') ? $request->get('sort') : 'id';
        $order = $request->filled('order') ? $request->get('order') : 'ASC';
        
        $manager_pembiayaan_dana = auth()->guard('manager_pembiayaan_dana')->user();

        $pengajuan_pembiayaan_dana = PengajuanPembiayaanDana::where('manager_pembiayaan_dana_id', $manager_pembiayaan_dana->id)->with([
            'user',
            'wilayah_pembiayaan_dana',
            'tempo_angsuran_pembiayaan_dana',
            'motor_pembiayaan_dana',
            'status_stnk',
            'status_bpkb',
            'status_rumah',

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
        return view('manager_pembiayaan_dana.list_pengajuan_pembiayaan_dana');
    }

    public function pengajuan_pembiayaan_dana(PengajuanPembiayaanDana $pengajuan_pembiayaan_dana)
    {
        return view('manager_pembiayaan_dana.pengajuan_pembiayaan_dana', compact('pengajuan_pembiayaan_dana'));
    }

    public function process_pengajuan_pembiayaan_dana(Request $request, PengajuanPembiayaanDana $pengajuan_pembiayaan_dana)
    {
        $pengajuan_pembiayaan_dana->manager_pembiayaan_dana_status = $request->get('manager_pembiayaan_dana_status');
        $pengajuan_pembiayaan_dana->update();

        if($request->get('manager_pembiayaan_dana_status') == 'denied'){
            $pengajuan_pembiayaan_dana->user->notify(new PengajuanPembiayaanDanaDenied($pengajuan_pembiayaan_dana));
            $pengajuan_pembiayaan_dana->cs_pembiayaan_dana->notify(new PengajuanPembiayaanDanaDeniedBySpv($pengajuan_pembiayaan_dana));
        }

        if($request->get('manager_pembiayaan_dana_status') == 'approved'){
            $pengajuan_pembiayaan_dana->user->notify(new PengajuanPembiayaanDanaApproved($pengajuan_pembiayaan_dana));
            $pengajuan_pembiayaan_dana->cs_pembiayaan_dana->notify(new PengajuanPembiayaanDanaApprovedBySpv($pengajuan_pembiayaan_dana));
        }

        return redirect()->route('manager_pembiayaan_dana.list_pengajuan_pembiayaan_dana');


    }
}
