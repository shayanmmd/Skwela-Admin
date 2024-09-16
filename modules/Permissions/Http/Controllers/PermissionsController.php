<?php

namespace Permissions\Http\Controllers;

use Permissions\Contracts\PermissionRepositoryInterface;

class PermissionsController
{

    public function __construct(
        private PermissionRepositoryInterface $permissionRepositoryInterface
    ) {}

    public function index()
    {
        $permissions = $this->permissionRepositoryInterface->all();
        
        return response()->json($permissions);
    }

    public function store()
    {
        $payload = request()->all();

        $this->permissionRepositoryInterface->store($payload);

        return response()->json(['success' => true, 'msg' => 'it it made']);
    }
}
