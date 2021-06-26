<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLogin()
    {
        return view('Auth.login');
    }

    public function doLogin(Request $request)
    {

        $credentials= $request->only('email','password');
        if (Auth::attempt($credentials)) //check for email and password matches or not
        {
            return redirect()->intended('home');//named route used
        }

        return redirect('/')->with('error', 'Login Unsuccessful');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('show.login');
    }

}
