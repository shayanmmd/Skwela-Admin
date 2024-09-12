<?php

namespace Courses\Providers;

use Illuminate\Support\ServiceProvider;

class CoursesProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/CourssRoutes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resourses/Views', 'CoursesViews');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }
}
