<?php

namespace Dashboard\Providers;

use Illuminate\Support\ServiceProvider;

class DashboardProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/DashboardRoutes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resourses/Views/', 'DashboardViews');
    }

    public function boot() {}
}
