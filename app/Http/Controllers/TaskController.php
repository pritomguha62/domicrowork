<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function admin_add_social_task(){

        return view('admin_views.common.add_social_task');

    }

    

    public function admin_add_social_task_info(Request $request){

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'client_link'=>'required',
            'code'=>'required',
            'limit'=>'required',
            'status'=>'required',
        ]);

        $social_task = new Task();
        $social_task->description = $request->description;
        $social_task->admin_id = session()->get('admin_id');
        $social_task->client_link = $request->client_link;
        $social_task->code = $request->code;
        $social_task->limit = $request->limit;
        $social_task->expire_date_time = $request->expire_date_time;
        $social_task->status = $request->status;
        $social_task->save();

        return redirect()->back()->with('success', 'Task created..!');

    }



    public function client_add_social_task(){

        return view('admin_views.common.add_social_task');

    }

    public function client_add_social_task_info(Request $request){

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'client_link'=>'required',
            // 'code'=>'required',
            'limit'=>'required',
            'status'=>'required',
        ]);

        $social_task = new Task();
        $social_task->description = $request->description;
        $social_task->client_id = session()->get('client_id');
        $social_task->client_link = $request->client_link;
        $social_task->code = $request->code;
        $social_task->limit = $request->limit;
        $social_task->expire_date_time = $request->expire_date_time;
        $social_task->status = 0;
        $social_task->save();

        return redirect()->back()->with('success', 'Task created, please wait for approval..!');

    }


}

