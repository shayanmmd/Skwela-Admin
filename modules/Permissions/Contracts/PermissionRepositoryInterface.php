<?php

namespace Permissions\Contracts;

interface PermissionRepositoryInterface
{
    public function all();
    public function store(array $payload);
}
