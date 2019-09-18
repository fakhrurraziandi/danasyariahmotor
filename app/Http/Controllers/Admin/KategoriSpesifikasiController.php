<?php

namespace App\Http\Controllers\Admin;

use App\KategoriSpesifikasi;
use App\PabrikanMotor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class KategoriSpesifikasiController extends Controller
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
        
        $kategori_spesifikasi = KategoriSpesifikasi::search($search);
        $data['total'] = $kategori_spesifikasi->count();


        $kategori_spesifikasi->skip($offset);
        $kategori_spesifikasi->limit($limit);
        $kategori_spesifikasi->orderBy($sort, $order);

        $data['rows'] = $kategori_spesifikasi->get();

        return $data;
    }

    public function index()
    {
        return view('admin.kategori_spesifikasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori_spesifikasi.create');
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

        $data = [
            'name' => $request->get('name'),
        ];

        KategoriSpesifikasi::create($data);
        return redirect()->route('admin.kategori_spesifikasi.index');
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
    public function edit(KategoriSpesifikasi $kategori_spesifikasi)
    {
        return view('admin.kategori_spesifikasi.edit', compact('kategori_spesifikasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriSpesifikasi $kategori_spesifikasi)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = [
            'name' => $request->get('name'),
        ];
        
        $kategori_spesifikasi->update($data);
        return redirect()->route('admin.kategori_spesifikasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriSpesifikasi $kategori_spesifikasi)
    {
        $kategori_spesifikasi->delete();
        return redirect()->route('admin.kategori_spesifikasi.index');
    }
}
