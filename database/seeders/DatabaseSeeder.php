<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Navlinks\Database\Seeders\NavlinksSeeder;
use Permissions\Database\Seeders\RoleSeeder;
use User\Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call(class: RoleSeeder::class);
       $this->call(UserSeeder::class);
       $this->call(NavlinksSeeder::class);
    }
}
