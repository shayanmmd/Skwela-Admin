<?php

use Dashboard\Providers\DashboardProvider;
use Navlinks\Providers\NavlinksProvider;
use User\Providers\UserProvider;

return [
    App\Providers\AppServiceProvider::class,
    DashboardProvider::class,
    NavlinksProvider::class,
    UserProvider::class,
    Spatie\Permission\PermissionServiceProvider::class,

];
