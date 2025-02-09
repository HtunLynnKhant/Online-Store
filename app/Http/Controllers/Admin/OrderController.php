<?php

namespace App\Http\Controllers\Admin;
use App\Models\ProductOrder;
use App\Models\User;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pending()
    {
        $orders = ProductOrder::where('status', 'pending')->with('user','product')->paginate(20);
        return view('admin.order.index',compact('orders'));
    }

    public function complete(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if ($start_date && $end_date) {
            $orders = ProductOrder::where('status', 'complete')
                ->with('user', 'product')
                ->whereBetween('created_at', [$start_date, $end_date])
                ->paginate(10);
                $orders->appends($request->all());
        } else {
            $orders = ProductOrder::where('status', 'complete')
                ->with('user', 'product')
                ->paginate(20);
        }
        
        return view('admin.order.complete', compact('orders'));
    }

    public function makeComplete($id)
    {
        ProductOrder::where('id', $id)->update([
            'status' => 'complete',
        ]);
        return redirect()->back()->with('success','Order Complete Success');
    }
}
