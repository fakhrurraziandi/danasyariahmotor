<?php

namespace App\Http\Controllers\Admin;

use App\WarnaMotor;
use App\PabrikanMotor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class WarnaMotorController extends Controller
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
        
        $warna_motor = WarnaMotor::search($search);
        $data['total'] = $warna_motor->count();


        $warna_motor->skip($offset);
        $warna_motor->limit($limit);
        $warna_motor->orderBy($sort, $order);

        $data['rows'] = $warna_motor->get();

        return $data;
    }

    public function index()
    {
        return view('admin.warna_motor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.warna_motor.create');
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

        $data = [
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
        ];

        WarnaMotor::create($data);
        return redirect()->route('admin.warna_motor.index');
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
    public function edit(WarnaMotor $warna_motor)
    {
        return view('admin.warna_motor.edit', compact('warna_motor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarnaMotor $warna_motor)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = [
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
        ];
        
        
        $warna_motor->update($data);
        return redirect()->route('admin.warna_motor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WarnaMotor $warna_motor)
    {
        $warna_motor->delete();
        return redirect()->route('admin.warna_motor.index');
    }
}
