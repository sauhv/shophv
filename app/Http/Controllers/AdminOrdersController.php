<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Order_items;

class AdminOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::getOrder()->paginate(12);
        return view('admin.pages.Orders.List', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $id)
    {
        // 

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->status)) {
            $data = [];
            $data['status'] = $request->status;
            Orders::where('id', $id)->update($data);
            toastr()->success("Update thành công!");
            return redirect()->back();
        }
    }
    public function order_items(string $id) {
        $order_items = Order_items::getOrderItemAdmin($id)->paginate(12);
        return view('admin.pages.Orders.Detail', ['order_items' => $order_items]);
    }
}
