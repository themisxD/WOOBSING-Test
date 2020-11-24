<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
// to associated permission&roles
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Symfony\Component\Console\Input\Input;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.Users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $data  = Validator::make( $request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255'],
            'role' => ['required'],
        ]);
        if ($data->fails()) {
            return redirect()->back()->withErrors($data)->withInput();
        }
        $user  = User::create([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],
            'address' => $request['address'],
        ])->assignRole($request['role']);    

        return redirect()->route('admin.users.index')->withFlash('El usuario ha sido creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id); //withTrashed()
        return redirect()->route('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        if(auth()->user()->hasrole('Admin')){
            $roles = Role::all();
            
        }else{
            $roles = Role::where('name','<>','Admin')->get();
        }
        
        return view('admin.Users.edit', compact('user','roles'));
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
        //dd( $request->all());
        $user = User::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:55',
            'last_name' => ['required', 'string', 'max:255'],
            'email' => 'required|unique:users,email,' . $user->id,
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $validator->sometimes('password', 'min:6', function ($input) use ($user) {
            return $input->password != $user->password && $input->password != '' && $input->password != null;
        });
        if ($validator->fails()) {
            return Redirect()->back()->withErrors($validator)->withInput();
        }
        $parameters = $request->only(['name','email','address','role','phone']);
        $parameters['email'] = strtolower($parameters['email']);
        $parameters['password'] = !empty($request->password) ? Hash::make($request->input('password')) : $user->password;
        $user->update($parameters);

        if($request->has('role')){
            $user->syncRoles($parameters['role']);
        }else{
            $user->syncRoles();
        }

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}