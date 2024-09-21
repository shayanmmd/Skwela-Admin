<?php

namespace Media\Providers;

use Illuminate\Support\ServiceProvider;
use Media\Contracts\FileUploaderInterface;
use Media\Services\FileUploaderService;

class MediaProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    public function boot()
    {
        $this->app->bind(FileUploaderInterface::class, FileUploaderService::class);
    }
}
