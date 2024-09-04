<?php

namespace Dashboard\Http\Controllers;

class DashboardController
{
    public function index()
    {
        return view('DashboardViews::home');
    }
}
