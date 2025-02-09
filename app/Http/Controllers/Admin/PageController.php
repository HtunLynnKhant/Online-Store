<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductOrder;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function dashboard()
    {
        $date = date("m");
        $user_count = User::count();
        $pending_count = ProductOrder::where('status', 'pending')->whereMonth('created_at',$date)->count();
        $complete_count = ProductOrder::where('status','complete')->whereMonth('created_at',$date)->count();
        $orders = ProductOrder::with('user','product')->wheremonth('created_at',$date)->get();
        return view("admin/index",compact('user_count','pending_count','complete_count','orders'));
    }
    public function alluser()
    {
        $user = User::latest()->withCount('order')->paginate(10);
        return view("admin.user.index", compact("user"));
    }
    public function profile()
    {
        // Fetch user details by ID
        $user = Auth::user();

        return view('admin.user.profile', compact('user'));
    }
    public function profileupdate(Request $request)
    {
        $request->validate([
            'email' =>'required|email',
            'name'=> 'required|string|max:255'
        ]);
        $user = Auth::user();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();
        return redirect(route('admin.profile'))->with('success','Profile update successfully!');
    }
}
