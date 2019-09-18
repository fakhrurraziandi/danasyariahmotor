<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\ManagerPembiayaanDana;
use App\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerPembiayaanDanaController extends Controller
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
        
        $manager_pembiayaan_dana = ManagerPembiayaanDana::search($search);
        $data['total'] = $manager_pembiayaan_dana->count();

        $manager_pembiayaan_dana->skip($offset);
        $manager_pembiayaan_dana->limit($limit);
        $manager_pembiayaan_dana->orderBy($sort, $order);

        $data['rows'] = $manager_pembiayaan_dana->get();

        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.manager_pembiayaan_dana.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $list_wilayah = Wilayah::all();
        return view('admin.manager_pembiayaan_dana.create', compact('list_wilayah'));
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:manager_pembiayaan_dana'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        $request->validate($rules);

        $manager_pembiayaan_dana = ManagerPembiayaanDana::create($request->all());

        return redirect()->route('admin.manager_pembiayaan_dana.index');
        
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
    public function edit(ManagerPembiayaanDana $manager_pembiayaan_dana)
    {
        
        $list_wilayah = Wilayah::all();
        return view('admin.manager_pembiayaan_dana.edit', compact('manager_pembiayaan_dana', 'list_wilayah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManagerPembiayaanDana $manager_pembiayaan_dana)
    {

        $role_id = $request->get('role_id');    
        
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:manager_pembiayaan_dana,email,'. $manager_pembiayaan_dana->id],
        ];

        $request->validate($rules);

        $manager_pembiayaan_dana->update($request->all());

        return redirect()->route('admin.manager_pembiayaan_dana.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManagerPembiayaanDana $manager_pembiayaan_dana)
    {
        $manager_pembiayaan_dana->delete();
        return redirect()->route('admin.manager_pembiayaan_dana.index');
    }

    public function changePassword(ManagerPembiayaanDana $manager_pembiayaan_dana)
    {
        return view('admin.manager_pembiayaan_dana.change_password', compact('manager_pembiayaan_dana'));
    }

    public function updatePassword(Request $request, ManagerPembiayaanDana $manager_pembiayaan_dana)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $manager_pembiayaan_dana->update([
            'password' => Hash::make($request->get('password')),
        ]);

        return redirect()->route('admin.manager_pembiayaan_dana.index');
    }
}
