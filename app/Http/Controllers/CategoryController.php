<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;



class CategoryController extends Controller
{
    public function index()
    {   
        $i=1;
        $categories = Category::orderBy('created_at','Desc')->paginate(3);
        return view('admin.category.list',compact('categories','i'));
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
        }else
        {
            $category->status = 0;
        }
       
        $category->save();
        Toastr::success('Category Added Successfully', '', ['success']);
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = Category::FindorFail($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request ,$id)
    {
        
        $request->validate([

            'name' => 'required|max:100',
            'status' => 'sometimes',
        ]);

        $category = Category::FindorFail($id);
        $category->name = $request->name;
        if($request->status == 1)
        {
            $category->status = 1;
        }else
        {
            $category->status = 0;
        }
       
        $category->save();
        Toastr::info('Category Updated Successfully', '', ['success']);
        return redirect()->back();

    }

    public function destroy($id)
    {
        $category = Category::FindorFail($id);
        $category->delete();
        return redirect()->back();

    }
}
   