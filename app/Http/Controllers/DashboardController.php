<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('pages.dashboard');
    }
}
