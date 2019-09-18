<?php

namespace App\Http\Controllers;

use App\Admin;
use App\SpvKreditMotor;
use App\Rules\PasswordCheck;
use Illuminate\Http\Request;
use App\PengajuanKreditMotor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;

class SpvKreditMotorController extends Controller
{
    public function index()
    {
        $spv_kredit_motor = auth()->guard('spv_kredit_motor')->user();
        
        return view('spv_kredit_motor.index', compact('spv_kredit_motor'));
    }

    public function editProfile()
    {
        $spv_kredit_motor = auth()->guard('spv_kredit_motor')->user();
        
        return view('spv_kredit_motor.edit_profile', compact('spv_kredit_motor'));
    }

    public function updateProfile(Request $request, SpvKreditMotor $spv_kredit_motor)
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
        
        $update = $spv_kredit_motor->update($data);
        
        return redirect()->route('spv_kredit_motor.index');
    }

    public function changePassword()
    {
        $spv_kredit_motor = auth()->guard('spv_kredit_motor')->user();
        return view('spv_kredit_motor.change_password', compact('spv_kredit_motor'));
    }

    public function updatePassword(Request $request, SpvKreditMotor $spv_kredit_motor)
    {
        $request->validate([
            'old_password' => ['required', 'string', 'max:255', new PasswordCheck($spv_kredit_motor)],
            'new_password' => ['required', 'string', 'max:255', 'confirmed'],
        ]);
        
        $data = [
            'password' => Hash::make($request->get('new_password')),
        ];
        
        $update = $spv_kredit_motor->update($data);
        
        return redirect()->route('spv_kredit_motor.index');
    }

    public function notifications()
    {
        $spv_kredit_motor = auth()->guard('spv_kredit_motor')->user();
        return view('spv_kredit_motor.notifications', compact('spv_kredit_motor'));
    }

    

    public function json_pengajuan_kredit_motor(Request $request)
    {
        $limit = $request->filled('limit') ? $request->get('limit') : 10;
		$offset = $request->filled('offset') ? $request->get('offset') : 0;
		$search = $request->filled('search') ? $request->get('search') : '';
		$sort = $request->filled('sort') ? $request->get('sort') : 'id';
        $order = $request->filled('order') ? $request->get('order') : 'ASC';
        
        $spv_kredit_motor = auth()->guard('spv_kredit_motor')->user();

        $pengajuan_kredit_motor = PengajuanKreditMotor::where('spv_kredit_motor_id', $spv_kredit_motor->id)->with([
            'cs_kredit_motor',
            'spv_kredit_motor',
            'wilayah_kredit_motor',
            'user',
            'angsuran_motor' => function($query){
                $query->with('motor');
            },
            'angsuran_motor_detail' => function($query){
                $query->with('tempo_angsuran_motor');
            }
        ])->search($search);
        $data['total'] = $pengajuan_kredit_motor->count();


        $pengajuan_kredit_motor->skip($offset);
        $pengajuan_kredit_motor->limit($limit);
        $pengajuan_kredit_motor->orderBy($sort, $order);

        $data['rows'] = $pengajuan_kredit_motor->get();

        return $data;
    }

    public function list_pengajuan_kredit_motor()
    {
        return view('spv_kredit_motor.list_pengajuan_kredit_motor');
    }

    public function pengajuan_kredit_motor(PengajuanKreditMotor $pengajuan_kredit_motor)
    {
        return view('spv_kredit_motor.pengajuan_kredit_motor', compact('pengajuan_kredit_motor'));
    }

    public function process_pengajuan_kredit_motor(Request $request, PengajuanKreditMotor $pengajuan_kredit_motor)
    {
        $pengajuan_kredit_motor->spv_kredit_motor_status = $request->get('spv_kredit_motor_status');
        $pengajuan_kredit_motor->update();

        if($request->get('spv_kredit_motor_status') == 'denied'){

            $pengajuan_kredit_motor->user->notify(new \App\Notifications\User\PengajuanKreditMotorDenied($pengajuan_kredit_motor));
            $pengajuan_kredit_motor->cs_kredit_motor->notify(new \App\Notifications\CsKreditMotor\PengajuanKreditMotorDeniedBySpv($pengajuan_kredit_motor));

            $admins = Admin::all();
            Notification::send($admins, new \App\Notifications\Admin\PengajuanKreditMotorDeniedBySpv($pengajuan_kredit_motor));
        }

        if($request->get('spv_kredit_motor_status') == 'approved'){
            $pengajuan_kredit_motor->user->notify(new \App\Notifications\User\PengajuanKreditMotorApproved($pengajuan_kredit_motor));
            $pengajuan_kredit_motor->cs_kredit_motor->notify(new \App\Notifications\CsKreditMotor\PengajuanKreditMotorApprovedBySpv($pengajuan_kredit_motor));

            $admins = Admin::all();
            Notification::send($admins, new \App\Notifications\Admin\PengajuanKreditMotorApprovedBySpv($pengajuan_kredit_motor));
        }

        return redirect()->route('spv_kredit_motor.list_pengajuan_kredit_motor');


    }
}
