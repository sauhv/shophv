<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon_codes extends Model
{
    use HasFactory;
    protected $table = 'coupon_codes';
    protected $fillable = ['id', 'name', 'code', 'type', 'percent_amount', 'expire_date', 'status', 'is_delete', 'created_at', 'updated_at'];

    static public function getCouponCodeItems($id)
    {
        return self::find($id);
    }
    static public function getCouponCodes()
    {
        return self::select('coupon_codes.*')
            ->where('coupon_codes.is_delete', '=', 1)
            ->orderBy('coupon_codes.id', 'desc')
            ->paginate(12);
    }

    static public function checkCoupon($coupon_code)
    {
        return self::select('coupon_codes.*')
            ->where('coupon_codes.code', '=', $coupon_code)
            ->where('coupon_codes.expire_date', '>=', date('Y-m-d'))
            ->first();
    }
}
