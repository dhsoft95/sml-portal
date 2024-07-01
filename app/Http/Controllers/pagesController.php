<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function AllUsers()
    {
        return view('user-metrix.allUsers');
    }
    public function service_desk()
    {
        return view('service-desk.analytics');
    }
}
