<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('user.Auth.register');
    }
    public function Postregister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png',
        ]);
    
        $file = $request->file('image');
        $file_name = uniqid() . '_' . $file->getClientOriginalName();
        $file_path = 'image/' . $file_name;
        $file->storeAs('image', $file_name);
        
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $file_path,
            'password' => Hash::make($request->password),
        ]);
        return redirect(route('user.showlogin'))->with('success', 'Registered Successfully');
    }
    public function showlogin(){
        return view('user.Auth.login');
    }
    public function PostLogin(Request $request)
    {
        if(User::where('email', $request->email)->first()){
            if(Auth::attempt($request->only('email','password'))){
                return redirect('/');
            }else{
                return redirect()->back()->with('danger', 'Login Failed');
            }
        }else{
                return redirect()->back()->with('danger','Email not found!');
            }
            
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('user.showlogin'));
    }
}
