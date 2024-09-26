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
        $social_task->title = $request->title;
        $social_task->title = $request->title;
        $social_task->save();

    }


}

