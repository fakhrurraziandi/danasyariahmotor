<?php

namespace App\Http\Controllers\Admin;

use App\Wilayah;

use App\SpvPembiayaanDana;
use Illuminate\Http\Request;
use App\WilayahPembiayaanDana;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\SpvPembiayaanDanaWilayahPembiayaanDana;

class SpvPembiayaanDanaController extends Controller
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
        
        $spv_pembiayaan_dana = SpvPembiayaanDana::with(['manager_pembiayaan_dana', 'wilayah_pembiayaan_dana'])->search($search);
        $data['total'] = $spv_pembiayaan_dana->count();

        $spv_pembiayaan_dana->skip($offset);
        $spv_pembiayaan_dana->limit($limit);
        $spv_pembiayaan_dana->orderBy($sort, $order);

        $data['rows'] = $spv_pembiayaan_dana->get();

        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.spv_pembiayaan_dana.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_wilayah_pembiayaan_dana = WilayahPembiayaanDana::all();
        // $list_wilayah = Wilayah::all();
        return view('admin.spv_pembiayaan_dana.create', compact('list_wilayah_pembiayaan_dana'));
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:spv_pembiayaan_dana'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required'],
            'manager_pembiayaan_dana_id' => ['required'],
            'wilayah_pembiayaan_dana_ids' => ['required', 'array', 'min:1'],
        ];

        $request->validate($rules);

        
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'phone_number' => $request->get('phone_number'),
            'manager_pembiayaan_dana_id' => $request->get('manager_pembiayaan_dana_id'),
            'wilayah_pembiayaan_dana_id' => $request->get('wilayah_pembiayaan_dana_id'),
        ];

        $spv_pembiayaan_dana = SpvPembiayaanDana::create($data);

        if($spv_pembiayaan_dana){

            $wilayah_pembiayaan_dana_ids = $request->get('wilayah_pembiayaan_dana_ids');
            if(count($wilayah_pembiayaan_dana_ids)){
                foreach($wilayah_pembiayaan_dana_ids as $wilayah_pembiayaan_dana_id){
                    SpvPembiayaanDanaWilayahPembiayaanDana::create([
                        'spv_pembiayaan_dana_id' => $spv_pembiayaan_dana->id,
                        'wilayah_pembiayaan_dana_id' => $wilayah_pembiayaan_dana_id
                    ]);
                }
            }
        }

        return redirect()->route('admin.spv_pembiayaan_dana.index');
        
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
    public function edit(SpvPembiayaanDana $spv_pembiayaan_dana)
    {
        
        $list_wilayah_pembiayaan_dana = WilayahPembiayaanDana::all();
        return view('admin.spv_pembiayaan_dana.edit', compact('spv_pembiayaan_dana', 'list_wilayah_pembiayaan_dana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpvPembiayaanDana $spv_pembiayaan_dana)
    {

        $role_id = $request->get('role_id');    
        
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:spv_pembiayaan_dana,email,'. $spv_pembiayaan_dana->id],
            'phone_number' => ['required'],
            'manager_pembiayaan_dana_id' => ['required'],
            'wilayah_pembiayaan_dana_ids' => ['required', 'array', 'min:1'],
        ];

        $request->validate($rules);

        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'manager_pembiayaan_dana_id' => $request->get('manager_pembiayaan_dana_id'),
            'wilayah_pembiayaan_dana_id' => $request->get('wilayah_pembiayaan_dana_id'),
        ];

        $spv_pembiayaan_dana->update($data);

        if($spv_pembiayaan_dana){

            SpvPembiayaanDanaWilayahPembiayaanDana::where('spv_pembiayaan_dana_id', $spv_pembiayaan_dana->id)->delete();
            
            $wilayah_pembiayaan_dana_ids = $request->get('wilayah_pembiayaan_dana_ids');
            if(count($wilayah_pembiayaan_dana_ids)){
                foreach($wilayah_pembiayaan_dana_ids as $wilayah_pembiayaan_dana_id){
                    SpvPembiayaanDanaWilayahPembiayaanDana::create([
                        'spv_pembiayaan_dana_id' => $spv_pembiayaan_dana->id,
                        'wilayah_pembiayaan_dana_id' => $wilayah_pembiayaan_dana_id
                    ]);
                }
            }

        }

        return redirect()->route('admin.spv_pembiayaan_dana.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpvPembiayaanDana $spv_pembiayaan_dana)
    {
        $spv_pembiayaan_dana->delete();
        return redirect()->route('admin.spv_pembiayaan_dana.index');
    }

    public function changePassword(SpvPembiayaanDana $spv_pembiayaan_dana)
    {
        return view('admin.spv_pembiayaan_dana.change_password', compact('spv_pembiayaan_dana'));
    }

    public function updatePassword(Request $request, SpvPembiayaanDana $spv_pembiayaan_dana)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $spv_pembiayaan_dana->update([
            'password' => Hash::make($request->get('password')),
        ]);

        return redirect()->route('admin.spv_pembiayaan_dana.index');
    }


    public function report_form()
    {
        return view('admin.spv_pembiayaan_dana.report_form');
    }

    public function report_pdf(Request $request)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required'
        ]);

        // return $request->all();
        $from = $request->get('from');
        $to = $request->get('to');

        $list_spv_pembiayaan_dana = SpvPembiayaanDana::whereRaw("DATE(created_at) BETWEEN '". $from ."' AND '". $to ."'")->get();

        $html = view('admin.spv_pembiayaan_dana.report_pdf', compact('list_spv_pembiayaan_dana'))->render();

        // return $html;

        $mpdf = new \Mpdf\Mpdf([
            'orientation' => 'L',
            'tempDir' => storage_path()
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();


    }
}
