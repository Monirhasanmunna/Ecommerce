<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at','Desc')->paginate();
        return view('admin.product.list',compact('products'));
    }

    public function addNew()
    {
        $categories = Category::all();
        return view('admin.product.addNew',compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([

            'title' => 'required|max:100',
            'category' => 'required',
            'price' => 'required',
            'image' => 'required|max:2048|mimes:jpg,jpeg,png,gif,webp',

        ]);

        $slug = Str::slug($request->title);
        $image = $request->file('image');
        if(isset($image))
        {
            //unique name create
            $imageName = $slug.'_'.uniqid().'.'.$image->getClientOriginalExtension();
            //storage Create
            if(!Storage::disk('public')->exists('product'))
            {
               Storage::disk('public')->makeDirectory('product');
            }

            $postImage = Image::make($image)->resize(783,800)->stream();
            Storage::disk('public')->put('product/'.$imageName,$postImage);
        }


        $product = new Product();
        $product->title = $request->title;
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->image = $imageName;
        if($request->status == true)
        {
            $product->status = true;
        }else{
            $product->status = false;
        }
        $product->save();
        Toastr::info('Product Added Successfully', '', ['success']);
        return redirect()->back();

    }

    public function addDetails($id)
    {
        return view('admin.product.addProductDetails',compact('id'));
    }

    public function detailsStore(Request $request ,$id)
    {
        $request->validate([

            'quantity' => 'required',
            'color'    => 'required',
            'images' => 'required|array|max:5',
            'images.*' => 'mimes:jpeg,jpg,png',
            'information'=> 'required',
        ]);

        
        $imageName=[];
        $slug = Str::slug('images');
        $image = $request->file('images');
        if(isset($image))
        {
            
            foreach ($request->images as $images)
            {

                $name = $slug.'_'.uniqid().'.'.$images->getClientOriginalExtension();

                $path = public_path() . '/uploads';
                $images->move($path, $name);
                

                array_push($imageName, $name);
                
            } 
        }

        $details = new ProductDetails();
        $details->images = json_encode($imageName);

        $details->quantity = $request->quantity;
        $details->information = $request->information;
        $details->color = $request->color;
        $details->product_id = $id;
        $details->save();
        Toastr::info('Product Details Added Successfully', '', ['success']);
        return redirect()->back();     
    }
}
