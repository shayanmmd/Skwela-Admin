<?php

use Dashboard\Providers\DashboardProvider;
use Navlinks\Providers\NavlinksProvider;

return [
    App\Providers\AppServiceProvider::class,
    DashboardProvider::class,
    NavlinksProvider::class
];
