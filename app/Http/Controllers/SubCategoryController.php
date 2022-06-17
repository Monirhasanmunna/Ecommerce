<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::orderBy('created_at','Desc')->paginate(10);
        return view('admin.subcategory.list',compact('subCategories'));
    }

    public function addNew()
    {
        $categories = Category::all();
        return view('admin.subcategory.addNew',compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required|max:100|unique:sub_categories',
            'category'=> 'required',
            'status' => 'sometimes',
        ]);

        $subcategory = new SubCategory();
        $subcategory->name = $request->name;
        $subcategory->cat_id = $request->category;

        if($request->status == true)
        {
            $subcategory->status = 1;
        }else
        {
            $subcategory->status = 0;
        }
       
        $subcategory->save();
        Toastr::success('Sub Category Added Successfully', '', ['success']);
        return redirect()->back();
    }

    public function edit($id)
    {
        $categories = Category::all();
        $subcategory = SubCategory::FindorFail($id);
        return view('admin.subcategory.edit',compact('subcategory','categories'));
    }


    public function update(Request $request ,$id)
    {
        
        $request->validate([

            'name' => 'required|max:100',
            'category' => 'required',
            'status' => 'sometimes',
        ]);

        $subcategory = SubCategory::FindorFail($id);

        $subcategory->name = $request->name;
        $subcategory->cat_id = $request->category;
        if($request->status == 1)
        {
            $subcategory->status = 1;
        }else
        {
            $subcategory->status = 0;
        }
       
        $subcategory->save();
        Toastr::info('Sub Category Updated Successfully', '', ['success']);
        return redirect()->back();

    }

    public function destroy($id)
    {
        $subcategory = Subcategory::FindorFail($id);
        $subcategory->delete();
        return redirect()->back();

    }
}
