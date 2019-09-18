<?php

namespace App\Http\Controllers\Admin;

use App\StatusRumah;
use App\PabrikanMotor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StatusRumahController extends Controller
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
        
        $status_rumah = StatusRumah::search($search);
        $data['total'] = $status_rumah->count();


        $status_rumah->skip($offset);
        $status_rumah->limit($limit);
        $status_rumah->orderBy($sort, $order);

        $data['rows'] = $status_rumah->get();

        return $data;
    }

    public function index()
    {
        return view('admin.status_rumah.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status_rumah.create');
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

        $data = [
            'name' => $request->get('name'),
        ];

        StatusRumah::create($data);
        return redirect()->route('admin.status_rumah.index');
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
    public function edit(StatusRumah $status_rumah)
    {
        return view('admin.status_rumah.edit', compact('status_rumah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusRumah $status_rumah)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = [
            'name' => $request->get('name'),
        ];
        
        $status_rumah->update($data);
        return redirect()->route('admin.status_rumah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusRumah $status_rumah)
    {
        $status_rumah->delete();
        return redirect()->route('admin.status_rumah.index');
    }
}
