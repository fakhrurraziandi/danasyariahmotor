<?php

namespace App\Http\Controllers\Admin;

use App\Notification;
use Illuminate\Http\Request;
use App\PengajuanKreditMotor;
use App\Http\Controllers\Controller;

class PengajuanKreditMotorController extends Controller
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
        
        $pengajuan_kredit_motor = PengajuanKreditMotor::with([
            'user',
            'wilayah_kredit_motor',
            'angsuran_motor',
            'angsuran_motor_detail',
            'cs_kredit_motor',
            'spv_kredit_motor',

        ])->search($search);
        $data['total'] = $pengajuan_kredit_motor->count();


        $pengajuan_kredit_motor->skip($offset);
        $pengajuan_kredit_motor->limit($limit);
        $pengajuan_kredit_motor->orderBy($sort, $order);

        $data['rows'] = $pengajuan_kredit_motor->get();

        return $data;
    }

    public function index()
    {
        return view('admin.pengajuan_kredit_motor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengajuan_kredit_motor.create');
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

        PengajuanKreditMotor::create($data);
        return redirect()->route('admin.pengajuan_kredit_motor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PengajuanKreditMotor $pengajuan_kredit_motor)
    {
        return view('admin.pengajuan_kredit_motor.show', compact('pengajuan_kredit_motor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PengajuanKreditMotor $pengajuan_kredit_motor)
    {
        return view('admin.pengajuan_kredit_motor.edit', compact('pengajuan_kredit_motor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengajuanKreditMotor $pengajuan_kredit_motor)
    {
        $request->validate([
            'user_id' => 'required', 
            
            'wilayah_kredit_motor_id' => 'required',
            'tempo_angsuran_kredit_motor_id' => 'required', 
            'motor_kredit_motor_id' => 'required', 
            'status_stnk_id' => 'required', 
            'status_bpkb_id' => 'required', 
            'status_rumah_id' => 'required', 
            
            // 'cs_kredit_motor_id' => 'required', 
            // 'cs_kredit_motor_status' => 'required', 
            // 'spv_kredit_motor_id' => 'required',
            // 'spv_kredit_motor_status' => 'required',
            // 'manager_kredit_motor_id' => 'required',
            
            // 'plafond_pembiayaan_disetujui' => 'required',
            // 'tempo_angsuran_pembiayaan_id_disetujui' => 'required',
            // 'angsuran' => 'required',

        ]);

        $data = [
            
            'user_id' => $request->get('user_id'),
            
            'wilayah_kredit_motor_id' => $request->get('wilayah_kredit_motor_id'),
            'tempo_angsuran_kredit_motor_id' => $request->get('tempo_angsuran_kredit_motor_id'),
            'motor_kredit_motor_id' => $request->get('motor_kredit_motor_id'),
            'status_stnk_id' => $request->get('status_stnk_id'),
            'status_bpkb_id' => $request->get('status_bpkb_id'),
            'status_rumah_id' => $request->get('status_rumah_id'),
            
            // 'cs_kredit_motor_id' => $request->get('cs_kredit_motor_id'),
            // 'cs_kredit_motor_status' => $request->get('cs_kredit_motor_status'),
            // 'spv_kredit_motor_id' => $request->get('spv_kredit_motor_id'),
            // 'spv_kredit_motor_status' => $request->get('spv_kredit_motor_status'),
            // 'manager_kredit_motor_id' => $request->get('manager_kredit_motor_id'),
            
            'plafond_pembiayaan_disetujui' => $request->get('plafond_pembiayaan_disetujui'),
            'tempo_angsuran_pembiayaan_id_disetujui' => $request->get('tempo_angsuran_pembiayaan_id_disetujui'),
            'angsuran' => $request->get('angsuran'),
        ];

       
        
        $pengajuan_kredit_motor->update($data);
        return redirect()->route('admin.pengajuan_kredit_motor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengajuanKreditMotor $pengajuan_kredit_motor)
    {

        $notifications = Notification::all();

        foreach($notifications as $notification){
            $data = $notification->data;
            $data = json_decode($data, true);

            
            if(isset($data['data']['pengajuan_kredit_motor']) && $data['data']['pengajuan_kredit_motor']['id'] == $pengajuan_kredit_motor->id){
                $notification->delete();
            }
            
        }
        $pengajuan_kredit_motor->delete();
        return redirect()->route('admin.pengajuan_kredit_motor.index');
    }

    public function export_pdf(Request $request)
    {
        // return $request->all();
        $from = $request->get('from');
        $to = $request->get('to');

        
        

        $pengajuan_kredit_motor = PengajuanKreditMotor::whereRaw("DATE(created_at) BETWEEN '". $from ."' AND '". $to ."'")->get();

        $html = view('admin.pengajuan_kredit_motor.export_pdf', compact('pengajuan_kredit_motor'))->render();

        $mpdf = new \Mpdf\Mpdf([
            'orientation' => 'L',
            'tempDir' => storage_path()
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();

        
    }
}
