<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use App\PengajuanPembiayaanDana;
use App\Http\Controllers\Controller;

class PengajuanPembiayaanDanaController extends Controller
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
        
        $pengajuan_pembiayaan_dana = PengajuanPembiayaanDana::with([
            'wilayah_pembiayaan_dana',
            'tempo_angsuran_pembiayaan_dana',
            'motor_pembiayaan_dana',
            'status_stnk',
            'status_bpkb',
            'status_rumah',


        ])->where('user_id', auth()->user()->id)->search($search);
        $data['total'] = $pengajuan_pembiayaan_dana->count();


        $pengajuan_pembiayaan_dana->skip($offset);
        $pengajuan_pembiayaan_dana->limit($limit);
        $pengajuan_pembiayaan_dana->orderBy($sort, $order);

        $data['rows'] = $pengajuan_pembiayaan_dana->get();

        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengajuan_pembiayaan_dana.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PengajuanPembiayaanDana $pengajuan_pembiayaan_dana)
    {
        
        return view('pengajuan_pembiayaan_dana.show', compact('pengajuan_pembiayaan_dana'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
