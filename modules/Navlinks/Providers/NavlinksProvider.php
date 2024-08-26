<?php

namespace Navlinks\Providers;

use Illuminate\Support\ServiceProvider;

class NavlinksProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/NavlinksRoutes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resourses/Views/', 'NavlinksViews');
        $this->loadViewsFrom(__DIR__ . '/../Resourses/Components/', 'NavlinksComponents');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations/');
    }
}
