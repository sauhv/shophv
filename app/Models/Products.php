<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'slug',
        'amount',
        'price',
        'image',
        'thumbnails',
        'description',
        'shortDes',
        'hot',
        'views',
        'hidden',
        'model_id',
        'category_id',
        'created_at',
        'updated_at'
    ];

}
