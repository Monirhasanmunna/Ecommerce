<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public function home()
    {   
        $products = Product::all();
        return view('frontend.home',compact('products'));
    }

    public function specialsOffer()
    {
        return view('frontend.specialsOffer');
    }

    public function delivery()
    {
        return view('frontend.delivery');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function cart()
    {   
        $auth = Auth::id();
        $carts = Cart::where('user_id',$auth)->get();
        return view('frontend.cart',compact('carts'));
    }

    public function productView($id)
    {
        $product = Product::where('id',$id)->first();
        $productSubCat = $product->sub_category_id;
        $relatedProduct = Product::where('sub_category_id',$productSubCat)->orderBy('created_at','Desc')->get();
        return view('frontend.productView',compact('product','relatedProduct'));
    }
}
