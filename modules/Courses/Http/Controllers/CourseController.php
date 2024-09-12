<?php

namespace Courses\Http\Controllers;

class CourseController
{
    public function index()
    {
        return view('CoursesViews::courses');
    }
}
