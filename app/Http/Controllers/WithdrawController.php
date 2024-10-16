<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Admin_user;
use App\Models\Member_user;
use App\Models\Payment_method;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WithdrawController extends Controller
{

    public function withdraw_request_member(Request $request){

        $request->validate([
            'payment_method'=>'required',
            'account_num'=>'required',
            'amount'=>'required|numeric|min:500',
        ]);

        // $payment_method = Payment_method::where('method_id', $request->method_id)->first();

        $member = Member_user::find(session()->get('member_id'));

        $admin = Admin_user::find(2);

        $withdraw_request_member = new Withdraw();

        $request->amount = intval($request->amount);

        $member->balance = intval($member->balance);

        $charge = ($request->amount/100) * intval(7);

        if ($request->amount + $charge + 5 <= $member->balance) {

            $withdraw_request_member->name = session()->get('name');
            $withdraw_request_member->member_id = $member->member_id;
            $withdraw_request_member->payment_method = $request->payment_method;
            $withdraw_request_member->account_num = $request->account_num;
            $withdraw_request_member->user_code = session()->get('user_code');


            $withdraw_request_member->amount = $request->amount;

            $new_balance = $member->balance - ($request->amount + $charge);

            $member->balance = $new_balance;

            $withdraw_request_member->save();

            $member->update();

            $subject_member = 'Withdraw request.';

            $body_member = '
            Hello, <br><br>
            Your withdraw request has been sent. It may take some time for payment. <br> <br>
            Thank you, <br>
            Do Micro Work.
            ';

            Mail::to($member->email)->send(new SendMail($subject_member, $body_member));

            $subject_admin = 'Withdraw request.';

            $body_admin = '
            Hello, <br><br>
            A new withdraw request was created. Please check withdraw information for approval. <br> <br>
            Thank you, <br>
            Do Micro Work.
            ';

            Mail::to('domicrowork@gmail.com')->send(new SendMail($subject_admin, $body_admin));

            return redirect()->back()->with('success', 'Withdraw Request Submited..!');

        }else{

            return redirect()->back()->with('error', 'Insufficient Balance..!');
        }


    }

    public function member_debit_passbook(Request $request){

        $member_debit_passbooks = Withdraw::where('member_id', session()->get('member_id'))->get();

        return view('member_view.member_debit_passbook', compact('member_debit_passbooks'));

    }

    public function withdraw_approvals(){

        $withdraw_approvals = Withdraw::where('status', 0)->get();

        return view('admin_views.common.withdraw_approvals', compact('withdraw_approvals'));

    }

    public function update_withdraw_approval($withdraw_id){

        $update_withdraw_approval = Withdraw::find($withdraw_id);

        return view('admin_views.common.update_withdraw_approval', compact('update_withdraw_approval'));

    }

    public function withdraw_approval_info(Request $request){

        $request->validate([
            'payment_method'=>'required',
            'account_num'=>'required',
            'amount'=>'required|numeric|min:500',
            'status'=>'required',
            'withdraw_id'=>'required',
        ]);

        $withdraw_approval_info = Withdraw::find($request->withdraw_id);

        $member = Member_user::where('member_id', $withdraw_approval_info->member_id)->first();

        if ($withdraw_approval_info->unique_id_status != null) {

            return redirect()->route('admin_panel.withdraw_approvals')->with('error', 'Withdraw has been proccessed..!');

        }

        if ($request->status == 1) {

            $member->withdraws = intval($member->withdraws);


            $new_withdraws = $member->withdraws + $withdraw_approval_info->amount;

            $member->withdraws = $new_withdraws;

            $withdraw_approval_info->status = 1;

        }else {

            $member->balance = intval($member->balance) + intval($withdraw_approval_info->amount);

            $withdraw_approval_info->status = 3;

        }

        $withdraw_approval_info->approver_id = session()->get('admin_id');

        $withdraw_approval_info->approver_user_code = session()->get('user_code');

        $withdraw_approval_info->update();

        $member->update();

        if ($request->status != 1) {

            $subject_member = 'Withdraw request.';

            $body_member = '
            Hello, <br><br>
            Your withdraw request has been rejected. Your balance has been returned. <br> <br>
            Thank you, <br>
            Do Micro Work.
            ';

            Mail::to($member->email)->send(new SendMail($subject_member, $body_member));

        }


        return redirect()->route('admin_panel.withdraw_approvals')->with('success', 'Withdraw Status Updated..!');

    }








}



