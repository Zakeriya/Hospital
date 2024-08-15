<?php

namespace App\Http\Controllers\Back;

// use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::where('guard_name','admin')->get();
        return view('back.role.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions=Permission::where('guard_name','admin')->get();
        return view('back.role.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $data=$request->validated();

        // dd($data);


        $role=Role::create([
            'name'=>$data['name'],
            'guard_name'=>'admin',
        ]);
        if(isset($data['permissions']))
        {
            foreach ($data['permissions'] as $permission) {
               $role->givePermissionTo($permission);
            }
        }

        return to_route('back.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $permissions=Permission::where('guard_name','admin')->get();
        return view ('back.role.show',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions=Permission::where('guard_name','admin')->get();
        return view('back.role.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $data=$request->validated();

        $role->syncPermissions();

        $role->update([
            'name'=>$data['name'],
            'guard_name'=>'admin',
        ]);

        if(isset($data['permissions'])&& $data['permissions']!= null)
        {
            foreach ($data['permissions'] as $permission) {
                # code...
                $role->givePermissionTo($permission);
            }
        }

        return to_route('back.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->syncPermissions();

        $role->delete();

        return to_route('back.roles.index');
    }
}
