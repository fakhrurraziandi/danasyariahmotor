<?php

namespace App\Http\Controllers\Admin;

use App\Motor;
use App\AngsuranMotor;
use App\TempoAngsuranMotor;
use App\AngsuranMotorDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AngsuranMotorController extends Controller
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
        
        $list_tempo_angsuran_motor = TempoAngsuranMotor::all();
        
        $sub_query = [];
        foreach($list_tempo_angsuran_motor as $tempo_angsuran_motor){
            $sub_query[] = "(
                SELECT 
                    angsuran_motor_detail.angsuran_per_bulan 
                FROM angsuran_motor_detail 
                WHERE 
                    angsuran_motor_detail.tempo_angsuran_motor_id = {$tempo_angsuran_motor->id} AND angsuran_motor_detail.angsuran_motor_id = angsuran_motor.id LIMIT 1
            ) AS '{$tempo_angsuran_motor->tempo}' ";
        }

        if(count($sub_query)){
            $sub_query_imploded = implode(', ', $sub_query). ', ';
        }else{
            $sub_query_imploded = '';
        }
        
        
        $query = "SELECT * FROM (
                    SELECT
                        angsuran_motor.id,
                        angsuran_motor.motor_id,
                        angsuran_motor.dp,
                        angsuran_motor.discount_dp,
                        IF(
                            angsuran_motor.discount_dp, 
                            (angsuran_motor.dp * (angsuran_motor.discount_dp / 100)),
                            NULL
                        ) AS discount_dp_calculated,
                        {$sub_query_imploded}
                        angsuran_motor.created_at,
                        angsuran_motor.updated_at
                    FROM
                    angsuran_motor 
                ) x ";

        
        
        $where = " WHERE x.dp LIKE '%". $search ."%' AND x.motor_id = $motor->id ";
        $order_by = " ORDER BY x.dp ASC ";
        $limit = " LIMIT ". $offset . ', '. $limit . " ";
        
        // $angsuran_motor = AngsuranMotor::where('motor_id', $motor->id)->search($search);

        // $data['total'] = $angsuran_motor->count();
        $data['total'] = DB::select("SELECT COUNT(*) as count FROM ($query) y")[0]->count;


        // $angsuran_motor->skip($offset);
        // $angsuran_motor->limit($limit);
        // $angsuran_motor->orderBy($sort, $order);

        // $data['rows'] = $angsuran_motor->get();
        // return $query. $where. $limit;

        $data['rows'] = DB::select($query. $where. $order_by. $limit);

        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Motor $motor)
    {
        $list_tempo_angsuran_motor = TempoAngsuranMotor::all();
        return view('admin.angsuran_motor.index', compact('motor', 'list_tempo_angsuran_motor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Motor $motor)
    {
        $list_tempo_angsuran_motor = TempoAngsuranMotor::all();
        return view('admin.angsuran_motor.create', compact('motor', 'list_tempo_angsuran_motor'));
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
            'dp' => 'required'
        ]);

        $angsuran_motor = AngsuranMotor::create([
            'motor_id' => $motor->id,
            'dp' => str_replace('.', '', $request->get('dp')),
            'discount_dp' => $request->get('discount_dp')
        ]);

        foreach($request->get('tempo_angsuran_motor_id') as $tempo_angsuran_motor_id => $angsuran_per_bulan){
            if($angsuran_per_bulan){
                AngsuranMotorDetail::create([
                    'angsuran_motor_id' => $angsuran_motor->id,
                    'tempo_angsuran_motor_id' => $tempo_angsuran_motor_id,
                    'angsuran_per_bulan' => str_replace('.', '', $angsuran_per_bulan)
                ]);
            }
            
        }

        return redirect()->route('admin.angsuran_motor.index', $motor->id);
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
    public function edit(AngsuranMotor $angsuran_motor)
    {
        
        $list_tempo_angsuran_motor = TempoAngsuranMotor::all();
        return view('admin.angsuran_motor.edit', compact('angsuran_motor', 'list_tempo_angsuran_motor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AngsuranMotor $angsuran_motor)
    {
        $request->validate([
            'dp' => 'required'
        ]);

        $angsuran_motor->update([
            'motor_id' => $angsuran_motor->motor->id,
            'dp' => str_replace('.', '', $request->get('dp')),
            'discount_dp' => $request->get('discount_dp')
        ]);
        
        AngsuranMotorDetail::where('angsuran_motor_id', $angsuran_motor->id)->delete();
        foreach($request->get('tempo_angsuran_motor_id') as $tempo_angsuran_motor_id => $angsuran_per_bulan){
            if($angsuran_per_bulan){
                AngsuranMotorDetail::create([
                    'angsuran_motor_id' => $angsuran_motor->id,
                    'tempo_angsuran_motor_id' => $tempo_angsuran_motor_id,
                    'angsuran_per_bulan' => str_replace('.', '', $angsuran_per_bulan)
                ]);
            }
            
        }

        return redirect()->route('admin.angsuran_motor.index', $angsuran_motor->motor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AngsuranMotor $angsuran_motor)
    {
        $motor_id = $angsuran_motor->motor_id;
        $angsuran_motor->angsuran_motor_detail()->delete();
        $angsuran_motor->delete();
        return redirect()->route('admin.angsuran_motor.index', $motor_id);
    }
}
