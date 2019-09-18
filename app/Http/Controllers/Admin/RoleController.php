<?php

namespace App\Http\Controllers\Admin;


use App\Role;
use App\PermissionRole;
use Illuminate\Http\Request;
use Yajra\Acl\Models\Permission;
use App\Http\Controllers\Controller;

class RoleController extends Controller
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
        
        $roles = Role::with('permissions')->search($search);
        $data['total'] = $roles->count();


        $roles->skip($offset);
        $roles->limit($limit);
        $roles->orderBy($sort, $order);

        $data['rows'] = $roles->get();

        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
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
            'slug' => 'required'
        ]);
        
        Role::create($request->all());
        return redirect()->route('admin.role.index');
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
    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);
        
        $role->update($request->all());
        return redirect()->route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.role.index');
    }

    public function managePermission(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.role.manage_permission', compact('role', 'permissions'));
    }

    public function updatePermission(Request $request, Role $role)
    {
        PermissionRole::where('role_id', $role->id)->delete();

        $permission_ids = $request->filled('permission_ids') ? $request->get('permission_ids') : [];
        foreach($permission_ids as $permission_id){
            $role->assignPermission($permission_id);
        }

        return redirect()->route('admin.role.index');
    }
}
