<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = ['id', 'category_name', 'rank', 'hidden', 'created_at', 'updated_at'];
    public $timestamps = false;

    static public function getCategory() {
        return Categories::where('hidden', 1)->orderBy('created_at', 'desc')->limit(6)->get();
    }

}
