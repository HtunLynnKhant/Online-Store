<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\ProductOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    
    public function index()
    {
        $product = Product::latest()->with('category')->paginate(6);
        return view("user.index",compact("product"));
    }

    public function byCategory($slug)
    {
        $cat_id = Category::where('slug',$slug)->first()->id;
        $product = Product::where('category_id',$cat_id)->with('category')->paginate(6);
        return view('user.index', compact("product"));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $product = Product::where('name','like',"%{$search}%")->with('category')->paginate(6);
        $product->appends($request->all());
        return view('user.index',compact('product'));
    }

    public function productDetails(Request $request,$slug)
    {
        $product = Product::where('slug', $slug);
        $product->update([
            'view_count' => DB::raw('view_count+1')
        ]);
        $product =$product->with('category')->first();
        return view("user.productDetail",compact("product"));
    }
    public function addToCart($slug)
    {
        if (!Auth::check()) {
            return redirect()->route('user.showlogin')->with('message', 'Please log in to add items to your cart.');
        }else{
        $user_id= Auth::user()->id;
        $product_id = Product::where('slug', $slug)->first()->id;
        $qty=1;
        ProductCart::create([
            'user_id' => $user_id,
            'product_id'=> $product_id,
            'qty' => $qty
        ]);
        return redirect()->back();
    }
    }

    public function cart(){
        $cart =ProductCart::with('product')->where('user_id',Auth::user()->id)->get();
        return view('user.cart',compact('cart'));
    }

    public function makeOrder(){
        $user_id = Auth::user()->id;
        $cart = ProductCart::where('user_id',$user_id)->get();
        foreach($cart as $c){
            ProductOrder::create([
                'user_id' => $user_id,
                'product_id' => $c->product_id,
                'qty' => $c->qty,
                'status'=>'pending'
            ]);
            ProductCart::where('id',$c->id)->delete();
        }
        return redirect()->back()->with('success','Order success!');
    }

    public function pendingOrder()
    {
        return $this->getOrdersByStatus('pending');
    }

    public function completeOrder()
    {
        return $this->getOrdersByStatus('complete');
    }

    private function getOrdersByStatus($status)
    {
        $orders = ProductOrder::where('user_id', Auth::user()->id)
                            ->with('product')
                            ->where('status', $status)
                            ->get();
        return view('user.order', compact('orders', 'status'));
    }

    public function userprofile(){
        $user = Auth::user();
        return view('user.Auth.info',compact('user'));
    }
    
    public function changeprofile(Request $request)
    {
        $user = User::where('id', Auth::user()->id);

        if($request->file('image')){
            $file = $request->file('image');
            $name = uniqid(time()).$file->getClientOriginalName();
            $file_path = "image/".$name;
            $file->storeAs('image',$name);
        }else{
            $file_path=$user->first()->image;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $file_path,
        ]);
        return redirect()->back()->with('success','Change Profile sucess!');
    }

}
