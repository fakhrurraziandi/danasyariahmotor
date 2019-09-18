<?php

namespace App\Http\Controllers\Admin;

use App\PabrikanMotor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PabrikanMotorController extends Controller
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
        
        $pabrikan_motor = PabrikanMotor::search($search);
        $data['total'] = $pabrikan_motor->count();


        $pabrikan_motor->skip($offset);
        $pabrikan_motor->limit($limit);
        $pabrikan_motor->orderBy($sort, $order);

        $data['rows'] = $pabrikan_motor->get();

        return $data;
    }

    public function index()
    {
        return view('admin.pabrikan_motor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pabrikan_motor.create');
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

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            Storage::disk('public')->put($logo->getClientOriginalName(),  File::get($logo));
            $data['logo'] = $logo->getClientOriginalName();
        }

        

        

        PabrikanMotor::create($data);
        return redirect()->route('admin.pabrikan_motor.index');
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
    public function edit(PabrikanMotor $pabrikan_motor)
    {
        return view('admin.pabrikan_motor.edit', compact('pabrikan_motor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PabrikanMotor $pabrikan_motor)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $data = [
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
        ];

        if($request->hasFile('logo')){

            $logo = $request->file('logo');
            Storage::disk('public')->put($logo->getClientOriginalName(),  File::get($logo));

            $data['logo'] = $logo->getClientOriginalName();
        }
        
        $pabrikan_motor->update($data);
        return redirect()->route('admin.pabrikan_motor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PabrikanMotor $pabrikan_motor)
    {
        $pabrikan_motor->delete();
        return redirect()->route('admin.pabrikan_motor.index');
    }
}
