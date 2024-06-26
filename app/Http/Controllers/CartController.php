<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Orders;
use App\Models\CouponCodes;

class CartController extends Controller
{

    public function index()
    {
        $total_quantity = \Cart::getTotalQuantity();
        $cart_empty = \Cart::isEmpty();
        $cart_item = \Cart::getContent();
        return view('pages.wrapper_cart_page', [
            'cart_item' =>$cart_item, 
            'cart_empty' => $cart_empty, 
            'total_quantity' =>$total_quantity
        ]);
    }


    public function store(Request $request)
    {
        $id = $request->id;
        $product = Products::find($id); 
        \Cart::add([
            'id' => $id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'associatedModel' => $product,
        ]);
        $data = [
            'status' => 'success',
            'message' => 'Thêm ' .$product->name.' thành công',
        ];
        
        return response()->json($data, 200);
    }


    public function destroy(string $id)
    {
        \Cart::remove($id);
        $qtyCart = \Cart::getTotalQuantity();
        return response(['status' => 'success', 'message' => 'Đã xóa sản phẩm ID ' .$id. ' ra khỏi cart', 'qty' => $qtyCart]);
    }

}
