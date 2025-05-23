<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevicelistController extends Controller
{

    public function create()
    {
        return view('devicelist'); // Make sure this view exists
    }
}
