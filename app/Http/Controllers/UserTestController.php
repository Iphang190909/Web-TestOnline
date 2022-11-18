<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserTestController extends Controller
{
    public function index()
    {
        return view('frontend.dashboard.home');
    }

    public function InputToken()
    {
        return view('frontend.dashboard.input');
    }
}
