<?php

namespace App\Http\Controllers\Admin;

use App\TestimoniGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TestimoniGalleryController extends Controller
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
        $order = $request->filled('order') ? $request->get('order') : 'DESC';
        
        $testimoni_gallery = TestimoniGallery::with([
            'wilayah_pembiayaan_dana',
            'wilayah_kredit_motor'
        ])->search($search);
        $data['total'] = $testimoni_gallery->count();


        $testimoni_gallery->skip($offset);
        $testimoni_gallery->limit($limit);
        $testimoni_gallery->orderBy($sort, $order);

        $data['rows'] = $testimoni_gallery->get();

        return $data;
    }

    public function index()
    {
        return view('admin.testimoni_gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimoni_gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'message' => 'required',
            'type' => 'required',
            'photo' => 'mimes:jpeg,jpg,png,gif|required'
        ];

        $data = [
            'name' => $request->get('name'),
            'message' => $request->get('message'),
            'type' => $request->get('type'),
        ];

        if($request->get('type') == 'pembiayaan_dana'){
            $rules['wilayah_pembiayaan_dana_id'] = 'required';
            $data['wilayah_pembiayaan_dana_id'] = $request->get('wilayah_pembiayaan_dana_id');
            $data['wilayah_kredit_motor_id'] = null;
        }
        if($request->get('type') == 'kredit_motor'){
            $rules['wilayah_kredit_motor_id'] = 'required';
            $data['wilayah_pembiayaan_dana_id'] = null;
            $data['wilayah_kredit_motor_id'] = $request->get('wilayah_kredit_motor_id');
        }
        
        $request->validate($rules);
        

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            Storage::disk('public')->put($photo->getClientOriginalName(), File::get($photo));

            $data['photo'] = $photo->getClientOriginalName();
        }

        TestimoniGallery::create($data);
        return redirect()->route('admin.testimoni_gallery.index');
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
    public function edit(TestimoniGallery $testimoni_gallery)
    {
        return view('admin.testimoni_gallery.edit', compact('testimoni_gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestimoniGallery $testimoni_gallery)
    {
        $rules = [
            'name' => 'required',
            'message' => 'required',
            'type' => 'required'
        ];

        $data = [
            'name' => $request->get('name'),
            'message' => $request->get('message'),
            'type' => $request->get('type'),
        ];

        // return $data;

        if($request->get('type') == 'pembiayaan_dana'){
            $rules['wilayah_pembiayaan_dana_id'] = 'required';
            $data['wilayah_pembiayaan_dana_id'] = $request->get('wilayah_pembiayaan_dana_id');
            $data['wilayah_kredit_motor_id'] = null;
        }
        if($request->get('type') == 'kredit_motor'){
            $rules['wilayah_kredit_motor_id'] = 'required';
            $data['wilayah_pembiayaan_dana_id'] = null;
            $data['wilayah_kredit_motor_id'] = $request->get('wilayah_kredit_motor_id');
        }
        
        $request->validate($rules);
        

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            Storage::disk('public')->put($photo->getClientOriginalName(), File::get($photo));

            $data['photo'] = $photo->getClientOriginalName();
        }
        
        
        $testimoni_gallery->update($data);

        
        return redirect()->route('admin.testimoni_gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestimoniGallery $testimoni_gallery)
    {
        $testimoni_gallery->delete();
        return redirect()->route('admin.testimoni_gallery.index');
    }
}
