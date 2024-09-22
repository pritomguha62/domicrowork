<?php

namespace App\Http\Controllers;

use App\Models\Buy_package;
use App\Models\Member_user;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    public function packages(){

        $packages = Package::all();

        return view('admin_views.common.packages', compact('packages'));

    }

    public function add_package(){

        return view('admin_views.common.add_package');

    }

    public function add_package_info(Request $request){

        $request->validate([
            "title" => "required",
            "validity" => "required",
            "price" => "required",
        ]);

        if ($request->month_year == 'year') {
            $validity = intval(round($request->validity))*365;
        }else {
            $validity = intval(round($request->validity))*30;
        }

        $package = new Package();

        $package->title = $request->title;
        $package->validity = $validity;
        $package->price = $request->price;
        $package->limit = $request->limit;
        $package->status = $request->status;
        $package->save();

        return redirect()->back()->with('success', 'Package successfully added..!');

    }

    public function member_packages(){

        $member_packages = Package::where('status', 1)->get();

        return view('pub_views.member_packages', compact('member_packages'));

    }

    public function activate_package($package_id){

        if (empty(session()->get('user_code'))) {

            return redirect()->route('member_panel.signin')->with('error', 'Please log in first..');

        }

        $package = Package::where('status', 1)->where('package_id', $package_id)->first();

        return view('pub_views.activate_package', compact('package'));

    }

    public function activate_package_info(Request $request){

        $request->validate([
            "user_code" => "required",
            "trxid" => "required",
            "paid_from" => "required",
        ]);

        $package = Package::where('status', 1)->where('package_id', $request->package_id)->first();

        $member = Member_user::find($request->member_id);

        $buy_package = new Buy_package();

        $buy_package->paid_from = $request->paid_from;

        $buy_package->trxid = $request->trxid;

        $buy_package->user_code = $request->user_code;

        $buy_package->member_id = $member->member_id;

        $buy_package->package_id = $package->package_id;

        $buy_package->save();

        return redirect()->route('home')->with('success', 'Information submited, your account will be activate soon..!');

    }

















}



