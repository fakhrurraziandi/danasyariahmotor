<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
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
        
        $videos = Video::search($search);
        $data['total'] = $videos->count();


        $videos->skip($offset);
        $videos->limit($limit);
        $videos->orderBy($sort, $order);

        $data['rows'] = $videos->get();

        return $data;
    }

    public function index()
    {
        return view('backend.video.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.video.create', compact('categories'));
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
            'title' => 'required',
            'slug' => 'required',
            'type' => 'required',
        ];

        if($request->input('type') == 'self_host'){
            $rules['self_host__file'] = 'required';
        }

        if($request->input('type') == 'youtube_embed'){
            $rules['youtube_embed__url'] = 'required';
        }

        $request->validate($rules);
        
        $data = [
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
        ];

        if($request->input('type') == 'self_host'){
            $self_host__file = $request->file('self_host__file');
            Storage::disk('public')->put($self_host__file->getClientOriginalName(),  File::get($self_host__file));
            $data['self_host__file'] = $self_host__file->getClientOriginalName();
        }

        if($request->hasFile('thumbnail')){
            $thumbnail = $request->file('thumbnail');
            Storage::disk('public')->put($thumbnail->getClientOriginalName(),  File::get($thumbnail));
            $data['thumbnail'] = $thumbnail->getClientOriginalName();
        }
            


        if($request->input('type') == 'self_host'){
            $data['selft_host__file'] = $request->file('self_host__file')->store('self_host__files');
        }

        if($request->input('type') == 'youtube_embed'){
            $data['youtube_embed__url'] = $request->input('youtube_embed__url');
        }


        $video = Video::create($data);

        $category_ids = $request->input('category_ids');
        foreach($category_ids as $category_id){
            VideoCategory::create([
                'video_id' => $video->id,
                'category_id' => $category_id,
            ]);
        }
        
        return redirect()->route('backend.video.index');
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
    public function edit(Video $video)
    {
        $categories = Category::all();
        return view('backend.video.edit', compact('video', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $rules = [
            'title' => 'required',
            'slug' => 'required',
            'type' => 'required',
        ];

        if($request->input('type') == 'self_host'){
            $rules['self_host__file'] = 'required';
        }

        if($request->input('type') == 'youtube_embed'){
            $rules['youtube_embed__url'] = 'required';
        }

        $request->validate($rules);
        
        $data = [
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'seo_title' => $request->input('seo_title'),
            'meta_description' => $request->input('meta_description'),
            'focus_keyword' => $request->input('focus_keyword'),
            'tags' => $request->input('tags'),
            'as_slider_content' => $request->input('as_slider_content', false),
        ];


        if($request->get('type') == 'self_host'){
            $self_host__file = $request->file('self_host__file');
            Storage::disk('public')->put($self_host__file->getClientOriginalName(),  File::get($self_host__file));

            $data['self_host__file'] = $self_host__file->getClientOriginalName();
            $data['youtube_embed__url'] = '';
        }

        if($request->get('type') == 'youtube_embed'){
            $data['self_host__file'] = '';
            $data['youtube_embed__url'] = $request->get('youtube_embed__url');
        }

        if($request->hasFile('thumbnail')){
            $thumbnail = $request->file('thumbnail');
            Storage::disk('public')->put($thumbnail->getClientOriginalName(),  File::get($thumbnail));
            $data['thumbnail'] = $thumbnail->getClientOriginalName();
        }


        $video->update($data);

        VideoCategory::where('video_id', $video->id)->delete();
        $category_ids = $request->get('category_ids');
        foreach($category_ids as $category_id){
            VideoCategory::create([
                'video_id' => $video->id,
                'category_id' => $category_id,
            ]);
        }
        
        return redirect()->route('backend.video.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('backend.video.index');
    }
}
