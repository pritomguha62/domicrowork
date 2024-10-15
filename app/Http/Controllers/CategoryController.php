<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sub_category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function add_category(){

        return view('admin_views.common.add_category');

    }

    public function add_category_info(Request $request){

        $request->validate([
            'title'=>'required',
            'status'=>'required',
        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->admin_id = session()->get('admin_id');
        $category->status = $request->status;
        $category->save();

        return redirect()->back()->with('success', 'Category created..!');

    }

    public function categories(){

        $categories = Category::all();

        return view('admin_views.common.categories', compact('categories'));

    }

    public function update_category($category_id){

        $update_category = Category::find($category_id);

        return view('admin_views.common.update_category', compact('update_category'));

    }

    public function update_category_info(Request $request){

        $request->validate([
            'title'=>'required',
            'category_id'=>'required',
            'status'=>'required',
        ]);

        $update_category = Category::find($request->category_id);
        $update_category->title = $request->title;
        $update_category->admin_id = session()->get('admin_id');
        $update_category->status = $request->status;
        $update_category->update();

        return redirect()->back()->with('success', 'Category updated..!');

    }

    public function getSubcategories($category_id)
    {
        // Fetch subcategories based on category_id
        $subcategories = Sub_category::where('category_id', $category_id)->get();

        // Return the data as JSON
        return response()->json($subcategories);

    }

    public function getSubcategorieinfo($sub_category_id)
    {
        // Fetch subcategories based on category_id
        $subcategorie_info = Sub_category::find($sub_category_id);

        // Return the data as JSON
        return response()->json($subcategorie_info);

    }










}



