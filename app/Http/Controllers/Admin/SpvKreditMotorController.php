<?php

namespace App\Http\Controllers\Admin;

use App\Wilayah;

use App\SpvKreditMotor;
use App\WilayahKreditMotor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\SpvKreditMotorWilayahKreditMotor;

class SpvKreditMotorController extends Controller
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
        
        $spv_kredit_motor = SpvKreditMotor::with('wilayah_kredit_motor')->search($search);
        $data['total'] = $spv_kredit_motor->count();

        $spv_kredit_motor->skip($offset);
        $spv_kredit_motor->limit($limit);
        $spv_kredit_motor->orderBy($sort, $order);

        $data['rows'] = $spv_kredit_motor->get();

        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.spv_kredit_motor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_wilayah_kredit_motor = WilayahKreditMotor::all();
        return view('admin.spv_kredit_motor.create', compact('list_wilayah_kredit_motor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $role_id = $request->get('role_id');    
        
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:spv_kredit_motor'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required'],
            'wilayah_kredit_motor_ids' => ['required', 'array', 'min:1'],
        ];

        $request->validate($rules);

        $spv_kredit_motor = SpvKreditMotor::create($request->all());

        if($spv_kredit_motor){

            $wilayah_kredit_motor_ids = $request->get('wilayah_kredit_motor_ids');
            if(count($wilayah_kredit_motor_ids)){
                foreach($wilayah_kredit_motor_ids as $wilayah_kredit_motor_id){
                    SpvKreditMotorWilayahKreditMotor::create([
                        'spv_kredit_motor_id' => $spv_kredit_motor->id,
                        'wilayah_kredit_motor_id' => $wilayah_kredit_motor_id
                    ]);
                }
            }
        }

        return redirect()->route('admin.spv_kredit_motor.index');
        
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
    public function edit(SpvKreditMotor $spv_kredit_motor)
    {
        
        $list_wilayah_kredit_motor = WilayahKreditMotor::all();
        return view('admin.spv_kredit_motor.edit', compact('spv_kredit_motor', 'list_wilayah_kredit_motor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpvKreditMotor $spv_kredit_motor)
    {

        
        
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:spv_kredit_motor,email,'. $spv_kredit_motor->id],
            'phone_number' => ['required'],
            'wilayah_kredit_motor_ids' => ['required', 'array', 'min:1'],
        ];

        $request->validate($rules);

        $spv_kredit_motor->update($request->all());

        if($spv_kredit_motor){

            SpvKreditMotorWilayahKreditMotor::where('spv_kredit_motor_id', $spv_kredit_motor->id)->delete();
            
            $wilayah_kredit_motor_ids = $request->get('wilayah_kredit_motor_ids');
            if(count($wilayah_kredit_motor_ids)){
                foreach($wilayah_kredit_motor_ids as $wilayah_kredit_motor_id){
                    SpvKreditMotorWilayahKreditMotor::create([
                        'spv_kredit_motor_id' => $spv_kredit_motor->id,
                        'wilayah_kredit_motor_id' => $wilayah_kredit_motor_id
                    ]);
                }
            }

        }

        return redirect()->route('admin.spv_kredit_motor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpvKreditMotor $spv_kredit_motor)
    {
        $spv_kredit_motor->delete();
        return redirect()->route('admin.spv_kredit_motor.index');
    }

    public function changePassword(SpvKreditMotor $spv_kredit_motor)
    {
        return view('admin.spv_kredit_motor.change_password', compact('spv_kredit_motor'));
    }

    public function updatePassword(Request $request, SpvKreditMotor $spv_kredit_motor)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $spv_kredit_motor->update([
            'password' => Hash::make($request->get('password')),
        ]);

        return redirect()->route('admin.spv_kredit_motor.index');
    }
}
