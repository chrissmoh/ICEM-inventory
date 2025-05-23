<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // You can fetch data from the database here if needed
        return view('index'); // Return the dashboard view
    }
}
