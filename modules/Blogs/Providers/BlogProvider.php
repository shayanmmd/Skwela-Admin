<?php

namespace Blogs\Providers;

use Illuminate\Support\ServiceProvider;

class BlogProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/BlogRoutes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resourses/Views', 'BlogViews');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');        
    }
}
