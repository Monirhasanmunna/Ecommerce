<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =['title','price','image'];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }

    public function productDetails()
    {
        return $this->hasOne(ProductDetails::class,'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
