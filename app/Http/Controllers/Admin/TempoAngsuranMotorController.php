<?php

namespace App\Http\Controllers\Admin;


use App\TempoAngsuranMotor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TempoAngsuranMotorController extends Controller
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
        
        $tempo_angsuran_motor = TempoAngsuranMotor::search($search);
        $data['total'] = $tempo_angsuran_motor->count();


        $tempo_angsuran_motor->skip($offset);
        $tempo_angsuran_motor->limit($limit);
        $tempo_angsuran_motor->orderBy($sort, $order);

        $data['rows'] = $tempo_angsuran_motor->get();

        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tempo_angsuran_motor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tempo_angsuran_motor.create');
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
        
        TempoAngsuranMotor::create($request->all());
        return redirect()->route('admin.tempo_angsuran_motor.index');
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
    public function edit(TempoAngsuranMotor $tempo_angsuran_motor)
    {
        return view('admin.tempo_angsuran_motor.edit', compact('tempo_angsuran_motor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TempoAngsuranMotor $tempo_angsuran_motor)
    {
        $request->validate([
            'tempo' => 'required',
        ]);
        
        $tempo_angsuran_motor->update($request->all());
        return redirect()->route('admin.tempo_angsuran_motor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempoAngsuranMotor $tempo_angsuran_motor)
    {
        $tempo_angsuran_motor->delete();
        return redirect()->route('admin.tempo_angsuran_motor.index');
    }
}
