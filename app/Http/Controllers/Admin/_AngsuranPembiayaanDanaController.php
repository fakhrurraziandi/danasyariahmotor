<?php

namespace App\Http\Controllers\Admin;

use App\StatusBpkb;
use App\StatusStnk;
use App\MotorPembiayaanDana;
use Illuminate\Http\Request;
use App\WilayahPembiayaanDana;
use App\AngsuranPembiayaanDana;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\TempoAngsuranPembiayaanDana;
use App\AngsuranPembiayaanDanaDetail;

class AngsuranPembiayaanDanaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function json(MotorPembiayaanDana $motor_pembiayaan_dana, Request $request)
    {
        $limit = $request->filled('limit') ? $request->get('limit') : 10;
		$offset = $request->filled('offset') ? $request->get('offset') : 0;
		$search = $request->filled('search') ? $request->get('search') : '';
		$sort = $request->filled('sort') ? $request->get('sort') : 'id';
        $order = $request->filled('order') ? $request->get('order') : 'ASC';

        $list_tempo_angsuran_pembiayaan_dana = TempoAngsuranPembiayaanDana::all();

        
        $sub_query = [];
        foreach($list_tempo_angsuran_pembiayaan_dana as $tempo_angsuran_pembiayaan_dana){
            $sub_query[] = "(
                SELECT 
                    angsuran_pembiayaan_dana_detail.angsuran_per_bulan 
                FROM angsuran_pembiayaan_dana_detail 
                WHERE 
                    angsuran_pembiayaan_dana_detail.tempo_angsuran_pembiayaan_dana_id = {$tempo_angsuran_pembiayaan_dana->id} AND angsuran_pembiayaan_dana_detail.angsuran_pembiayaan_dana_id = angsuran_pembiayaan_dana.id LIMIT 1
            ) AS '{$tempo_angsuran_pembiayaan_dana->tempo}' ";
        }

        if(count($sub_query)){
            $sub_query_imploded = implode(', ', $sub_query). ', ';
        }else{
            $sub_query_imploded = '';
        }
        
        
        $query = "SELECT * FROM (
                    SELECT
                        angsuran_pembiayaan_dana.id,
                        angsuran_pembiayaan_dana.motor_pembiayaan_dana_id,
                        angsuran_pembiayaan_dana.wilayah_pembiayaan_dana_id,
                        angsuran_pembiayaan_dana.tahun,
                        angsuran_pembiayaan_dana.status_stnk_id,
                        angsuran_pembiayaan_dana.status_bpkb_id,
                        angsuran_pembiayaan_dana.pencairan,
                        {$sub_query_imploded}
                        angsuran_pembiayaan_dana.created_at,
                        angsuran_pembiayaan_dana.updated_at
                    FROM
                        angsuran_pembiayaan_dana
                ) x ";

        $where = " WHERE x.pencairan LIKE '%". $search ."%' AND x.motor_pembiayaan_dana_id = $motor_pembiayaan_dana->id ";
        $order_by = " ORDER BY x.pencairan ASC ";
        $limit = " LIMIT ". $offset . ', '. $limit . " ";
        

        $data['total'] = DB::select("SELECT COUNT(*) as count FROM ($query) y")[0]->count;

        $rows = DB::select($query. $where. $order_by. $limit);
        
        $data['rows'] = [];
        foreach($rows as $row){
            $row->status_stnk = StatusStnk::find($row->status_stnk_id);
            $row->status_bpkb = StatusBpkb::find($row->status_bpkb_id);
            $row->wilayah_pembiayaan_dana = WilayahPembiayaanDana::find($row->wilayah_pembiayaan_dana_id);
            $data['rows'][] = $row;
        }

        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MotorPembiayaanDana $motor_pembiayaan_dana)
    {

        $list_tempo_angsuran_pembiayaan_dana = TempoAngsuranPembiayaanDana::all();
        return view('admin.angsuran_pembiayaan_dana.index', compact('motor_pembiayaan_dana', 'list_tempo_angsuran_pembiayaan_dana'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(MotorPembiayaanDana $motor_pembiayaan_dana)
    {
        $list_tempo_angsuran_pembiayaan_dana = TempoAngsuranPembiayaanDana::all();
        $list_status_stnk = StatusStnk::all();
        $list_status_bpkb = StatusBpkb::all();
        $list_wilayah_pembiayaan_dana = WilayahPembiayaanDana::all();
        return view('admin.angsuran_pembiayaan_dana.create', compact('motor_pembiayaan_dana', 'list_tempo_angsuran_pembiayaan_dana', 'list_status_stnk', 'list_status_bpkb', 'list_wilayah_pembiayaan_dana'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MotorPembiayaanDana $motor_pembiayaan_dana, Request $request)
    {

        // return $request->all();
        $request->validate([
            'pencairan' => 'required',
            'tahun' => 'required',
            'wilayah_pembiayaan_dana_id' => 'required',
            'status_stnk_id' => 'required',
            'status_bpkb_id' => 'required',
        ]);

        $angsuran_pembiayaan_dana = AngsuranPembiayaanDana::create([
            'motor_pembiayaan_dana_id' => $motor_pembiayaan_dana->id,
            'pencairan' => str_replace('.', '', $request->get('pencairan')),
            'tahun' => $request->get('tahun'),
            'wilayah_pembiayaan_dana_id' => $request->get('wilayah_pembiayaan_dana_id'),
            'status_stnk_id' => $request->get('status_stnk_id'),
            'status_bpkb_id' => $request->get('status_bpkb_id'),
        ]);

        foreach($request->get('tempo_angsuran_pembiayaan_dana_id') as $tempo_angsuran_pembiayaan_dana_id => $angsuran_per_bulan){
            if($angsuran_per_bulan){
                AngsuranPembiayaanDanaDetail::create([
                    'angsuran_pembiayaan_dana_id' => $angsuran_pembiayaan_dana->id,
                    'tempo_angsuran_pembiayaan_dana_id' => $tempo_angsuran_pembiayaan_dana_id,
                    'angsuran_per_bulan' => str_replace('.', '', $angsuran_per_bulan)
                ]);
            }
            
        }

        return redirect()->route('admin.angsuran_pembiayaan_dana.index', $motor_pembiayaan_dana->id);
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
    public function edit(AngsuranPembiayaanDana $angsuran_pembiayaan_dana)
    {

        
        $list_tempo_angsuran_pembiayaan_dana = TempoAngsuranPembiayaanDana::all();
        $list_status_stnk = StatusStnk::all();
        $list_status_bpkb = StatusBpkb::all();

        return view('admin.angsuran_pembiayaan_dana.edit', compact('angsuran_pembiayaan_dana', 'list_tempo_angsuran_pembiayaan_dana', 'list_status_stnk', 'list_status_bpkb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AngsuranPembiayaanDana $angsuran_pembiayaan_dana)
    {
        $request->validate([
            'pencairan' => 'required',
            'tahun' => 'required',
            'status_stnk_id' => 'required',
            'status_bpkb_id' => 'required',
        ]);

        $angsuran_pembiayaan_dana->update([
            'motor_pembiayaan_dana_id' => $angsuran_pembiayaan_dana->motor_pembiayaan_dana->id,
            'pencairan' => str_replace('.', '', $request->get('pencairan')),
            'tahun' => $request->get('tahun'),
            'status_stnk_id' => $request->get('status_stnk_id'),
            'status_bpkb_id' => $request->get('status_bpkb_id'),
        ]);
        
        AngsuranPembiayaanDanaDetail::where('angsuran_pembiayaan_dana_id', $angsuran_pembiayaan_dana->id)->delete();
        foreach($request->get('tempo_angsuran_pembiayaan_dana_id') as $tempo_angsuran_pembiayaan_dana_id => $angsuran_per_bulan){
            if($angsuran_per_bulan){
                AngsuranPembiayaanDanaDetail::create([
                    'angsuran_pembiayaan_dana_id' => $angsuran_pembiayaan_dana->id,
                    'tempo_angsuran_pembiayaan_dana_id' => $tempo_angsuran_pembiayaan_dana_id,
                    'angsuran_per_bulan' => str_replace('.', '', $angsuran_per_bulan)
                ]);
            }
            
        }

        return redirect()->route('admin.angsuran_pembiayaan_dana.index', $angsuran_pembiayaan_dana->motor_pembiayaan_dana->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AngsuranPembiayaanDana $angsuran_pembiayaan_dana)
    {
        $motor_pembiayaan_dana_id = $angsuran_pembiayaan_dana->motor_pembiayaan_dana_id;
        $angsuran_pembiayaan_dana->angsuran_pembiayaan_dana_detail()->delete();
        $angsuran_pembiayaan_dana->delete();
        return redirect()->route('admin.angsuran_pembiayaan_dana.index', $motor_pembiayaan_dana_id);
    }
}
