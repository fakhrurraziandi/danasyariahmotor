<?php

namespace App\Http\Controllers\Admin;

use App\KapasitasMesin;
use App\PabrikanMotor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class KapasitasMesinController extends Controller
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
        
        $kapasitas_mesin = KapasitasMesin::search($search);
        $data['total'] = $kapasitas_mesin->count();


        $kapasitas_mesin->skip($offset);
        $kapasitas_mesin->limit($limit);
        $kapasitas_mesin->orderBy($sort, $order);

        $data['rows'] = $kapasitas_mesin->get();

        return $data;
    }

    public function index()
    {
        return view('admin.kapasitas_mesin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kapasitas_mesin.create');
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
            'cc' => 'required',
        ]);

        $data = [
            'cc' => $request->get('cc'),
        ];

        KapasitasMesin::create($data);
        return redirect()->route('admin.kapasitas_mesin.index');
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
    public function edit(KapasitasMesin $kapasitas_mesin)
    {
        return view('admin.kapasitas_mesin.edit', compact('kapasitas_mesin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KapasitasMesin $kapasitas_mesin)
    {
        $request->validate([
            'cc' => 'required',
        ]);

        $data = [
            'cc' => $request->get('cc'),
        ];
        
        
        $kapasitas_mesin->update($data);
        return redirect()->route('admin.kapasitas_mesin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KapasitasMesin $kapasitas_mesin)
    {
        $kapasitas_mesin->delete();
        return redirect()->route('admin.kapasitas_mesin.index');
    }
}
