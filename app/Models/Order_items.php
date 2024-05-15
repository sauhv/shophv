<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_items extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillale = [	'id', 'product_name', 'quantity', 'price', 'product_id', 'order_id', 'created_at', 'updated_at'];
    public $timestamps = false;

    static public function getOrderItems($id) {
        return Order_items::select('order_items.product_name', 'order_items.quantity', 'order_items.price', 'order_items.product_id', 'products.image')
                            ->join('products', 'products.id', '=', 'order_items.product_id')
                            ->where('order_id', $id);
    }
    static public function getOrderItemAdmin($id) {
        return Order_items::select('order_items.*', 'products.image')
                            ->join('products', 'products.id', '=', 'order_items.product_id')
                            ->where('order_id', $id);
    }
}
