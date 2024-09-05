<?php

namespace Permissions\Providers;

use Illuminate\Support\ServiceProvider;

class RolePermissionProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/PermissionRoutes.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/RoleRoutes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resourses/Views/', 'RolePermissionViews');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations/');
    }
}
