<?php

namespace App\Http\Controllers\Admin;

use App\JenisTransmisi;
use App\PabrikanMotor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class JenisTransmisiController extends Controller
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
        
        $jenis_transmisi = JenisTransmisi::search($search);
        $data['total'] = $jenis_transmisi->count();


        $jenis_transmisi->skip($offset);
        $jenis_transmisi->limit($limit);
        $jenis_transmisi->orderBy($sort, $order);

        $data['rows'] = $jenis_transmisi->get();

        return $data;
    }

    public function index()
    {
        return view('admin.jenis_transmisi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenis_transmisi.create');
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

        JenisTransmisi::create($data);
        return redirect()->route('admin.jenis_transmisi.index');
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
    public function edit(JenisTransmisi $jenis_transmisi)
    {
        return view('admin.jenis_transmisi.edit', compact('jenis_transmisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisTransmisi $jenis_transmisi)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = [
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
        ];
        
        $jenis_transmisi->update($data);
        return redirect()->route('admin.jenis_transmisi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisTransmisi $jenis_transmisi)
    {
        $jenis_transmisi->delete();
        return redirect()->route('admin.jenis_transmisi.index');
    }
}
