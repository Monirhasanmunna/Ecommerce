<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['id','category_id','name','status','created_at','updated_at'];

    public function Category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'sub_category_id');
    }
}
