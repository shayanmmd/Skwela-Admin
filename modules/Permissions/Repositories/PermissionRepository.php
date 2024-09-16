<?php

namespace Permissions\Repositories;


use Permissions\Contracts\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function all()
    {
        return Permission::all();
    }

    public function store(array $payload)
    {
        return Permission::create($payload);
    }
}
