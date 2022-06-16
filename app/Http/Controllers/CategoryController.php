<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;



class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.list');
    }

    public function addNew()
    {
        return view('admin.category.addNew');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|max:100|unique:categories',
            'status' => 'sometimes',
        ]);

        $category = new Category();
        $category->name = $request->name;
        if($request->status == 1)
        {
            $category->status = 1;
        }else {
            $category->status = 0;
        }
       
        $category->save();
        Toastr::success('Category Added Successfully', '', ['success']);
        return redirect()->back();

        
        
    }
}
   