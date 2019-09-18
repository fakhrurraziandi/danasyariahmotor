<?php

namespace App\Http\Controllers\Admin;

use App\ContentVariable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentVariableController extends Controller
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
        
        $content_variable = ContentVariable::search($search);
        $data['total'] = $content_variable->count();


        $content_variable->skip($offset);
        $content_variable->limit($limit);
        $content_variable->orderBy($sort, $order);

        $data['rows'] = $content_variable->get();

        return $data;
    }

    public function index()
    {
        return view('admin.content_variable.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content_variable.create');
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
            'key' => 'required',
            // 'value_text' => 'required',
            // 'value_html' => 'required',
            'type' => 'required',
        ]);

        $data = [
            'key' => $request->get('key'),
            'value_text' => $request->get('value_text'),
            'value_html' => $request->get('value_html'),
            'type' => $request->get('type'),
        ];

        ContentVariable::create($data);
        return redirect()->route('admin.content_variable.index');
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
    public function edit(ContentVariable $content_variable)
    {
        return view('admin.content_variable.edit', compact('content_variable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContentVariable $content_variable)
    {
        $request->validate([
            'key' => 'required',
            // 'value_text' => 'required',
            // 'value_html' => 'required',
            'type' => 'required',
        ]);

        $data = [
            'key' => $request->get('key'),
            'value_text' => $request->get('value_text'),
            'value_html' => $request->get('value_html'),
            'type' => $request->get('type'),
        ];
        
        $content_variable->update($data);
        return redirect()->route('admin.content_variable.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContentVariable $content_variable)
    {
        $content_variable->delete();
        return redirect()->route('admin.content_variable.index');
    }
}
