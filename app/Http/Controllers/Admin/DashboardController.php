<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Rules\PasswordCheck;
use Illuminate\Http\Request;
use App\PengajuanPembiayaanDana;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $list_sumber_informasi = DB::table('pengajuan_pembiayaan_dana')->select('sumber_informasi as name')->groupBy('sumber_informasi')->where([
            ['sumber_informasi', '!=', null]
        ])->get()->toArray();

        for($i = 0; $i < count($list_sumber_informasi); $i++){
            $list_sumber_informasi[$i]->data = [];
            // var_dump($list_sumber_informasi[$i]);
            
            $year = date('Y');
            $months = [
                1 => 'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ];

            foreach($months as $month => $month_name){
                $list_sumber_informasi[$i]->data[] = PengajuanPembiayaanDana::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->where('sumber_informasi', $list_sumber_informasi[$i]->name)->count(); 
            }
        }

        $json_list_sumber_informasi = json_encode($list_sumber_informasi);

        // ------------------------------------------------------------------------------------


        $list_sumber_informasi_2 = DB::table('users')->select('sumber_informasi as name')->groupBy('sumber_informasi')->where([
            ['sumber_informasi', '!=', null]
        ])->get()->toArray();

        for($i = 0; $i < count($list_sumber_informasi_2); $i++){
            $list_sumber_informasi_2[$i]->data = [];
            // var_dump($list_sumber_informasi_2[$i]);
            
            $year = date('Y');
            $months = [
                1 => 'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ];

            foreach($months as $month => $month_name){
                $list_sumber_informasi_2[$i]->data[] = User::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->where('sumber_informasi', $list_sumber_informasi_2[$i]->name)->count(); 
            }
        }

        $json_list_sumber_informasi_2 = json_encode($list_sumber_informasi_2);

       
        return view('admin.dashboard', compact('list_sumber_informasi', 'json_list_sumber_informasi', 'list_sumber_informasi_2', 'json_list_sumber_informasi_2'));
    }

    public function changePassword(Request $request)
    {
        return view('admin.change_password');
    }

    public function editProfile()
    {
        $admin = auth()->guard('admin')->user();
        
        return view('admin.edit_profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = auth()->guard('admin')->user();

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
        
        $update = $admin->update($data);
        
        return redirect()->route('admin.edit_profile')->with('update_profile_success', true);
    }

    public function updatePassword(Request $request)
    {
        $admin = $request->user();

        $request->validate([
            'old_password' => ['required', 'string', 'max:255', new PasswordCheck($admin)],
            'new_password' => ['required', 'string', 'max:255', 'confirmed'],
        ]);
        
        $data = [
            'password' => Hash::make($request->get('new_password')),
        ];
        
        $update = $admin->update($data);
        
        return redirect()->route('admin.change_password')->with([
            'update_password_success' => true
        ]);
    }
}