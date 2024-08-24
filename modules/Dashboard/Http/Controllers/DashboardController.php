<?php

namespace Dashboard\Http\Controllers;

class DashboardController
{
    public function home()
    {
        return view('DashboardViews::home');
    }

    public function navlinks()
    {
        return view('DashboardViews::navlinks');
    }
}
