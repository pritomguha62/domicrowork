<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Member_user;
use App\Models\Passbook;
use App\Models\Task;
use App\Models\Task_assignments;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function worker_click_task(Request $request){

        if (empty(session()->get('member_id'))) {
            
            $posts = Task::where('sub_category_id', null)->where('status', 1)->paginate(3)->get();

            return view('pub_views.worker_click_task', compact('posts'));

        }

            // Set the limit of records to fetch per page
            $limit = 3;
            
            // Get the current page from the request, default to 1 if not present
            $page = $request->input('page', 1);
            
            // Calculate the offset based on the page number and limit
            $offset = ($page - 1) * $limit;

            $workerId = session()->get('member_id');

            // Fetch the next 3 posts starting from the offset
            $posts = Task::whereDoesntHave('worker', function($query) use ($workerId) {
                $query->where('worker_id', $workerId)->whereDate('task_assignments.created_at', '<', Carbon::today());
            })->skip($offset)->take($limit)->get();
            
            // Count the total number of posts (for "Next" link logic)
            $totalPosts = Task::count();
            

            return view('pub_views.worker_click_task', compact('posts', 'page', 'totalPosts', 'limit'));

    }

    public function worker_click_task_info(Request $request){

        $member = Member_user::find(session()->get('member_id'));

        if($member->package->package_id == 1){

            $task_price_rate = 1;
            
        }elseif($member->package->package_id == 2){

            $task_price_rate = 4;

        }

        $dailyIncomeLimit = $member->package->task_amount;

        // Check if completing the task would exceed the daily income limit
        if (($member->daily_income + $task_price_rate) > $dailyIncomeLimit) {
            // return response()->json(['message' => 'Daily income limit reached.'], 403);
            return redirect()->back()->with('error', 'Daily income limit reached.');
        }

        $task_assignment = new Task_assignments();

        $task_assignment->task_id = $request->task_number_1;

        $task_assignment->status = 1;
        $task_assignment->approver_id = 2;
        $task_assignment->worker_id = session()->get('member_id');
        $task_assignment->save();
        
        $task_assignment = new Task_assignments();

        $task_assignment->task_id = $request->task_number_2;

        $task_assignment->status = 1;
        $task_assignment->approver_id = 2;
        $task_assignment->worker_id = session()->get('member_id');
        $task_assignment->save();
        
        $task_assignment = new Task_assignments();

        $task_assignment->task_id = $request->task_number_3;

        $task_assignment->status = 1;
        $task_assignment->approver_id = 2;
        $task_assignment->worker_id = session()->get('member_id');
        $task_assignment->save();

        $worker = Member_user::find(session()->get('member_id'));

        if (!empty($worker)) {

            $worker->balance = floatval($worker->balance) + floatval($task_price_rate);

            $worker->update();

            $passbook = new Passbook();

            $passbook->sender_name = 'Admin';

            $passbook->receiver_name = $worker->name;

            $passbook->receiver_member_id = $worker->member_id;

            // $passbook->sender_user_code = $member_info->user_code;

            // $passbook->sender_member_id = $member_info->member_id;


            $passbook->amount = $task_price_rate;

            $passbook->receiver_user_code = $worker->user_code;

            $passbook->save();

        }

        if (!empty($worker->parent_id)) {

            $first_parent = Member_user::where('member_id', $worker->parent_id)->where('parent_user_code', $worker->parent_user_code)->where('status', 1)->first();
    
            $second_parent = Member_user::where('member_id', $first_parent->parent_id)->where('parent_user_code', $first_parent->parent_user_code)->where('status', 1)->first();
    
            $third_parent = Member_user::where('member_id', $second_parent->parent_id)->where('parent_user_code', $second_parent->parent_user_code)->where('status', 1)->first();
    
    
            $first_commission = floatval($task_price_rate)/100 * 4;
    
            $second_commission = floatval($task_price_rate)/100 * 2;
    
            $third_commission = floatval($task_price_rate)/100 * 1;
    
            if ($first_parent) {
    
                $first_parent->balance = intval(floatval($first_parent->balance) + floatval($first_commission));
    
                $first_parent->update();
    
                
                $passbook = new Passbook();
    
                $passbook->sender_name = $worker->name;
    
                $passbook->receiver_name = $first_parent->name;
    
                $passbook->receiver_member_id = $first_parent->member_id;
    
                $passbook->sender_user_code = $worker->user_code;
    
                $passbook->sender_member_id = $worker->member_id;
    
    
                $passbook->amount = $task_price_rate;
    
                $passbook->receiver_user_code = $first_parent->user_code;
    
                $passbook->save();
    
            }
    
            if ($second_parent) {
    
                $second_parent->balance = intval(floatval($second_parent->balance) + floatval($second_commission));
    
                $second_parent->update();
    
                
                $passbook = new Passbook();
    
                $passbook->sender_name = $worker->name;
    
                $passbook->receiver_name = $second_parent->name;
    
                $passbook->receiver_member_id = $second_parent->member_id;
    
                $passbook->sender_user_code = $worker->user_code;
    
                $passbook->sender_member_id = $worker->member_id;
    
    
                $passbook->amount = $task_price_rate;
    
                $passbook->receiver_user_code = $second_parent->user_code;
    
                $passbook->save();
    
            }
    
            if ($third_parent) {
    
                $third_parent->balance = intval(floatval($third_parent->balance) + floatval($third_commission));
    
                $third_parent->update();
                
                $passbook = new Passbook();
    
                $passbook->sender_name = $worker->name;
    
                $passbook->receiver_name = $third_parent->name;
    
                $passbook->receiver_member_id = $third_parent->member_id;
    
                $passbook->sender_user_code = $worker->user_code;
    
                $passbook->sender_member_id = $worker->member_id;
    
    
                $passbook->amount = $task_price_rate;
    
                $passbook->receiver_user_code = $third_parent->user_code;
    
                $passbook->save();
    
    
            }

        }

        return response()->json([
            'status' => 'success',
            'message' => 'Completed!',
        ]);


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

        // $todayTasks = Task::whereDate('created_at', Carbon::today())
        // ->orderBy('created_at', 'desc')
        // ->limit(20)
        // ->get();

        $workerId = session()->get('member_id'); // Replace with the specific worker's ID

        $worker_social_tasks = Task::whereDoesntHave('worker', function($query) use ($workerId) {
            $query->where('worker_id', $workerId);
        })->whereDate('created_at', Carbon::today())
        ->where('sub_category_id', '!=', null)
        ->orderBy('created_at', 'desc')
        ->limit(20)
        ->get();

        // $worker_social_tasks = Task::with('category', 'sub_category')->where('status', 1)->get();

        return view('member_views.common.worker_social_tasks', compact('worker_social_tasks'));

    }


    // public function worker_click_tasks(){

    //     $todayTasks = Task::whereDate('created_at', Carbon::today())
    //     ->orderBy('created_at', 'desc')
    //     ->limit(20)
    //     ->get();

    //     $workerId = session()->get('member_id'); // Replace with the specific worker's ID

    //     $worker_social_tasks = $todayTasks::whereDoesntHave('worker', function($query) use ($workerId) {
    //         $query->where('worker_id', $workerId);
    //     })->get();

    //     return view('member_views.common.worker_social_tasks', compact('worker_social_tasks'));

    // }


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

        $member = Member_user::with('package')->find(session()->get('member_id'));

        // $required_price = floatval($request->task_price_rate) * intval($request->work_amount);

        $dailyIncomeLimit = $member->package->task_amount;
        // Check if the worker's income should be reset
        if ($member->income_reset_date != now()->toDateString()) {
            // It's a new day, so reset the income
            $member->daily_income = 0;
            $member->income_reset_date = now()->toDateString();
        }

        $task = Task::find($request->task_id);

        // Check if completing the task would exceed the daily income limit
        if (($member->daily_income + $task->task_price_rate) > $dailyIncomeLimit) {
            // return response()->json(['message' => 'Daily income limit reached.'], 403);
            return redirect()->back()->with('error', 'Daily income limit reached.');
        }

        // Update worker's daily income
        $member->daily_income += floatval($task->task_price_rate);

        $member->update();
        
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

    public function admin_confirm_tasks(){

        $confirm_tasks = Task_assignments::where('status', 0)->get();

        return view('admin_views.common.confirm_tasks', compact('confirm_tasks'));

    }

    public function accept_task($task_worker_id){

        $accept_task = Task_assignments::with('worker', 'task')->find($task_worker_id);
        
        $accept_task->status = 1;

        $worker = Member_user::find($accept_task->worker_id);

        $first_commission = floatval($accept_task->task->task_price_rate)/100 * 4;

        $second_commission = floatval($accept_task->task->task_price_rate)/100 * 2;

        $third_commission = floatval($accept_task->task->task_price_rate)/100 * 1;

        if (!empty($worker)) {

            $worker->balance = floatval($worker->balance) + floatval($accept_task->task->task_price_rate);

            $worker->update();

        }

        $first_parent = Member_user::where('member_id', $worker->parent_id)->where('parent_user_code', $worker->parent_user_code)->where('status', 1)->first();

        $second_parent = Member_user::where('member_id', $first_parent->parent_id)->where('parent_user_code', $first_parent->parent_user_code)->where('status', 1)->first();

        $third_parent = Member_user::where('member_id', $second_parent->parent_id)->where('parent_user_code', $second_parent->parent_user_code)->where('status', 1)->first();

        if ($first_parent) {

            $first_parent->balance = intval(floatval($first_parent->balance) + floatval($first_commission));

            $first_parent->update();

        }

        if ($second_parent) {

            $second_parent->balance = intval(floatval($second_parent->balance) + floatval($second_commission));

            $second_parent->update();

        }

        if ($third_parent) {

            $third_parent->balance = intval(floatval($third_parent->balance) + floatval($third_commission));

            $third_parent->update();

        }

        $accept_task->status = 1;

        return redirect()->back()->with('success', 'Task Accepted..!');

        // return view('admin_views.common.confirm_tasks', compact('confirm_tasks'));

    }

    public function reject_task($task_worker_id){

        $reject_task = Task_assignments::find($task_worker_id);

        $reject_task->status = 3;

        $reject_task->update();

        return redirect()->back()->with('error', 'Task rejected..!');

        // return view('admin_views.common.confirm_tasks', compact('confirm_tasks'));

    }





















}

