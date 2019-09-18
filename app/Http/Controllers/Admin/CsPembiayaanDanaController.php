<?php

namespace App\Http\Controllers\Admin;

use App\Wilayah;

use App\CsPembiayaanDana;
use App\WilayahPembiayaanDana;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\CsPembiayaanDanaWilayahPembiayaanDana;

class CsPembiayaanDanaController extends Controller
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
        
        $cs_pembiayaan_dana = CsPembiayaanDana::with(['wilayah_pembiayaan_dana'])->search($search);
        $data['total'] = $cs_pembiayaan_dana->count();

        $cs_pembiayaan_dana->skip($offset);
        $cs_pembiayaan_dana->limit($limit);
        $cs_pembiayaan_dana->orderBy($sort, $order);

        $data['rows'] = $cs_pembiayaan_dana->get();

        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cs_pembiayaan_dana.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_wilayah_pembiayaan_dana = WilayahPembiayaanDana::all();
        return view('admin.cs_pembiayaan_dana.create', compact('list_wilayah_pembiayaan_dana'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $role_id = $request->get('role_id');    
        
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:cs_pembiayaan_dana'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required'],
            'wilayah_pembiayaan_dana_ids' => ['required', 'array', 'min:1'],
        ];

        $request->validate($rules);

        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'phone_number' => $request->get('phone_number'),
            'wilayah_pembiayaan_dana_ids' => $request->get('wilayah_pembiayaan_dana_ids'),
        ];

        $cs_pembiayaan_dana = CsPembiayaanDana::create($request->all());

        if($cs_pembiayaan_dana){

            $wilayah_pembiayaan_dana_ids = $request->get('wilayah_pembiayaan_dana_ids');
            if(count($wilayah_pembiayaan_dana_ids)){
                foreach($wilayah_pembiayaan_dana_ids as $wilayah_pembiayaan_dana_id){
                    CsPembiayaanDanaWilayahPembiayaanDana::create([
                        'cs_pembiayaan_dana_id' => $cs_pembiayaan_dana->id,
                        'wilayah_pembiayaan_dana_id' => $wilayah_pembiayaan_dana_id
                    ]);
                }
            }
        }

        

        return redirect()->route('admin.cs_pembiayaan_dana.index');
        
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
    public function edit(CsPembiayaanDana $cs_pembiayaan_dana)
    {
        
        $list_wilayah_pembiayaan_dana = WilayahPembiayaanDana::all();
        return view('admin.cs_pembiayaan_dana.edit', compact('cs_pembiayaan_dana', 'list_wilayah_pembiayaan_dana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CsPembiayaanDana $cs_pembiayaan_dana)
    {

        $role_id = $request->get('role_id');    
        
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:cs_pembiayaan_dana,email,'. $cs_pembiayaan_dana->id],
            'phone_number' => ['required'],
            'wilayah_pembiayaan_dana_ids' => ['required', 'array', 'min:1'],
        ];

        $request->validate($rules);

        $cs_pembiayaan_dana->update($request->all());

        if($cs_pembiayaan_dana){

            CsPembiayaanDanaWilayahPembiayaanDana::where('cs_pembiayaan_dana_id', $cs_pembiayaan_dana->id)->delete();
            
            $wilayah_pembiayaan_dana_ids = $request->get('wilayah_pembiayaan_dana_ids');
            if(count($wilayah_pembiayaan_dana_ids)){
                foreach($wilayah_pembiayaan_dana_ids as $wilayah_pembiayaan_dana_id){
                    CsPembiayaanDanaWilayahPembiayaanDana::create([
                        'cs_pembiayaan_dana_id' => $cs_pembiayaan_dana->id,
                        'wilayah_pembiayaan_dana_id' => $wilayah_pembiayaan_dana_id
                    ]);
                }
            }

        }

        return redirect()->route('admin.cs_pembiayaan_dana.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CsPembiayaanDana $cs_pembiayaan_dana)
    {
        $cs_pembiayaan_dana->delete();
        return redirect()->route('admin.cs_pembiayaan_dana.index');
    }

    public function changePassword(CsPembiayaanDana $cs_pembiayaan_dana)
    {
        return view('admin.cs_pembiayaan_dana.change_password', compact('cs_pembiayaan_dana'));
    }

    public function updatePassword(Request $request, CsPembiayaanDana $cs_pembiayaan_dana)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $cs_pembiayaan_dana->update([
            'password' => Hash::make($request->get('password')),
        ]);

        return redirect()->route('admin.cs_pembiayaan_dana.index');
    }
}
