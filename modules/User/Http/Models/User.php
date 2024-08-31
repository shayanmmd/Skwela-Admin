<?php

namespace User\Http\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory;
    use HasRoles;

    public $guarded = [];
}
