<?php

namespace App\Http\Controllers\Admin;

use App\StatusBpkb;
use App\PabrikanMotor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StatusBpkbController extends Controller
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
        
        $status_bpkb = StatusBpkb::search($search);
        $data['total'] = $status_bpkb->count();


        $status_bpkb->skip($offset);
        $status_bpkb->limit($limit);
        $status_bpkb->orderBy($sort, $order);

        $data['rows'] = $status_bpkb->get();

        return $data;
    }

    public function index()
    {
        return view('admin.status_bpkb.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status_bpkb.create');
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

        StatusBpkb::create($data);
        return redirect()->route('admin.status_bpkb.index');
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
    public function edit(StatusBpkb $status_bpkb)
    {
        return view('admin.status_bpkb.edit', compact('status_bpkb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusBpkb $status_bpkb)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = [
            'name' => $request->get('name'),
        ];
        
        $status_bpkb->update($data);
        return redirect()->route('admin.status_bpkb.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusBpkb $status_bpkb)
    {
        $status_bpkb->delete();
        return redirect()->route('admin.status_bpkb.index');
    }
}
