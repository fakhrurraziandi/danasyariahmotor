<?php

namespace App\Http\Controllers\Admin;

use App\JenisPembakaran;
use App\PabrikanMotor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class JenisPembakaranController extends Controller
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
        
        $jenis_pembakaran = JenisPembakaran::search($search);
        $data['total'] = $jenis_pembakaran->count();


        $jenis_pembakaran->skip($offset);
        $jenis_pembakaran->limit($limit);
        $jenis_pembakaran->orderBy($sort, $order);

        $data['rows'] = $jenis_pembakaran->get();

        return $data;
    }

    public function index()
    {
        return view('admin.jenis_pembakaran.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenis_pembakaran.create');
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

        JenisPembakaran::create($data);
        return redirect()->route('admin.jenis_pembakaran.index');
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
    public function edit(JenisPembakaran $jenis_pembakaran)
    {
        return view('admin.jenis_pembakaran.edit', compact('jenis_pembakaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisPembakaran $jenis_pembakaran)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = [
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
        ];
        
        $jenis_pembakaran->update($data);
        return redirect()->route('admin.jenis_pembakaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisPembakaran $jenis_pembakaran)
    {
        $jenis_pembakaran->delete();
        return redirect()->route('admin.jenis_pembakaran.index');
    }
}
