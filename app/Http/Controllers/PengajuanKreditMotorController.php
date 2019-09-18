<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\PengajuanKreditMotor;
use Illuminate\Http\Request;

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
        
        $pengajuan_kredit_motor = PengajuanKreditMotor::with(['angsuran_motor_detail' => function($query){
            $query->with([
                'angsuran_motor' => function($query){
                    $query->with('motor');
                }, 
                'tempo_angsuran_motor'
            ]);
        }])->where('user_id', auth()->user()->id)->search($search);
        $data['total'] = $pengajuan_kredit_motor->count();


        $pengajuan_kredit_motor->skip($offset);
        $pengajuan_kredit_motor->limit($limit);
        $pengajuan_kredit_motor->orderBy($sort, $order);

        $data['rows'] = $pengajuan_kredit_motor->get();

        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengajuan_kredit_motor.index');
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
    public function show(PengajuanKreditMotor $pengajuan_kredit_motor)
    {
        
        return view('pengajuan_kredit_motor.show', compact('pengajuan_kredit_motor'));
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
        //
    }
}
