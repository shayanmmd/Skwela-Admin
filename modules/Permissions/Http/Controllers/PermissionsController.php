<?php

namespace Permissions\Http\Controllers;

use Spatie\Permission\Models\Permission;

class PermissionsController
{
    public function index()
    {
        $permissions = Permission::all();

        return response()->json($permissions);
    }

    public function add()
    {
        $name = request()->all()['name'];

        Permission::create([
            'name' => $name
        ]);

        return response()->json(['success' => true, 'msg' => 'it it made']);
    }   
}
