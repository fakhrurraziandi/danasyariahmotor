<?php

namespace App\Http\Controllers\Admin;

use App\ContactMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactMessageController extends Controller
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
        
        $contact_message = ContactMessage::search($search);
        $data['total'] = $contact_message->count();


        $contact_message->skip($offset);
        $contact_message->limit($limit);
        $contact_message->orderBy($sort, $order);

        $data['rows'] = $contact_message->get();

        return $data;
    }

    public function index()
    {
        return view('admin.contact_message.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact_message.create');
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

        ContactMessage::create($data);
        return redirect()->route('admin.contact_message.index');
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
    public function edit(ContactMessage $contact_message)
    {
        return view('admin.contact_message.edit', compact('contact_message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactMessage $contact_message)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = [
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
        ];
        
        
        $contact_message->update($data);
        return redirect()->route('admin.contact_message.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactMessage $contact_message)
    {
        $contact_message->delete();
        return redirect()->route('admin.contact_message.index');
    }
}
