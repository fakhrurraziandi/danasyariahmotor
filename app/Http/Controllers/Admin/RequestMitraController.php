<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Wilayah;
use App\RoleUser;
use Illuminate\Http\Request;
use App\PengajuanKreditMotor;
use App\PengajuanPembiayaanDana;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RequestMitraController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function json(Request $request)
    {

        $limit = $request->filled('limit') ? $request->get('limit') : 10;
		$offset = $request->filled('offset') ? $request->get('offset') : 0;
		$search = $request->filled('search') ? $request->get('search') : '';
		$sort = $request->filled('sort') ? $request->get('sort') : 'updated_at';
        $order = $request->filled('order') ? $request->get('order') : 'DESC';
        
        $user = User::with(['mitra'])->whereIn('mitra_status', [1, 2])->search($search);

        $data['total'] = $user->count();

        $user->skip($offset);
        $user->limit($limit);
        $user->orderBy($sort, $order);

        $data['rows'] = $user->get();

        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.request_mitra.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $list_wilayah = Wilayah::all();
        return view('admin.request_mitra.create', compact('roles', 'list_wilayah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $role_id = $request->get('role_id');    
        
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        $request->validate($rules);

        $user = User::create($request->all());

        return redirect()->route('admin.request_mitra.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // return $user; 

        $roles = Role::all(); 
        $list_wilayah = Wilayah::all();
        // return $user->city->province->id;
        return view('admin.request_mitra.edit', compact('user', 'roles', 'list_wilayah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        // return $request->all();
        
        $rules = [
            'mitra_status' => ['required'],
        ];

        $request->validate($rules);

        $user->update($request->all());

        if($request->mitra_status == '2'){ 
            $user->update([
                'mitra_code' => sha1($user->id)
            ]);
            $user->notify(new \App\Notifications\User\MitraRequestApproved($user)); 
        }
        if($request->mitra_status == '3'){ $user->notify(new \App\Notifications\User\MitraRequestDenied($user)); }

        return redirect()->route('admin.request_mitra.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        PengajuanPembiayaanDana::where('user_id', $user->id)->delete();
        PengajuanKreditMotor::where('user_id', $user->id)->delete();

        $user->delete();
        return redirect()->route('admin.request_mitra.index');
    }

    public function manageRole(User $user)
    {
        $roles = Role::all();
        return view('admin.request_mitra.manage_role', compact('user', 'roles'));
    }

    public function updateRole(Request $request, User $user)
    {
        RoleUser::where('user_id', $user->id)->delete();

        $role_ids = $request->filled('role_ids') ? $request->get('role_ids') : [];
        foreach($role_ids as $role_id){
            RoleUser::create([
                'role_id' => $role_id,
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('admin.request_mitra.index');

    }

    public function changePassword(User $user)
    {
        return view('admin.request_mitra.change_password', compact('user'));
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
            'password' => Hash::make($request->get('password')),
        ]);

        return redirect()->route('admin.request_mitra.index');
    }
    
    public function report_form()
    {
        return view('admin.request_mitra.report_form');
    }

    public function report_pdf(Request $request)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'mitra_status' => 'required',
        ]);

        // return $request->all();
        $from = $request->get('from');
        $to = $request->get('to');
        $mitra_status = $request->get('mitra_status');

        

        $users = User::whereRaw("mitra_status IN(". IMPLODE(',', $mitra_status) .") AND DATE(updated_at) BETWEEN '". $from ."' AND '". $to ."'")->get();

        $html = view('admin.request_mitra.report_pdf', compact('users'))->render();

        $mpdf = new \Mpdf\Mpdf([
            'orientation' => 'L',
            'tempDir' => storage_path()
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();


    }
}
