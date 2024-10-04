<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function admin_add_social_task(){

        $categories = Category::where('status', 1)->get();

        return view('admin_views.common.add_social_task', compact('categories'));

    }



    public function admin_add_social_task_info(Request $request){

        $request->validate([
            'title'=>'required',
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'description'=>'required',
            'required_proof'=>'required',
            'task_price_rate'=>'required',
            'status'=>'required',
        ]);

        $social_task = new Task();
        $social_task->title = $request->title;
        $social_task->category_id = $request->category_id;
        $social_task->sub_category_id = $request->sub_category_id;
        $social_task->description = $request->description;
        $social_task->work_link = $request->work_link;

        if (!empty($request->ss_thumbnail)) {

            $request->validate([
                "ss_thumbnail"=> "required|max:7240",
            ]);

            $name = $request->title;
            $image_name = $name.'_ss_thumbnail_'.date("Y_m_d_h_i_sa").'.'.$request->file('ss_thumbnail')->getClientOriginalExtension();
            $request->file('ss_thumbnail')->move(public_path('storage/uploads/image/'), $image_name);

            $social_task->ss_thumbnail = $image_name;


        }

        $social_task->required_proof = $request->required_proof;
        $social_task->task_price_rate = $request->task_price_rate;
        $social_task->work_amount = $request->work_amount;
        $social_task->price = $request->price;
        $social_task->admin_id = session()->get('admin_id');
        $social_task->status = $request->status;
        $social_task->expire_date = $request->expire_date;
        $social_task->save();

        return redirect()->back()->with('success', 'Task created..!');

    }

    public function admin_social_task(){

        $tasks = Task::all();

        $categories = Category::where('status', 1)->get();

        return view('admin_views.common.tasks', compact('tasks', 'categories'));

    }

    public function admin_update_social_task($task_id){

        $task = Task::find($task_id);

        $categories = Category::where('status', 1)->get();

        return view('admin_views.common.update_social_task', compact('task', 'categories'));

    }


    public function admin_update_social_task_info(Request $request){

        $request->validate([
            'title'=>'required',
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'description'=>'required',
            'required_proof'=>'required',
            'task_price_rate'=>'required',
            'status'=>'required',
        ]);

        $social_task = Task::find($request->task_id);
        $social_task->title = $request->title;
        $social_task->category_id = $request->category_id;
        $social_task->sub_category_id = $request->sub_category_id;
        $social_task->description = $request->description;
        $social_task->work_link = $request->work_link;

        if (!empty($request->ss_thumbnail)) {

            if (!empty($social_task->ss_thumbnail)) {
                unlink(public_path('storage/uploads/image/'.$social_task->ss_thumbnail));
            }


            $request->validate([
                "ss_thumbnail"=> "required|max:7240",
            ]);

            $name = $request->title;
            $image_name = $name.'_ss_thumbnail_'.date("Y_m_d_h_i_sa").'.'.$request->file('ss_thumbnail')->getClientOriginalExtension();
            $request->file('ss_thumbnail')->move(public_path('storage/uploads/image/'), $image_name);

            $social_task->ss_thumbnail = $image_name;


        }

        $social_task->required_proof = $request->required_proof;
        $social_task->task_price_rate = $request->task_price_rate;
        $social_task->work_amount = $request->work_amount;
        $social_task->price = $request->price;
        $social_task->admin_id = session()->get('admin_id');
        $social_task->status = $request->status;
        $social_task->expire_date = $request->expire_date;
        $social_task->update();

        return redirect()->back()->with('success', 'Task updated..!');

    }


    public function client_add_social_task(){

        return view('admin_views.common.add_social_task');

    }

    public function client_add_social_task_info(Request $request){

        $request->validate([
            'title'=>'required',
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'description'=>'required',
            'required_proof'=>'required',
            'task_price_rate'=>'required',
            'work_amount'=>'required',
            'price'=>'required',
            'status'=>'required',
        ]);

        $social_task = new Task();
        $social_task->title = $request->title;
        $social_task->category_id = $request->category_id;
        $social_task->sub_category_id = $request->sub_category_id;
        $social_task->description = $request->description;
        $social_task->ss_thumbnail = $request->ss_thumbnail;
        $social_task->required_proof = $request->required_proof;
        $social_task->task_price_rate = $request->task_price_rate;
        $social_task->work_amount = $request->work_amount;
        $social_task->price = $request->price;
        $social_task->client_id = session()->get('member_id');
        $social_task->status = $request->status;
        $social_task->expire_date = $request->expire_date;
        $social_task->save();

        return redirect()->back()->with('success', 'Task created, please wait for approval..!');

    }


}

