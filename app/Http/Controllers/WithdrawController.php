<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Admin_user;
use App\Models\Member_user;
use App\Models\Payment_method;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Mail;

class WithdrawController extends Controller
{

    public function withdraw_request_member(Request $request){

        $request->validate([
            'payment_method'=>'required',
            'account_num'=>'required',
            'amount'=>'required|numeric|min:100',
        ]);

        // $payment_method = Payment_method::where('method_id', $request->method_id)->first();

        $member = Member_user::find(session()->get('member_id'));

        $admin = Admin_user::find(2);

        $withdraw_request_member = new Withdraw();

        if ($request->amount <= $member->balance) {

            $withdraw_request_member->name = session()->get('name');
            $withdraw_request_member->member_id = $member->member_id;
            $withdraw_request_member->payment_method = $request->payment_method;
            $withdraw_request_member->account_num = $request->account_num;
            $withdraw_request_member->user_code = session()->get('user_code');


            $request->amount = intval($request->amount);
            $member->balance = intval($member->balance);

            if ($member->withdraws == null) {
                if ($member->balance >= 300 && $request->amount >= 300) {
                    $member->balance = $member->balance - 200;
                    $amount = $request->amount - 200;
                    $admin->balance = intval($admin->balance) + 200;
                    $admin->update();
                    $request->amount = $amount;

                }else {
                    return redirect()->back()->with('error', 'First withdraw amount must be 300 or more..!');
                }
            }


            $withdraw_request_member->amount = $request->amount;

            $member->withdraws = intval($member->withdraws);

            $new_balance = $member->balance - $request->amount;

            $new_withdraws = $member->withdraws + $request->amount;


            $member->balance = $new_balance;

            $member->withdraws = $new_withdraws;

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

    public function withdraw_approvals(Request $request){

        $withdraw_approvals = Withdraw::where('status', 0)->get();

        return view('admin_view.common.withdraw_approvals', compact('withdraw_approvals'));

    }


}



