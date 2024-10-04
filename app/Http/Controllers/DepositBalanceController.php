<?php

namespace App\Http\Controllers;

use App\Models\Deposit_balance;
use App\Models\Member_user;
use Illuminate\Http\Request;

class DepositBalanceController extends Controller
{

    public function deposit_balance_info(Request $request){

        $request->validate([
            "user_code" => "required",
            "deposit_balance" => "required",
            "trxid" => "required|unique:deposit_balances,trxid",
            "paid_from" => "required",
        ]);

        // $member = Member_user::find($request->member_id);

        $deposit_balance = new Deposit_balance();

        $deposit_balance->paid_from = $request->paid_from;

        $deposit_balance->trxid = $request->trxid;

        $deposit_balance->deposit_balance = $request->deposit_balance;

        $deposit_balance->user_code = $request->user_code;

        $deposit_balance->member_id = session()->get('member_id');

        $deposit_balance->save();

        return redirect()->back()->with('success', 'Information submited, your blance will be added soon after verification..!');

    }


    public function deposit_requests(){

        $deposit_requests = Deposit_balance::with('member')->where('status', '!=', 1)->where('approver_id', null)->get();

        return view('admin_views.common.deposit_requests', compact('deposit_requests'));

    }

    public function update_deposit($deposit_id){

        $update_deposit = Deposit_balance::with('member')->find($deposit_id);

        return view('admin_views.common.update_deposit', compact('update_deposit'));

    }



}


