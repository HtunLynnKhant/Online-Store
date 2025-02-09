<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('id','DESC')->latest()->paginate(10);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = Category::all();
        return view('admin.product.create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            
            'description' => 'required',
            'cat_id' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

        // Handle file upload
        $file = $request->file('image');
        $file_name = uniqid() . '_' . $file->getClientOriginalName();
        $file_path = 'image/' . $file_name;
        $file->storeAs('image', $file_name);

        // Create product
        $product = Product::create([
            'slug' => uniqid() . Str::slug($request->name),
            'name' => $request->name,
            'price' => $request->prices,
            'category_id' => $request->cat_id,
            'image' => $file_path,
            'description' => $request->description,
            'view_count' => 0,
        ]);

        // Redirect with success message
        return redirect(route('admin.product.index'))->with('success', 'Product added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::where('id', $id)->with('category')->first();
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {   
        $cat = Category::all();
        $pd = Product::where('id', $id)->with('category')->first();
        return view('admin.product.edit',compact('cat','pd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if ($request->file('image')){
            $img_arr = explode('/',$product->image);
            Storage::disk('image')->delete($img_arr[0]);
            $file = $request->file('image');
            $file_name = uniqid(time()).$file->getClientOriginalName();
            $path = "image/".$file_name;
            $file->storeAs("image",$file_name);
        }
        else{
            $path = $product->image;
        }

        Product::where('id', $id)->update([
            'slug' => uniqid() . Str::slug($request->name),
            'name' => $request->name,
            'price' => $request->prices,
            'category_id' => $request->cat_id,
            'image' => $path,
            'description' => $request->description,
        ]);
        return redirect(route('admin.product.index'))->with('success','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::where('id',$id)->delete();
        return redirect(route('admin.product.index'))->with('success','Product delete success!');
    }
}
