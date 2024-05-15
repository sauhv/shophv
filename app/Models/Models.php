<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class models extends Model
{
    use HasFactory;
    protected $table = "models";
    protected $fillable = ['id', 'category_name', 'rank', 'hidden', 'created_at', 'updated_at'];
    public $timestamps = false;
}
