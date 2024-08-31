<?php

namespace Permissions\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsController
{

    public function index()
    {        
        $roles = Role::all();        
        
        return view('PermissionsViews::permissions', [
            'roles' => $roles
        ]);
    }

    public function addRole()
    {
        $name = request()->all()['name'];

        $role = Role::create([
            'name' => $name
        ]);

        $role->givePermissionTo(['add me']);

        return response()->json([
            'asd' => 'asda'
        ]);
    }

    public function addPermission()
    {
        $name = request()->all()['name'];

        Permission::create([
            'name' => $name
        ]);

        return response()->json(['success' => true, 'msg' => 'it it made']);
    }

    public function getPermissions()
    {
        $permissions = Permission::all();

        return response()->json($permissions);
    }

}
