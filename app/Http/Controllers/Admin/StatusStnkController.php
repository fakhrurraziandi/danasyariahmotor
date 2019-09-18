<?php

namespace App\Http\Controllers\Admin;

use App\StatusStnk;
use App\PabrikanMotor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StatusStnkController extends Controller
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
        
        $status_stnk = StatusStnk::search($search);
        $data['total'] = $status_stnk->count();


        $status_stnk->skip($offset);
        $status_stnk->limit($limit);
        $status_stnk->orderBy($sort, $order);

        $data['rows'] = $status_stnk->get();

        return $data;
    }

    public function index()
    {
        return view('admin.status_stnk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status_stnk.create');
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

        StatusStnk::create($data);
        return redirect()->route('admin.status_stnk.index');
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
    public function edit(StatusStnk $status_stnk)
    {
        return view('admin.status_stnk.edit', compact('status_stnk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusStnk $status_stnk)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = [
            'name' => $request->get('name'),
        ];
        
        $status_stnk->update($data);
        return redirect()->route('admin.status_stnk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusStnk $status_stnk)
    {
        $status_stnk->delete();
        return redirect()->route('admin.status_stnk.index');
    }
}
