<?php

namespace Permissions\Http\Controllers;

use Permissions\Repositories\RoleRepository;

class RoleController
{
    public function __construct(
        private RoleRepository $roleRepository
    ) {}

    public function index()
    {
        $roles = $this->roleRepository->all();

        return view('RolePermissionViews::role-permission', [
            'roles' => $roles
        ]);
    }

    public function add()
    {
        $payload = request()->all();

        $this->roleRepository->createWithPermissions($payload['name'], $payload['permissions']);

        return response()->json(['success' => true, 'msg' => 'it it made']);
    }

    public function delete()
    {
        $id = request()->query('id');

        $this->roleRepository->delete($id);

        return response()->json(['success' => true, 'msg' => 'it is deleted successfully']);
    }
}
