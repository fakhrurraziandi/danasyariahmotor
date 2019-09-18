<?php

namespace App\Http\Controllers\Admin;


use App\TempoAngsuranPembiayaanDana;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TempoAngsuranPembiayaanDanaController extends Controller
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
        
        $tempo_angsuran_pembiayaan_dana = TempoAngsuranPembiayaanDana::search($search);
        $data['total'] = $tempo_angsuran_pembiayaan_dana->count();


        $tempo_angsuran_pembiayaan_dana->skip($offset);
        $tempo_angsuran_pembiayaan_dana->limit($limit);
        $tempo_angsuran_pembiayaan_dana->orderBy($sort, $order);

        $data['rows'] = $tempo_angsuran_pembiayaan_dana->get();

        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tempo_angsuran_pembiayaan_dana.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tempo_angsuran_pembiayaan_dana.create');
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
            'tempo' => 'required',
        ]);
        
        TempoAngsuranPembiayaanDana::create($request->all());
        return redirect()->route('admin.tempo_angsuran_pembiayaan_dana.index');
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
    public function edit(TempoAngsuranPembiayaanDana $tempo_angsuran_pembiayaan_dana)
    {
        return view('admin.tempo_angsuran_pembiayaan_dana.edit', compact('tempo_angsuran_pembiayaan_dana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TempoAngsuranPembiayaanDana $tempo_angsuran_pembiayaan_dana)
    {
        $request->validate([
            'tempo' => 'required',
        ]);
        
        $tempo_angsuran_pembiayaan_dana->update($request->all());
        return redirect()->route('admin.tempo_angsuran_pembiayaan_dana.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempoAngsuranPembiayaanDana $tempo_angsuran_pembiayaan_dana)
    {
        $tempo_angsuran_pembiayaan_dana->delete();
        return redirect()->route('admin.tempo_angsuran_pembiayaan_dana.index');
    }
}
