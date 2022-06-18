<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['id','cat_id','name','status','created_at','updated_at'];

    public function Category()
    {
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function Products()
    {
        return $this->hasMany(Product::class,'category_id');
    }
}
