<?php

namespace App\Http\Controllers;

use App\Models\Category;
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


}

