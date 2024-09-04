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
        $payload = request()->all();
        
        $name = $payload['name'];
        $permissions = $payload['permissions'];

        $role = Role::create([
            'name' => $name
        ]);

        $role->givePermissionTo($permissions);

        return response()->json(['success' => true, 'msg' => 'it it made']);
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
