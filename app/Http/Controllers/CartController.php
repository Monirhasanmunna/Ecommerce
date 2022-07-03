<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request , $id)
    {
        $request->validate([

            'quantity' => 'required',

        ]);

        $product = New Cart();
        $product->quantity = $request->quantity;
        $product->user_id = Auth::id();
        $product->product_id = $id;
        $product->save();
        return redirect()->back()->with('message','Product Add in Cart');
    }


    public function destroy($id)
    {
        $cart = Cart::FindorFail($id);
        $cart->delete();
        return redirect()->back()->with('message','Product Delete in Cart');

    }
}
