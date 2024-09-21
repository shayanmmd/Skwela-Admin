<?php

namespace User\Providers;

use Illuminate\Support\ServiceProvider;
use User\Contracts\UserRepositoryInterface;
use User\Repositories\UserRepository;

class UserProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/UserRoutes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resourses/Views/', 'UserViews');
        $this->loadViewsFrom(__DIR__ . '/../Resourses/Components/', 'UserComponents');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations/');
    }

    public function boot()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
