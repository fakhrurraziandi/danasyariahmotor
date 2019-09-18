<?php

namespace App\Http\Controllers\Admin;

use App\Motor;
use App\TypeMotor;
use App\WarnaMotor;
use App\PabrikanMotor;
use App\JenisTransmisi;
use App\KapasitasMesin;
use App\JenisPembakaran;
use App\MotorWarnaMotor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MotorController extends Controller
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
        
        $motor = Motor::with([
            'pabrikan_motor',
            'type_motor',
            'jenis_transmisi',
            'kapasitas_mesin',
            'warna_motor',
            'photo_motor',
            'testimoni_motor'
        ])->search($search);

        $data['total'] = $motor->count();


        $motor->skip($offset);
        $motor->limit($limit);
        $motor->orderBy($sort, $order);

        $data['rows'] = $motor->get();

        return $data;
    }

    public function index()
    {
        return view('admin.motor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_pabrikan_motor = PabrikanMotor::all();
        $list_type_motor = TypeMotor::all();
        $list_jenis_transmisi = JenisTransmisi::all();
        $list_jenis_pembakaran = JenisPembakaran::all();
        $list_kapasitas_mesin = KapasitasMesin::all();
        $list_warna_motor = WarnaMotor::all();

        return view('admin.motor.create', compact(
            'list_pabrikan_motor',
            'list_type_motor',
            'list_jenis_transmisi',
            'list_jenis_pembakaran',
            'list_kapasitas_mesin',
            'list_warna_motor'
        ));
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
            'pabrikan_motor_id' => 'required',
            'type_motor_id' => 'required',
            'jenis_transmisi_id' => 'required',
            'jenis_pembakaran_id' => 'required',
            'kapasitas_mesin_id' => 'required',
            'tahun' => 'required',
            'harga' => 'required',
            // 'fitur' => 'required',
        ]);

        $data = [
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'pabrikan_motor_id' => $request->get('pabrikan_motor_id'),
            'type_motor_id' => $request->get('type_motor_id'),
            'jenis_transmisi_id' => $request->get('jenis_transmisi_id'),
            'jenis_pembakaran_id' => $request->get('jenis_pembakaran_id'),
            'kapasitas_mesin_id' => $request->get('kapasitas_mesin_id'),
            'tahun' => $request->get('tahun'),
            'harga' => str_replace('.', '', $request->get('harga')),
            'fitur' => $request->get('fitur'),
        ];

        $motor = Motor::create($data);

        $warna_motor_ids = $request->get('warna_motor_ids');

        if($warna_motor_ids > 0){
            foreach($warna_motor_ids as $warna_motor_id){
                MotorWarnaMotor::create([
                    'motor_id' => $motor->id,
                    'warna_motor_id' => $warna_motor_id
                ]);
            }
        }

        return redirect()->route('admin.motor.index');
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
    public function edit(Motor $motor)
    {
        $list_pabrikan_motor = PabrikanMotor::all();
        $list_type_motor = TypeMotor::all();
        $list_jenis_transmisi = JenisTransmisi::all();
        $list_jenis_pembakaran = JenisPembakaran::all();
        $list_kapasitas_mesin = KapasitasMesin::all();
        $list_warna_motor = WarnaMotor::all();

        return view('admin.motor.edit', compact(
            'motor',
            'list_pabrikan_motor',
            'list_type_motor',
            'list_jenis_transmisi',
            'list_jenis_pembakaran',
            'list_kapasitas_mesin',
            'list_warna_motor'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Motor $motor)
    {
        // return $request->all();

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'pabrikan_motor_id' => 'required',
            'type_motor_id' => 'required',
            'jenis_transmisi_id' => 'required',
            'jenis_pembakaran_id' => 'required',
            'kapasitas_mesin_id' => 'required',
            'tahun' => 'required',
            'harga' => 'required',
            // 'fitur' => 'required',
        ]);

        $data = [
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'pabrikan_motor_id' => $request->get('pabrikan_motor_id'),
            'type_motor_id' => $request->get('type_motor_id'),
            'jenis_transmisi_id' => $request->get('jenis_transmisi_id'),
            'jenis_pembakaran_id' => $request->get('jenis_pembakaran_id'),
            'kapasitas_mesin_id' => $request->get('kapasitas_mesin_id'),
            'tahun' => $request->get('tahun'),
            'harga' => str_replace('.', '', $request->get('harga')),
            'fitur' => $request->get('fitur'),
        ];
        
        $motor->update($data);

        

        MotorWarnaMotor::where('motor_id', $motor->id)->delete();

        $warna_motor_ids = $request->get('warna_motor_ids');
        if($warna_motor_ids > 0){
            foreach($warna_motor_ids as $warna_motor_id){
                MotorWarnaMotor::create([
                    'motor_id' => $motor->id,
                    'warna_motor_id' => $warna_motor_id
                ]);
            }
        }
        return redirect()->route('admin.motor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motor $motor)
    {
        $motor->delete();
        return redirect()->route('admin.motor.index');
    }
}
