<?php

namespace Permissions\Repositories;

use Spatie\Permission\Models\Role;

class RoleRepository
{
    public function all()
    {
        return Role::all();
    }

    public function createWithPermissions(string $name, array $permissions)
    {
        $role = Role::create([
            'name' => $name
        ]);

        $role->givePermissionTo($permissions);
    }

    public function findById(int $id)
    {
        return Role::findOrFail($id);
    }

    public function delete(int $id)
    {
        $role = $this->findById($id);
        $role->delete();
    }
}
