<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon_codes;

class AdminCouponCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $coupon_codes = Coupon_codes::getCouponCodes();
        return view('admin.pages.CouponCodes.List',['coupon_codes' => $coupon_codes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.CouponCodes.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save = new Coupon_codes();
        $save->name = trim($request->name);
        $save->code = trim($request->code);
        $save->type = trim($request->type);
        $save->percent_amount = trim($request->percent_amount);
        $save->expire_date = trim($request->expire_date);
        $save->status = trim($request->status);
        $save->save();
        toastr()->success("Thêm Coupon Code" .$request->name."thành công");
        return redirect()->back();
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
        $coupon = Coupon_codes::getCouponCodeItems($id);
        return view('admin.pages.CouponCodes.Edit', ['coupon' => $coupon]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [];
        $data['name'] = trim($request->name);
        $data['code'] = trim($request->code);
        $data['type'] = trim($request->type);
        $data['percent_amount'] = trim($request->percent_amount);
        $data['expire_date'] = trim($request->expire_date);
        $data['status'] = trim($request->status);
        Coupon_codes::where('id', $id)->update($data);
        toastr()->success("update Coupon Code" .$request->name."thành công");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon = Coupon_codes::where('id', $id)->count();
        if($coupon >= 1) {
            Coupon_codes::where('id', $id)->delete();
            return response(['status' => 'success', 'message'=> 'Xóa Counpon '. $id . ' thành công!']);
        }
    }
}
