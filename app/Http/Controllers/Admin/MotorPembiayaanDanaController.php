<?php

namespace App\Http\Controllers\Admin;

use App\MotorPembiayaanDana;
use App\PabrikanMotor;


use App\MotorWarnaMotor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MotorPembiayaanDanaController extends Controller
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
        
        $motor_pembiayaan_dana = MotorPembiayaanDana::with([
            'pabrikan_motor',
        ])->search($search);

        $data['total'] = $motor_pembiayaan_dana->count();


        $motor_pembiayaan_dana->skip($offset);
        $motor_pembiayaan_dana->limit($limit);
        $motor_pembiayaan_dana->orderBy($sort, $order);

        $data['rows'] = $motor_pembiayaan_dana->get();

        return $data;
    }

    public function index()
    {
        return view('admin.motor_pembiayaan_dana.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_pabrikan_motor = PabrikanMotor::all();
      

        return view('admin.motor_pembiayaan_dana.create', compact(
            'list_pabrikan_motor'
        ));
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
            'pabrikan_motor_id' => 'required',
        ]);

        $data = [
            'name' => $request->get('name'),
            'pabrikan_motor_id' => $request->get('pabrikan_motor_id'),
        ];

        $motor_pembiayaan_dana = MotorPembiayaanDana::create($data);

        return redirect()->route('admin.motor_pembiayaan_dana.index');
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
    public function edit(MotorPembiayaanDana $motor_pembiayaan_dana)
    {
        $list_pabrikan_motor = PabrikanMotor::all();
      

        return view('admin.motor_pembiayaan_dana.edit', compact(
            'motor_pembiayaan_dana',
            'list_pabrikan_motor'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MotorPembiayaanDana $motor_pembiayaan_dana)
    {
        // return $request->all();

        $request->validate([
            'name' => 'required',
         
            'pabrikan_motor_id' => 'required',
           
        ]);

        $data = [
            'name' => $request->get('name'),
         
            'pabrikan_motor_id' => $request->get('pabrikan_motor_id'),
           
        ];
        
        $motor_pembiayaan_dana->update($data);

      
        return redirect()->route('admin.motor_pembiayaan_dana.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MotorPembiayaanDana $motor_pembiayaan_dana)
    {
        $motor_pembiayaan_dana->delete();
        return redirect()->route('admin.motor_pembiayaan_dana.index');
    }
}
