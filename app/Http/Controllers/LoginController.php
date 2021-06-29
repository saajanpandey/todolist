<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLogin()
    {
        if(Auth::check()){
            return redirect()->intended('/task');
        }
        else{
        return view('Auth.login');
        }
    }

    public function doLogin(Request $request)
    {

        $credentials= $request->only('email','password');
        if (Auth::attempt($credentials)) //check for email and password matches or not
        {
            return redirect()->intended('/task');
        }

        return redirect('/')->with('error', 'Wrong Email Or Password');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

}
