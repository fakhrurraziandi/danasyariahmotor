<?php

namespace App\Http\Controllers\Admin;

use App\Motor;
use App\TestimoniMotor;
use App\TempoAngsuranMotor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TestimoniMotorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function json(Motor $motor, Request $request)
    {
        $limit = $request->filled('limit') ? $request->get('limit') : 10;
		$offset = $request->filled('offset') ? $request->get('offset') : 0;
		$search = $request->filled('search') ? $request->get('search') : '';
		$sort = $request->filled('sort') ? $request->get('sort') : 'id';
        $order = $request->filled('order') ? $request->get('order') : 'ASC';
        
        $testimoni_motor = TestimoniMotor::where('motor_id', $motor->id)->search($search);
        $data['total'] = $testimoni_motor->count();


        $testimoni_motor->skip($offset);
        $testimoni_motor->limit($limit);
        $testimoni_motor->orderBy($sort, $order);

        $data['rows'] = $testimoni_motor->get();

        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Motor $motor)
    {
        return view('admin.testimoni_motor.index', compact('motor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Motor $motor)
    {
        return view('admin.testimoni_motor.create', compact('motor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Motor $motor, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required',
            'rate' => 'required'
        ]);

        $testimoni_motor = TestimoniMotor::create([
            'motor_id' => $motor->id,
            'name' => $request->get('name'),
            'message' => $request->get('message'),
            'rate' => $request->get('rate'),
        ]);

        return redirect()->route('admin.testimoni_motor.index', $motor->id);
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
    public function edit(TestimoniMotor $testimoni_motor)
    {
        
        $list_tempo_angsuran_motor = TempoAngsuranMotor::all();

        
        return view('admin.testimoni_motor.edit', compact('testimoni_motor', 'list_tempo_angsuran_motor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestimoniMotor $testimoni_motor)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required',
            'rate' => 'required'
        ]);

        $testimoni_motor->update([
            'name' => $request->get('name'),
            'message' => $request->get('message'),
            'rate' => $request->get('rate'),
        ]);

        return redirect()->route('admin.testimoni_motor.index', $testimoni_motor->motor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestimoniMotor $testimoni_motor)
    {
        $motor_id = $testimoni_motor->motor_id;
        $testimoni_motor->delete();
        return redirect()->route('admin.testimoni_motor.index', $motor_id);
    }
}
