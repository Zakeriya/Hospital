<?php

namespace App\Http\Controllers\Back;

use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins=Admin::all();
        $roles=Role::where('guard_name','admin')->get();
        // dd($roles);
        return view('back.admin.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles=Role::where('guard_name','admin')->get();
        return view('back.admin.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:admins,email',
            'password'=>'required|confirmed',
            'role_name'=>'string|nullable'
        ]);

        // dd($data['role_name']);


        $admin=Admin::create($data);
        if(isset($data['role_name']) && $data['role_name']!='none')
        {
            $admin->assignRole($data['role_name']);



        }

        return to_route('back.admins.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        $roles=Role::where('guard_name','admin')->get();
        $permissions=Permission::where('guard_name','admin')->get();

        return view('back.admin.show',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        $roles=Role::where('guard_name','admin')->get();
        return view('back.admin.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $data=$request->validate([
            'name'=>'required|string',
            'role_name'=>'required|nullable'
        ]);

        $roles=Role::where('guard_name','admin')->get();
        // $newRoleName='';
        foreach ($roles as $role) {
            // $newRoleName=$admin->hasRole($role->name)??'';//Deletor
            if($data['role_name']!= $admin->hasRole($role->name) && $data['role_name']!='none')
            {
                $admin->syncRoles($role->name);
                $admin->assignRole($data['role_name']);
                // $newRoleName=$data['role_name'];
            }

            if($data['role_name']=='none')
            {
                $admin->syncRoles();
                // $admin->assignRole($data['role_name']);
            }
        }

        $admin->update([
            'name'=>$data['name'],
            
        ]);

        return to_route('back.admins.show',$admin);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->syncRoles();

        $admin->delete();

        return to_route('back.admins.index');
    }
}
