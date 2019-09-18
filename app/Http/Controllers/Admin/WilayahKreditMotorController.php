<?php

namespace App\Http\Controllers\Admin;


use App\WilayahKreditMotor;
use Illuminate\Http\Request;
use Yajra\Acl\Models\Permission;
use App\Http\Controllers\Controller;

class WilayahKreditMotorController extends Controller
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
        
        $data_wilayah_kredit_motor = WilayahKreditMotor::search($search);
        $data['total'] = $data_wilayah_kredit_motor->count();


        $data_wilayah_kredit_motor->skip($offset);
        $data_wilayah_kredit_motor->limit($limit);
        $data_wilayah_kredit_motor->orderBy($sort, $order);

        $data['rows'] = $data_wilayah_kredit_motor->get();

        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.wilayah_kredit_motor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wilayah_kredit_motor.create');
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
        ]);
        
        WilayahKreditMotor::create($request->all());
        return redirect()->route('admin.wilayah_kredit_motor.index');
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
    public function edit(WilayahKreditMotor $wilayah_kredit_motor)
    {
        return view('admin.wilayah_kredit_motor.edit', compact('wilayah_kredit_motor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WilayahKreditMotor $wilayah_kredit_motor)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $wilayah_kredit_motor->update($request->all());
        return redirect()->route('admin.wilayah_kredit_motor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WilayahKreditMotor $wilayah_kredit_motor)
    {
        $wilayah_kredit_motor->delete();
        return redirect()->route('admin.wilayah_kredit_motor.index');
    }
}
