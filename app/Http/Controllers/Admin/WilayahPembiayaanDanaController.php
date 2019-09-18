<?php

namespace App\Http\Controllers\Admin;


use App\WilayahPembiayaanDana;
use Illuminate\Http\Request;
use Yajra\Acl\Models\Permission;
use App\Http\Controllers\Controller;

class WilayahPembiayaanDanaController extends Controller
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
        $order = $request->filled('order') ? $request->get('order') : 'ASC';
        
        $data_wilayah_pembiayaan_dana = WilayahPembiayaanDana::search($search);
        $data['total'] = $data_wilayah_pembiayaan_dana->count();


        $data_wilayah_pembiayaan_dana->skip($offset);
        $data_wilayah_pembiayaan_dana->limit($limit);
        $data_wilayah_pembiayaan_dana->orderBy($sort, $order);

        $data['rows'] = $data_wilayah_pembiayaan_dana->get();

        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.wilayah_pembiayaan_dana.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wilayah_pembiayaan_dana.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        WilayahPembiayaanDana::create($request->all());
        return redirect()->route('admin.wilayah_pembiayaan_dana.index');
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
    public function edit(WilayahPembiayaanDana $wilayah_pembiayaan_dana)
    {
        return view('admin.wilayah_pembiayaan_dana.edit', compact('wilayah_pembiayaan_dana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WilayahPembiayaanDana $wilayah_pembiayaan_dana)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $wilayah_pembiayaan_dana->update($request->all());
        return redirect()->route('admin.wilayah_pembiayaan_dana.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WilayahPembiayaanDana $wilayah_pembiayaan_dana)
    {
        $wilayah_pembiayaan_dana->delete();
        return redirect()->route('admin.wilayah_pembiayaan_dana.index');
    }
}
