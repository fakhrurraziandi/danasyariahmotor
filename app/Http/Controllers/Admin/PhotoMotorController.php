<?php

namespace App\Http\Controllers\Admin;

use App\Motor;
use App\PhotoMotor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PhotoMotorController extends Controller
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
        
        $photo_motor = PhotoMotor::where('motor_id', $motor->id)->search($search);

        $data['total'] = $photo_motor->count();


        $photo_motor->skip($offset);
        $photo_motor->limit($limit);
        $photo_motor->orderBy($sort, $order);

        $data['rows'] = $photo_motor->get();

        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Motor $motor)
    {
        return view('admin.photo_motor.index', compact('motor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Motor $motor)
    {
        return view('admin.photo_motor.create', compact('motor'));
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
            'photo' => 'mimes:jpeg,jpg,bmp,png'
        ]);

        $photo = $request->file('photo');
        Storage::disk('public')->put($photo->getClientOriginalName(), File::get($photo));

        $data = [
            'motor_id' => $motor->id,
            'photo' => $photo->getClientOriginalName()
        ];

        PhotoMotor::create($data);
        return redirect()->route('admin.photo_motor.index', $motor->id);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotoMotor $photo_motor)
    {
        $motor_id = $photo_motor->motor_id;
        $photo_motor->delete();
        return redirect()->route('admin.photo_motor.index', $motor_id);
    }
}
