<?php

namespace App\Http\Controllers;

use App\Http\Requests\checkoutValidate;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Order_items;
use App\Models\Categories;
use App\Models\Coupon_codes;
use Auth;
use Cart;
use Illuminate\Support\Str;

class PayMentController extends Controller
{
    public function __construct()
    {
        $categoryList = Categories::getCategory();
        View()->share('categoryList', $categoryList);
    }
    public function checkout(checkoutValidate $request)
    {
        if (\Cart::isEmpty() == false) {
            $order = new Orders;
            $order->name = trim($request->name);
            $order->phone_number = trim($request->phone_number);
            $order->email = trim($request->email);
            $order->address = trim($request->address);
            $order->total_money = trim($request->subTotal);
            $order->note = trim($request->note);
            $order->created_at = now();
            $order->user_id = Auth::user()->id;
            $order->save();

            foreach (\Cart::getContent() as $key => $cart) {
                $order_item = new Order_items();
                $order_item->product_name = $cart->name;
                $order_item->quantity = $cart->quantity;
                $order_item->price = $cart->price;
                $order_item->product_id = $cart->id;
                $order_item->order_id =  $order->id;
                $order_item->created_at =  now();
                $order_item->save();
                \Cart::remove($cart->id);
            }
            return view('pages.wrapper_thankyou_page');
        }
        toastr()->error('Vui lòng thêm sản phẩm vào giỏ hàng!');
        return redirect()->back();
    }

    public function apply_coupon_code(Request $request)
    {
        $getCoupon = Coupon_codes::checkCoupon($request->coupon_code);
        if (!empty($getCoupon)) {
            $total = \Cart::getSubTotal();
            if ($getCoupon->type == 'amount') {
                $coupon_amount = $getCoupon->percent_amount;
                $payable_total  = $total -  $coupon_amount;
            } else {
                $coupon_amount  = ($total * $getCoupon->percent_amount) / 100;
                $payable_total  = $total - $coupon_amount;
            }

            $json['status'] = true;
            $json['coupon_code_name'] = $getCoupon->name;
            $json['coupon_code'] = $getCoupon->code;
            $json['coupon_type'] = Str::lower($getCoupon->type);
            $json['coupon_percent_amount'] = number_format($getCoupon->percent_amount);
            $json['coupon_amount'] = number_format($coupon_amount);
            $json['payable_total'] = number_format($payable_total);
            $json['message'] = "success";
        } else {
            $json['status'] = false;
            $json['coupon_amount'] = 0;
            $json['payable_total'] = number_format(\Cart::getSubTotal());
            $json['message'] = "Mã giảm giá không tồn tại";
        }
        echo json_encode($json);
    }
}
