<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*         $user =  \Auth::user();
        $user->assignRole('Admin');
        dd( $user->hasAnyRole(Role::all()) ); */
        $roles = Role::all();
        return view('admin.Roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Roles.create', [
            'permissions' => Permission::pluck('name', 'id'),
            'role' => new Role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data  = $request->validate([
            'name' => 'required|max:50',
            'guard_name' => 'required',
        ]);

        $role = Role::create($data);
        $role->save();
        return redirect()->route('admin.roles.index');
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
    public function edit($id)
    {
        return view('admin.Roles.edit', ([
            'role' => Role::findOrFail($id),
            'permissions' => Permission::pluck('name', 'id')
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $validator = \Validator::make($request->all(), [
            'role_name' => 'required|max:55',
        ]);
        if ($validator->fails()) {
            return Redirect()->back()->withErrors($validator)->withInput();
        }
        $parameters = $request->only(['role_name']);
        $parameters['name'] = $request->role_name;
        $role->update(['name' => $parameters['name']]);

        $Log = new Log();
        $Log->type_activity = 'Update';
        $Log->activity = 'Edit Role ' .$role->id .': '.$role->name;
        $Log->user_id = \Auth::user()->id;
        $Log->ip_user = $request->ip();
        $Log->save();
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $Log = new Log();
        $Log->type_activity = 'Delete';
        $Log->activity = 'Delete Role ' .$role->id .': '.$role->name;
        $Log->user_id = \Auth::user()->id;
        $Log->ip_user = \Request::ip();
        $Log->save();
        $role->delete();
        return redirect()->route('admin.roles.index');
    }
    
    /**
     * Show the permissions from a role || Mostrar los permisos que tiene un rol.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getPermissionsRole($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        //$checkpermissions = $role->getAllPermissions()->pluck('name', 'id')->toArray();
        return view('admin.Roles.role-permissions', compact('role','permissions'));
    }

    /**
     * Update the permissions from a Role. || Actualizar los permisos que tiene un rol.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function postPermissionsRole(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $parameters = $request->only(['permissions']);
        if($request->has('permissions')){
            $role->syncPermissions($parameters['permissions']);
        }else{
            $role->syncPermissions();
        }

        return redirect()->route('admin.roles.index');
    }

}
