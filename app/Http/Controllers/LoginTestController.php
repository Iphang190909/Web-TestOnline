<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;

class LoginTestController extends Controller
{
    public function LoginTest(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::TEST);
    }

    public function RegisterTest()
    {
        return view('frontend.register');
    }

    public function CreateRegisterTest(Type $var = null)
    {
        # code...
    }
}
