<?php

use Blogs\Providers\BlogProvider;
use Contact\Providers\ContactProvider;
use Courses\Providers\CoursesProvider;
use Dashboard\Providers\DashboardProvider;
use Media\Providers\MediaProvider;
use Navlinks\Providers\NavlinksProvider;
use Permissions\Providers\RolePermissionProvider;
use User\Providers\UserProvider;

return [
    App\Providers\AppServiceProvider::class,
    DashboardProvider::class,
    NavlinksProvider::class,
    UserProvider::class,
    RolePermissionProvider::class,
    Spatie\Permission\PermissionServiceProvider::class,
    CoursesProvider::class,
    ContactProvider::class,
    MediaProvider::class,
    BlogProvider::class
];
