<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =['title','price','image'];

    public function SubCategory()
    {
        return $this->belongsTo(SubCategory::class,'category_id');
    }

    public function ProductDetails()
    {
        return $this->belongsTo(ProductDetails::class,'product_id');
    }
}
