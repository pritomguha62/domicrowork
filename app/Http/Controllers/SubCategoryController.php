<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sub_category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function add_sub_category(){

        $categories = Category::where('status', 1)->get();

        return view('admin_views.common.add_sub_category', compact('categories'));

    }

    public function add_sub_category_info(Request $request){

        $request->validate([
            'title'=>'required',
            'category_id'=>'required',
            'status'=>'required',
        ]);

        $sub_category = new Sub_category();
        $sub_category->title = $request->title;
        $sub_category->category_id = $request->category_id;
        $sub_category->price = $request->price;
        $sub_category->admin_id = session()->get('admin_id');
        $sub_category->status = $request->status;
        $sub_category->save();

        return redirect()->back()->with('success', 'Sub Category created..!');

    }

    public function sub_categories(){

        $sub_categories = Sub_category::all();

        return view('admin_views.common.sub_categories', compact('sub_categories'));

    }

    public function update_sub_category($sub_category_id){

        $update_sub_category = Sub_category::find($sub_category_id);

        $categories = Category::all();

        return view('admin_views.common.update_sub_category', compact('update_sub_category', 'categories'));

    }

    public function update_sub_category_info(Request $request){

        $request->validate([
            'title'=>'required',
            'category_id'=>'required',
            'status'=>'required',
        ]);

        $update_sub_category = Sub_category::find($request->sub_category_id);
        $update_sub_category->title = $request->title;
        $update_sub_category->category_id = $request->category_id;
        $update_sub_category->price = $request->price;
        $update_sub_category->admin_id = session()->get('admin_id');
        $update_sub_category->status = $request->status;
        $update_sub_category->update();

        return redirect()->back()->with('success', 'Sub category updated..!');

    }


}


