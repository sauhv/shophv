<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Orders;
use App\Models\Order_items;
use Auth;
class OrderController extends Controller
{
    public function index() 
    {
        $Auth_id = \Auth::user()->id;
        $orders = Orders::getOrderUser($Auth_id)->paginate(6);
        return view('pages.wrapper_order_page', ['orders' => $orders]);
    }

    public function order_items(string $id) 
    {
        $order_items = Order_items::getOrderItems($id)->paginate(12);
        return view('pages.wrapper_order_item_page', ['order_items' => $order_items]);
    }

    public function order_update(Request $request) 
    {
        $data = [];
        $id = trim($request->order_id);
        $data['status'] = 3; 
        $data['updated_at'] = now(); 
        Orders::where('id', $id)->update($data);
        toastr()->success('Hủy đơn hàng thành công');
        return redirect()->back();
    }
}
