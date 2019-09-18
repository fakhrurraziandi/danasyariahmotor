<?php

namespace App\Http\Controllers\Admin;

use App\Wilayah;

use App\CsKreditMotor;
use App\WilayahKreditMotor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\CsKreditMotorWilayahKreditMotor;

class CsKreditMotorController extends Controller
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
        
        $cs_kredit_motor = CsKreditMotor::with(['spv_kredit_motor', 'wilayah_kredit_motor'])->search($search);
        $data['total'] = $cs_kredit_motor->count();

        $cs_kredit_motor->skip($offset);
        $cs_kredit_motor->limit($limit);
        $cs_kredit_motor->orderBy($sort, $order);

        $data['rows'] = $cs_kredit_motor->get();

        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cs_kredit_motor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_wilayah_kredit_motor = WilayahKreditMotor::all();
        return view('admin.cs_kredit_motor.create', compact('list_wilayah_kredit_motor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $role_id = $request->get('role_id');    
        
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:cs_kredit_motor'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required'],
            'spv_kredit_motor_id' => ['required'],
        ];

        $request->validate($rules);

        $cs_kredit_motor = CsKreditMotor::create($request->all());
        if($cs_kredit_motor){

            $wilayah_kredit_motor_ids = $request->get('wilayah_kredit_motor_ids');
            if(count($wilayah_kredit_motor_ids)){
                foreach($wilayah_kredit_motor_ids as $wilayah_kredit_motor_id){
                    CsKreditMotorWilayahKreditMotor::create([
                        'cs_kredit_motor_id' => $cs_kredit_motor->id,
                        'wilayah_kredit_motor_id' => $wilayah_kredit_motor_id
                    ]);
                }
            }

        }

        

        return redirect()->route('admin.cs_kredit_motor.index');
        
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
    public function edit(CsKreditMotor $cs_kredit_motor)
    {
        
        $list_wilayah_kredit_motor = WilayahKreditMotor::all();
        return view('admin.cs_kredit_motor.edit', compact('cs_kredit_motor', 'list_wilayah_kredit_motor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CsKreditMotor $cs_kredit_motor)
    {

        $role_id = $request->get('role_id');    
        
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:cs_kredit_motor,email,'. $cs_kredit_motor->id],
            'phone_number' => ['required'],
            'spv_kredit_motor_id' => ['required'],
        ];

        $request->validate($rules);

        $cs_kredit_motor->update($request->all());

        if($cs_kredit_motor){

            CsKreditMotorWilayahKreditMotor::where('cs_kredit_motor_id', $cs_kredit_motor->id)->delete();
            
            $wilayah_kredit_motor_ids = $request->get('wilayah_kredit_motor_ids');
            if(count($wilayah_kredit_motor_ids)){
                foreach($wilayah_kredit_motor_ids as $wilayah_kredit_motor_id){
                    CsKreditMotorWilayahKreditMotor::create([
                        'cs_kredit_motor_id' => $cs_kredit_motor->id,
                        'wilayah_kredit_motor_id' => $wilayah_kredit_motor_id
                    ]);
                }
            }

        }

        return redirect()->route('admin.cs_kredit_motor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CsKreditMotor $cs_kredit_motor)
    {
        $cs_kredit_motor->delete();
        return redirect()->route('admin.cs_kredit_motor.index');
    }

    public function changePassword(CsKreditMotor $cs_kredit_motor)
    {
        return view('admin.cs_kredit_motor.change_password', compact('cs_kredit_motor'));
    }

    public function updatePassword(Request $request, CsKreditMotor $cs_kredit_motor)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $cs_kredit_motor->update([
            'password' => Hash::make($request->get('password')),
        ]);

        return redirect()->route('admin.cs_kredit_motor.index');
    }
}
