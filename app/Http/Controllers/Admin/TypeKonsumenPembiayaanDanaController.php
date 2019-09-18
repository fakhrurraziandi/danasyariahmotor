<?php

namespace App\Http\Controllers\Admin;

use App\TypeKonsumenPembiayaanDana;
use App\PabrikanMotor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TypeKonsumenPembiayaanDanaController extends Controller
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
        
        $type_konsumen_pembiayaan_dana = TypeKonsumenPembiayaanDana::search($search);
        $data['total'] = $type_konsumen_pembiayaan_dana->count();


        $type_konsumen_pembiayaan_dana->skip($offset);
        $type_konsumen_pembiayaan_dana->limit($limit);
        $type_konsumen_pembiayaan_dana->orderBy($sort, $order);

        $data['rows'] = $type_konsumen_pembiayaan_dana->get();

        return $data;
    }

    public function index()
    {
        return view('admin.type_konsumen_pembiayaan_dana.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.type_konsumen_pembiayaan_dana.create');
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

        TypeKonsumenPembiayaanDana::create($data);
        return redirect()->route('admin.type_konsumen_pembiayaan_dana.index');
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
    public function edit(TypeKonsumenPembiayaanDana $type_konsumen_pembiayaan_dana)
    {
        return view('admin.type_konsumen_pembiayaan_dana.edit', compact('type_konsumen_pembiayaan_dana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeKonsumenPembiayaanDana $type_konsumen_pembiayaan_dana)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = [
            'name' => $request->get('name'),
        ];
        
        $type_konsumen_pembiayaan_dana->update($data);
        return redirect()->route('admin.type_konsumen_pembiayaan_dana.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeKonsumenPembiayaanDana $type_konsumen_pembiayaan_dana)
    {
        $type_konsumen_pembiayaan_dana->delete();
        return redirect()->route('admin.type_konsumen_pembiayaan_dana.index');
    }
}
