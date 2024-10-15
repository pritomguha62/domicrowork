<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{

    public function create_notice(){

        return view('admin_views.common.create_notice');

    }

    public function create_notice_info(Request $request){

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'status'=>'required',
        ]);

        $notice = new Notice();
        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->admin_id = session()->get('admin_id');
        $notice->admin_user_code = session()->get('user_code');
        $notice->status = $request->status;
        $notice->save();

        return redirect()->back()->with('success', 'Notice created..!');

    }


}


