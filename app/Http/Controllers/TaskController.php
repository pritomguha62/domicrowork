<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Member_user;
use App\Models\Task;
use App\Models\Task_assignments;
use Carbon\Carbon;
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

    public function admin_add_click_task(){

        // $categories = Category::where('status', 1)->get();

        return view('admin_views.common.add_click_task');

    }



    public function admin_add_click_task_info(Request $request){

        $request->validate([
            'title'=>'required',
            // 'category_id'=>'required',
            // 'sub_category_id'=>'required',
            'description'=>'required',
            // 'required_proof'=>'required',
            // 'task_price_rate'=>'required',
            'status'=>'required',
        ]);

        $click_task = new Task();
        $click_task->title = $request->title;
        // $click_task->category_id = $request->category_id;
        // $click_task->sub_category_id = $request->sub_category_id;
        $click_task->description = $request->description;
        // $click_task->work_link = $request->work_link;

        if (!empty($request->ss_thumbnail)) {

            $request->validate([
                "ss_thumbnail"=> "required|max:7240",
            ]);

            $name = $request->title;
            $image_name = $name.'_ss_thumbnail_'.date("Y_m_d_h_i_sa").'.'.$request->file('ss_thumbnail')->getClientOriginalExtension();
            $request->file('ss_thumbnail')->move(public_path('storage/uploads/image/'), $image_name);

            $click_task->ss_thumbnail = $image_name;


        }

        // $click_task->required_proof = $request->required_proof;
        $click_task->task_price_rate = $request->task_price_rate;
        // $click_task->work_amount = $request->work_amount;
        // $click_task->price = $request->price;
        $click_task->admin_id = session()->get('admin_id');
        $click_task->status = $request->status;
        // $click_task->expire_date = $request->expire_date;
        $click_task->save();

        return redirect()->back()->with('success', 'Task created..!');

    }

    public function admin_social_tasks(){

        $tasks = Task::where('sub_category_id', '!=', null)->get();

        $categories = Category::where('status', 1)->get();

        return view('admin_views.common.social_tasks', compact('tasks', 'categories'));

    }

    public function admin_click_tasks(){

        $tasks = Task::where('sub_category_id', null)->get();

        // $categories = Category::where('status', 1)->get();

        return view('admin_views.common.click_tasks', compact('tasks'));

    }

    public function admin_update_social_task($task_id){

        $task = Task::find($task_id);

        $categories = Category::where('status', 1)->get();

        return view('admin_views.common.update_social_task', compact('task', 'categories'));

    }

    public function admin_update_click_task($task_id){

        $task = Task::find($task_id);

        // $categories = Category::where('status', 1)->get();

        return view('admin_views.common.update_click_task', compact('task'));

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

    public function update_click_task_info(Request $request){

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'status'=>'required',
        ]);

        $click_task = Task::find($request->task_id);
        $click_task->title = $request->title;
        // $click_task->category_id = $request->category_id;
        // $click_task->sub_category_id = $request->sub_category_id;
        $click_task->description = $request->description;
        // $click_task->work_link = $request->work_link;

        if (!empty($request->ss_thumbnail)) {

            if (!empty($click_task->ss_thumbnail)) {
                unlink(public_path('storage/uploads/image/'.$click_task->ss_thumbnail));
            }


            $request->validate([
                "ss_thumbnail"=> "required|max:7240",
            ]);

            $name = $request->title;
            $image_name = $name.'_ss_thumbnail_'.date("Y_m_d_h_i_sa").'.'.$request->file('ss_thumbnail')->getClientOriginalExtension();
            $request->file('ss_thumbnail')->move(public_path('storage/uploads/image/'), $image_name);

            $click_task->ss_thumbnail = $image_name;


        }

        // $click_task->required_proof = $request->required_proof;
        $click_task->task_price_rate = $request->task_price_rate;
        // $click_task->work_amount = $request->work_amount;
        // $click_task->price = $request->price;
        $click_task->admin_id = session()->get('admin_id');
        $click_task->status = $request->status;
        // $click_task->expire_date = $request->expire_date;
        $click_task->update();

        return redirect()->back()->with('success', 'Task updated..!');

    }


    public function client_add_social_task(){

        return view('admin_views.common.add_social_task');

    }


    public function add_client_social_task(){

        $categories = Category::where('status', 1)->get();

        return view('member_views.common.add_client_social_task', compact('categories'));

    }


    public function task_requests(){

        $task_requests = Task::where('status', 0)->get();

        return view('admin_views.common.task_requests', compact('task_requests'));

    }

    public function activate_task($task_id){

        $activate_task = Task::find($task_id);

        $activate_task->status = 1;

        $activate_task->update();

        return redirect()->back()->with('success', 'Task activated..!');

    }


    public function worker_social_tasks(){

        // $task_assignments = Task_assignments::where('member_id', session()->get('member_id'))

        $todayTasks = Task::whereDate('created_at', Carbon::today())
        ->orderBy('created_at', 'desc')
        ->limit(20)
        ->get();

        $workerId = session()->get('member_id'); // Replace with the specific worker's ID

        $worker_social_tasks = $todayTasks::whereDoesntHave('worker', function($query) use ($workerId) {
            $query->where('worker_id', $workerId);
        })->get();

        // $worker_social_tasks = Task::with('category', 'sub_category')->where('status', 1)->get();

        return view('member_views.common.worker_social_tasks', compact('worker_social_tasks'));

    }


    public function worker_click_tasks(){

        // $task_assignments = Task_assignments::where('member_id', session()->get('member_id'))

        $todayTasks = Task::whereDate('created_at', Carbon::today())
        ->orderBy('created_at', 'desc')
        ->limit(20)
        ->get();

        $workerId = session()->get('member_id'); // Replace with the specific worker's ID

        $worker_social_tasks = $todayTasks::whereDoesntHave('worker', function($query) use ($workerId) {
            $query->where('worker_id', $workerId);
        })->get();

        // $worker_social_tasks = Task::with('category', 'sub_category')->where('status', 1)->get();

        return view('member_views.common.worker_social_tasks', compact('worker_social_tasks'));

    }


    public function add_client_social_task_info(Request $request){

        $request->validate([
            'title'=>'required',
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'description'=>'required',
            'required_proof'=>'required',
            'task_price_rate'=>'required|numeric|min:2.5',
            'work_amount'=>'required|numeric|min:5',
        ]);

        $member = Member_user::find(session()->get('member_id'));

        $required_price = floatval($request->task_price_rate) * intval($request->work_amount);

        if ($required_price < $member->deposit_balance or $required_price < $member->balance) {

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
            $social_task->price = $required_price;
            $social_task->client_id = session()->get('member_id');
            $social_task->save();

            if ($member->deposit_balance > $required_price) {

                $member->deposit_balance = intval($member->deposit_balance) - floatval($required_price);

            }else{

                $member->balance = intval($member->balance) - floatval($required_price);

            }

            $member->update();

            return redirect()->back()->with('success', 'Task created..!');


        }else {

            return view('member_views.common.deposit', compact('required_price'));

        }


    }


    public function submit_social_task_info(Request $request){

        $request->validate([
            'task_id'=>'required',
            'first_ss'=>'required',
            'second_ss'=>'required',
        ]);

        $member = Member_user::find(session()->get('member_id'));

        $required_price = floatval($request->task_price_rate) * intval($request->work_amount);

            $task_assignment = new Task_assignments();
            $task_assignment->task_id = $request->task_id;

            if (!empty($request->first_ss)) {

                $request->validate([
                    "first_ss"=> "required|max:7240",
                ]);

                $name = 'task';
                $image_name1 = $name.'_first_ss_'.date("Y_m_d_h_i_sa").'.'.$request->file('first_ss')->getClientOriginalExtension();
                $request->file('first_ss')->move(public_path('storage/uploads/image/'), $image_name1);

                $task_assignment->first_ss = $image_name1;


            }

            if (!empty($request->second_ss)) {

                $request->validate([
                    "second_ss"=> "required|max:7240",
                ]);

                $name = 'task';
                $image_name2 = $name.'_second_ss_'.date("Y_m_d_h_i_sa").'.'.$request->file('second_ss')->getClientOriginalExtension();
                $request->file('second_ss')->move(public_path('storage/uploads/image/'), $image_name2);

                $task_assignment->second_ss = $image_name2;


            }

        $task_assignment->status = 0;
        $task_assignment->worker_id = session()->get('member_id');
        $task_assignment->save();

        return redirect()->route('worker_panel.worker_social_tasks')->with('success', 'Task submitted..!');



    }


    public function apply_social_task($task_id){

        $apply_social_task = Task::with('category', 'sub_category')->find($task_id);

        return view('member_views.common.apply_social_task', compact('apply_social_task'));

    }


    public function submit_social_task($task_id){

        $submit_social_task = Task::with('category', 'sub_category')->find($task_id);

        return view('member_views.common.submit_social_task', compact('submit_social_task'));

    }





















}

