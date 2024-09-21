<?php

namespace User\Contracts;

use User\Http\Models\User;

interface UserRepositoryInterface
{
    public function update(array $payload);
    public function getCurrentUser() : User;
}
