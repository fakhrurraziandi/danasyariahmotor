<?php

namespace App\Http\Controllers\Admin;

use App\TypeMotor;
use App\PabrikanMotor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TypeMotorController extends Controller
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
        
        $type_motor = TypeMotor::with(['motor'])->search($search);
        $data['total'] = $type_motor->count();


        $type_motor->skip($offset);
        $type_motor->limit($limit);
        $type_motor->orderBy($sort, $order);

        $data['rows'] = $type_motor->get();

        return $data;
    }

    public function index()
    {
        return view('admin.type_motor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.type_motor.create');
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

        TypeMotor::create($data);
        return redirect()->route('admin.type_motor.index');
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
    public function edit(TypeMotor $type_motor)
    {
        return view('admin.type_motor.edit', compact('type_motor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeMotor $type_motor)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = [
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
        ];
        
        $type_motor->update($data);
        return redirect()->route('admin.type_motor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeMotor $type_motor)
    {
        $type_motor->delete();
        return redirect()->route('admin.type_motor.index');
    }
}
