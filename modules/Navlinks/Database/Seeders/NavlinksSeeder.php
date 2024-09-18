<?php

namespace Navlinks\Database\Seeders;

use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Navlinks\Http\Models\Navlink;
use User\Http\Models\User;

class NavlinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Navlink::create([
            'name' => 'Home',
            'link' => 'home'
        ]);

        Navlink::create([
            'name' => 'Courses',
            'link' => 'course-page'
        ]);

        Navlink::create([
            'name' => 'Blogs',
            'link' => 'blog-page'
        ]);

        Navlink::create([
            'name' => 'About',
            'link' => 'about-page'
        ]);

        Navlink::create([
            'name' => 'Contact',
            'link' => 'contact-page'
        ]);
    }
}
