<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        'id', 
        'name', 
        'phone_number', 
        'address', 
        'email', 
        'status', 
        'total_money', 
        'note', 
        'admin_note', 
        'created_at',	
        'updated_at',	
        'user_id'];
    public $timestamps = false;
    static public function getOrder() {
        return Orders::orderBy('created_at', 'desc');
    }
    static public function getOrderUser($id) {
        return Orders::where('user_id', $id)->orderBy('created_at', 'asc');
    }
}