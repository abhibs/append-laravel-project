<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $datas = Order::latest()->get();
        return view('admin.order.index', compact('datas'));
    }

    public function updateStatusOrder(Request $request)
    {
        $data = Order::find($request->id);
        $data->status = $request->status;

        $data->save();
        $notification = array(
            'message' => 'Order Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function delete($id)
    {
        Order::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Order Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }






}