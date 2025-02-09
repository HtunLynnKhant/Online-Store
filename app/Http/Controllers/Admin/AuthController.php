<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        
        if(Auth::attempt($request->only('email','password'))){
            return redirect(route('admin.dashboard'))->with('success','You are login as Admin!');
        } 
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.login'));
    }
}
