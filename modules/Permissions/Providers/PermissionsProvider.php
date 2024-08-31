<?php

namespace Permissions\Providers;

use Illuminate\Support\ServiceProvider;

class PermissionsProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/PermissionsRoutes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resourses/Views/', 'PermissionsViews');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations/');
    }
}
