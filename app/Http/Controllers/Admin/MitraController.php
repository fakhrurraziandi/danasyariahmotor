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

class MitraController extends Controller
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
		$sort = $request->filled('sort') ? $request->get('sort') : 'id';
        $order = $request->filled('order') ? $request->get('order') : 'DESC';
        
        $user = User::where([
            ['mitra_status', '', 2]
        ])->search($search);
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
        return view('admin.mitra.index');
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
        return view('admin.mitra.create', compact('roles', 'list_wilayah'));
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

        return redirect()->route('admin.mitra.index');
        
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
        return view('admin.mitra.edit', compact('user', 'roles', 'list_wilayah'));
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

        $role_id = $request->get('role_id');    
        
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'. $user->id],
        ];

        $request->validate($rules);

        $user->update($request->all());

        return redirect()->route('admin.mitra.index');
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
        return redirect()->route('admin.mitra.index');
    }

    public function manageRole(User $user)
    {
        $roles = Role::all();
        return view('admin.mitra.manage_role', compact('user', 'roles'));
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

        return redirect()->route('admin.mitra.index');

    }

    public function changePassword(User $user)
    {
        return view('admin.mitra.change_password', compact('user'));
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
            'password' => Hash::make($request->get('password')),
        ]);

        return redirect()->route('admin.mitra.index');
    }
}
