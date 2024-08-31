<?php

use Dashboard\Providers\DashboardProvider;
use Navlinks\Providers\NavlinksProvider;
use Permissions\Providers\PermissionsProvider;
use User\Providers\UserProvider;

return [
    App\Providers\AppServiceProvider::class,
    DashboardProvider::class,
    NavlinksProvider::class,
    UserProvider::class,
    PermissionsProvider::class,
    Spatie\Permission\PermissionServiceProvider::class
];
