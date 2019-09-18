<?php

namespace App\Http\Controllers\Admin;

use App\Motor;
use App\SpesifikasiMotor;
use App\TempoAngsuranMotor;
use App\KategoriSpesifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SpesifikasiMotorController extends Controller
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
        
        $spesifikasi_motor = SpesifikasiMotor::with('kategori_spesifikasi')->where('motor_id', $motor->id)->search($search);
        $data['total'] = $spesifikasi_motor->count();


        $spesifikasi_motor->skip($offset);
        $spesifikasi_motor->limit($limit);
        $spesifikasi_motor->orderBy($sort, $order);

        $data['rows'] = $spesifikasi_motor->get();

        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Motor $motor)
    {
        return view('admin.spesifikasi_motor.index', compact('motor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Motor $motor)
    {
        $list_kategori_spesifikasi = KategoriSpesifikasi::all();
        return view('admin.spesifikasi_motor.create', compact('motor', 'list_kategori_spesifikasi'));
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
            'name' => 'required',
            'kategori_spesifikasi_id' => 'required',
            'value' => 'required'
        ]);

        $spesifikasi_motor = SpesifikasiMotor::create([
            'motor_id' => $motor->id,
            'name' => $request->get('name'),
            'kategori_spesifikasi_id' => $request->get('kategori_spesifikasi_id'),
            'value' => $request->get('value'),
        ]);

        return redirect()->route('admin.spesifikasi_motor.index', $motor->id);
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
    public function edit(SpesifikasiMotor $spesifikasi_motor)
    {
        
        $list_kategori_spesifikasi = KategoriSpesifikasi::all();

        
        return view('admin.spesifikasi_motor.edit', compact('spesifikasi_motor', 'list_kategori_spesifikasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpesifikasiMotor $spesifikasi_motor)
    {
        $request->validate([
            'name' => 'required',
            'kategori_spesifikasi_id' => 'required',
            'value' => 'required'
        ]);

        $spesifikasi_motor->update([
            'name' => $request->get('name'),
            'kategori_spesifikasi_id' => $request->get('kategori_spesifikasi_id'),
            'value' => $request->get('value'),
        ]);

        return redirect()->route('admin.spesifikasi_motor.index', $spesifikasi_motor->motor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpesifikasiMotor $spesifikasi_motor)
    {
        $motor_id = $spesifikasi_motor->motor_id;
        $spesifikasi_motor->delete();
        return redirect()->route('admin.spesifikasi_motor.index', $motor_id);
    }
}
