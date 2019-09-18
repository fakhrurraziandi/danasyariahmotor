<?php

namespace App\Http\Controllers\Admin;


use App\Wilayah;
use Illuminate\Http\Request;
use Yajra\Acl\Models\Permission;
use App\Http\Controllers\Controller;

class WilayahController extends Controller
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
        
        $data_wilayah = Wilayah::search($search);
        $data['total'] = $data_wilayah->count();


        $data_wilayah->skip($offset);
        $data_wilayah->limit($limit);
        $data_wilayah->orderBy($sort, $order);

        $data['rows'] = $data_wilayah->get();

        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.wilayah.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wilayah.create');
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
        
        Wilayah::create($request->all());
        return redirect()->route('admin.wilayah.index');
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
    public function edit(Wilayah $wilayah)
    {
        return view('admin.wilayah.edit', compact('wilayah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wilayah $wilayah)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $wilayah->update($request->all());
        return redirect()->route('admin.wilayah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wilayah $wilayah)
    {
        $wilayah->delete();
        return redirect()->route('admin.wilayah.index');
    }
}
