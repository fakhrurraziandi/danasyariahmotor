<?php

namespace App\Http\Controllers\Admin;

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
        $order = $request->filled('order') ? $request->get('order') : 'DESC';
        //
        $pengajuan_pembiayaan_dana = PengajuanPembiayaanDana::with([
            'user',
            'wilayah_pembiayaan_dana',
            'tempo_angsuran_pembiayaan_dana',
            'tempo_angsuran_pembiayaan_dana_disetujui',
            'motor_pembiayaan_dana',
            'status_stnk',
            'status_bpkb',
            'status_rumah',
            'cs_pembiayaan_dana',
            'spv_pembiayaan_dana',
            'manager_pembiayaan_dana',


        ])->search($search);
        $data['total'] = $pengajuan_pembiayaan_dana->count();


        $pengajuan_pembiayaan_dana->skip($offset);
        $pengajuan_pembiayaan_dana->limit($limit);
        $pengajuan_pembiayaan_dana->orderBy($sort, $order);

        $data['rows'] = $pengajuan_pembiayaan_dana->get();

        return $data;
    }

    public function index()
    {
        return view('admin.pengajuan_pembiayaan_dana.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengajuan_pembiayaan_dana.create');
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
            'slug' => 'required',
        ]);

        $logo = $request->file('logo');
        Storage::disk('public')->put($logo->getClientOriginalName(),  File::get($logo));

        $data = [
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'logo' => $logo->getClientOriginalName()
        ];

        PengajuanPembiayaanDana::create($data);
        return redirect()->route('admin.pengajuan_pembiayaan_dana.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PengajuanPembiayaanDana $pengajuan_pembiayaan_dana)
    {
        return view('admin.pengajuan_pembiayaan_dana.show', compact('pengajuan_pembiayaan_dana'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PengajuanPembiayaanDana $pengajuan_pembiayaan_dana)
    {
        return view('admin.pengajuan_pembiayaan_dana.edit', compact('pengajuan_pembiayaan_dana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengajuanPembiayaanDana $pengajuan_pembiayaan_dana)
    {
        $request->validate([
            'user_id' => 'required', 
            
            'wilayah_pembiayaan_dana_id' => 'required',
            'tempo_angsuran_pembiayaan_dana_id' => 'required', 
            'motor_pembiayaan_dana_id' => 'required', 
            'status_stnk_id' => 'required', 
            'status_bpkb_id' => 'required', 
            'status_rumah_id' => 'required', 
            
            // 'cs_pembiayaan_dana_id' => 'required', 
            // 'cs_pembiayaan_dana_status' => 'required', 
            // 'spv_pembiayaan_dana_id' => 'required',
            // 'spv_pembiayaan_dana_status' => 'required',
            // 'manager_pembiayaan_dana_id' => 'required',
            
            // 'plafond_pembiayaan_disetujui' => 'required',
            // 'tempo_angsuran_pembiayaan_id_disetujui' => 'required',
            // 'angsuran' => 'required',

        ]);

        $data = [
            
            'user_id' => $request->get('user_id'),
            
            'wilayah_pembiayaan_dana_id' => $request->get('wilayah_pembiayaan_dana_id'),
            'tempo_angsuran_pembiayaan_dana_id' => $request->get('tempo_angsuran_pembiayaan_dana_id'),
            'motor_pembiayaan_dana_id' => $request->get('motor_pembiayaan_dana_id'),
            'status_stnk_id' => $request->get('status_stnk_id'),
            'status_bpkb_id' => $request->get('status_bpkb_id'),
            'status_rumah_id' => $request->get('status_rumah_id'),
            
            // 'cs_pembiayaan_dana_id' => $request->get('cs_pembiayaan_dana_id'),
            // 'cs_pembiayaan_dana_status' => $request->get('cs_pembiayaan_dana_status'),
            // 'spv_pembiayaan_dana_id' => $request->get('spv_pembiayaan_dana_id'),
            // 'spv_pembiayaan_dana_status' => $request->get('spv_pembiayaan_dana_status'),
            // 'manager_pembiayaan_dana_id' => $request->get('manager_pembiayaan_dana_id'),
            
            'plafond_pembiayaan_disetujui' => $request->get('plafond_pembiayaan_disetujui'),
            'tempo_angsuran_pembiayaan_id_disetujui' => $request->get('tempo_angsuran_pembiayaan_id_disetujui'),
            'angsuran' => $request->get('angsuran'),
        ];

       
        
        $pengajuan_pembiayaan_dana->update($data);
        return redirect()->route('admin.pengajuan_pembiayaan_dana.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengajuanPembiayaanDana $pengajuan_pembiayaan_dana)
    {
        $notifications = Notification::all();

        foreach($notifications as $notification){
            $data = $notification->data;
            $data = json_decode($data, true);

            
            if(isset($data['data']['pengajuan_pembiayaan_dana']) && $data['data']['pengajuan_pembiayaan_dana']['id'] == $pengajuan_pembiayaan_dana->id){
                $notification->delete();
            }
            
        }

        $pengajuan_pembiayaan_dana->delete();
        return redirect()->route('admin.pengajuan_pembiayaan_dana.index');
    }

    public function export_pdf(Request $request)
    {
        // return $request->all();
        $from = $request->get('from');
        $to = $request->get('to');
        $mitra_id = $request->get('mitra_id');
        $go_live_only = $request->get('go_live_only');

        $where = [
            // "DATE(updated_at) BETWEEN '". $from ."' AND '". $to ."'"
        ];

        $where[] = "DATE(updated_at) >= CAST('". $from ."' AS DATE) AND DATE(updated_at) <= CAST('". $to ."' AS DATE)";

        if($mitra_id){
            $where[] = "mitra_id = ". $mitra_id;
        }

        if($go_live_only == 1){
            $where[] = "cs_pembiayaan_dana_status = 'approved'";
            $where[] = "spv_pembiayaan_dana_status = 'approved'";
        }
        $pengajuan_pembiayaan_dana = PengajuanPembiayaanDana::whereRaw(implode(' AND ', $where))->get();

        $html = view('admin.pengajuan_pembiayaan_dana.export_pdf', compact('pengajuan_pembiayaan_dana'))->render();

        $mpdf = new \Mpdf\Mpdf([
            'orientation' => 'L',
            'tempDir' => storage_path()
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}
