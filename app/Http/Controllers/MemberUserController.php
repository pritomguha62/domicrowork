<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Admin_user;
use App\Models\Buy_package;
use App\Models\Deposit_balance;
use App\Models\Member_user;
use App\Models\Package;
use App\Models\Passbook;
use App\Models\Payment_method;
use App\Models\Role;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MemberUserController extends Controller
{

    public function home(){

        $packages = Package::where('status', 1)->get();

        return view('pub_views.home', compact('packages'));

    }

    public function worker_dashboard(){

        // if (session()->get('status') != 1 && session()->has(key: 'member_id')) {

        //     return redirect()->route('member_deactive');

        // }

        // if (session()->get('is_client') == 1) {

        //     return redirect()->route('client_panel.dashboard');

        // }

        $member_user = Member_user::find(session()->get('member_id'));

        if ($member_user->expire_date < strval(now())) {

            $member_user->is_worker = 0;

            session()->put('is_worker', 0);

            $member_user->update();

        }

        return view('member_views.common.worker_dashboard');
    }

    public function client_dashboard(){

        $member_dashboard = Member_user::find(session()->get('member_id'));

        $member_refers = Member_user::where('parent_user_code', session()->get('user_code'))->get()->count();

        return view('member_views.common.client_dashboard', compact('member_dashboard', 'member_refers'));
    }


    public function member_signup() {

        return view('member_views.common.signup');
    }

    public function member_signin() {

        return view('member_views.common.signin');

    }


    // public function dashboard() {

    //     if(session()->get('status') == 1){

    //         $member_user = Member_user::find(session()->get('member_id'));

    //         $courses = Course::all();

    //         $classes = Online_class::latest()->limit(1)->get();

    //         return view('member_view.dashboard', compact('courses', 'classes'));
    //     }else{
    //         return redirect()->route('member_deactive');
    //     }

    // }

    public function member_register_info(Request $request){

        $request->validate(
            [
            "name" => "required",
            "email" => "required|email|unique:member_users,email",
            "password"=> "required|min:8|max:16",
            "confirm_password"=> "required|same:password",
            // "role" => "required",
            // "terms_condition"=> "required",
        ]);

        $parent_user_admin = Admin_user::where('user_code', $request->parent_user_code)->first();

        $parent_user_member = Member_user::where('user_code', $request->parent_user_code)->first();

        $member = new Member_user();

        $member->name = $request->name;

        $member->email = $request->email;

        $member->parent_user_code = $request->parent_user_code;

        if (!empty($parent_user_admin)) {

            $member->parent_user_code = $parent_user_admin->user_code;

        }elseif (!empty($parent_user_member)) {

            $member->parent_user_code = $parent_user_member->user_code;

            $member->parent_id = $parent_user_member->member_id;

        }else {

            $member->parent_user_code = null;

        }

        // if ($request->role == 'is_worker') {
        //     $member->is_worker = 1;
        //     session()->put('is_worker', 1);
        // }

        $member->is_client = 1;

        // if ($request->role == 'both') {
        //     $member->is_worker = 1;
        //     session()->put('is_worker', 1);
        //     $member->is_client = 1;
        // }


        $member->role_id = 4;

        $member->password = Hash::make($request->password);

        $member->save();

        session()->put('email', $request->email);

        $last_member_user = Member_user::where('email', session()->get('email'))->first();

        $last_number = $last_member_user->member_id;

        $string_user_code = '10'.date('Ym').'00';

        $user_code = abs(intval($string_user_code)+$last_number);

        $last_member_user->user_code = strval($user_code);

        $last_member_user->update();

        session()->put('name', $last_member_user->name);

        session()->put('user_code', $last_member_user->user_code);

        $subject = 'New application received.';

        $body = '
        Hello Sir, <br><br>
        New application was received. Please check your admission application dashboard. <br> <br>
        Thank you <br>
        Do Micro Work.
        ';

        Mail::to('domicrowork@gmail.com')->send(new SendMail($subject, $body));

        $last_member_user = Member_user::where('email', session()->get('email'))->first();

        return redirect()->route('member.token_verify')->with('success', 'দয়া করে ইমেইল যাচাই করুন..');

    }


    public function profile(){

        $profile = Member_user::find(session()->get('member_id'));

        return view('member_views.common.profile', compact('profile'));

    }

    public function update_profile(Request $request){

        $update_profile = Member_user::find(session()->get('member_id'));

        $update_profile->name = $request->name;

        $update_profile->email = $request->email;

        $update_profile->phone = $request->phone;

        // $update_profile->parent_user_code = $request->parent_user_code;

        // if (!empty($parent_user_admin)) {

        //     $update_profile->parent_user_code = $parent_user_admin->user_code;

        // }elseif (!empty($parent_user_update_profile)) {

        //     $update_profile->parent_user_code = $parent_user_update_profile->user_code;

        //     $update_profile->parent_id = $parent_user_update_profile->update_profile_id;

        // }else {

        //     $update_profile->parent_user_code = null;

        // }

        // if ($request->role == 'is_worker') {
        //     $update_profile->is_worker = 1;
        //     session()->put('is_worker', 1);
        // }

        // $update_profile->is_client = 1;

        // if ($request->role == 'both') {
        //     $update_profile->is_worker = 1;
        //     session()->put('is_worker', 1);
        //     $update_profile->is_client = 1;
        // }


        // $update_profile->role_id = 4;

        // $update_profile->password = Hash::make($request->password);

        $update_profile->update();

        return redirect()->back()->with('success', 'Profile Updated..!');

    }



    public function member_deactive(){

        return view('member_views.common.member_deactive');

    }

    public function member_token_verify(){

        $verify_token = rand(100000,999999);

        $member = Member_user::where('email', session()->get('email'))->first();

        $member->verify_token = $verify_token;

        $member->update();

        session()->put('verify_token', $verify_token);

        $subject_member = 'Mail verification request.';


        $body_member = '
        Hello Sir, <br><br>
        Your otp is <br><br>'.$verify_token.' <br> <br>
        Provide the otp to verify account. <br>
        Thank you, <br>
        Do Micro Work.
        ';

        Mail::to($member->email)->send(new SendMail($subject_member, $body_member));

        return view('member_views.common.member_token_verify');
    }

    public function member_token_verification(Request $request){

        $email_token_submit = Member_user::where('email', session()->get('email'))->where('verify_token', $request->verify_token)->update([ 'email_verified' => 1 ]);

            if(!empty($email_token_submit)){

                session()->put('email_verified', 1);
                session()->forget('verify_token');

                if (session()->get('is_worker') == 1) {
                    return redirect(route('member_panel.member_packages'))->with('success', 'ইমেইল যাচাই সম্পন্ন হয়েছে, প্যাকেজ কিনুন..!');
                }else {
                    return redirect(route('member_panel.signin'))->with('success', 'ইমেইল যাচাই সম্পন্ন হয়েছে, লগইন করুন..!');
                }
            }else {
                return redirect(route('member_panel.token_verify'))->with('error', 'Email can not be verified, please retry..!');
            }

    }

    public function check_login(Request $request){


        $request->validate(
            [
            "email" => "required",
            "password"=> "required|min:8|max:16",
        ]);

        $email = $request->email;
        $password = $request->password;

        $member_user = Member_user::where('email', $email)->first();

        if (!empty($member_user) && Hash::check($password, $member_user->password)) {

            if ($request->rememberme == 'on') {
                setcookie('email', $request->email, time() + 60*60*24*50);
                setcookie('password', $request->password, time() + 60*60*24*50);
            }else {
                setcookie('email', $request->email, time() - 30);
                setcookie('password', $request->password, time() - 30);
            }
            $role = Role::find($member_user->role_id);
            session()->put('member_id', $member_user->member_id);
            session()->put('name', $member_user->name);
            session()->put('email', $member_user->email);
            session()->put('role_name', $role->role_name);
            session()->put('role_id', $member_user->role_id);
            session()->put('user_code', $member_user->user_code);
            session()->put('email_verified', $member_user->email_verified);
            session()->put('expire_date', $member_user->expire_date);
            session()->put('status', $member_user->status);
            if ($member_user->is_client == 1) {
                // session()->forget('is_worker');
                session()->put('is_client', 1);
            }

            if ($member_user->is_worker == 1) {
                // session()->forget('is_client');
                session()->put('is_worker', 1);
            }

            if ($member_user->expire_date < strval(now())) {

                $member_user->is_worker = 0;

                session()->put('is_worker', 0);

                $member_user->update();

            }

            return redirect(route('client_panel.dashboard'));
            // return redirect(route('worker_panel.dashboard'));

        }else{

            return redirect(route('member_panel.signin'))->with('error', 'Incorrect Email or Password..!');

        }
    }


    // public function member_profile(){
    //     $member_profile = Member_user::find(session()->get('member_id'));

    //     return view('member_view.member_profile', compact('member_profile'));

    // }

    public function member_package_requests(){

        // $member_package_requests = Member_user::where('approver_id', null)->where('package_id', null)->where('status', 0)->get();
        $member_package_requests = Buy_package::with('member', 'package')->where('approver_id', null)->where('package_id', '!=', null)->where('member_id', '!=', null)->where('status', 0)->get();

        return view('admin_views.common.member_package_requests', compact('member_package_requests'));

    }


    public function buy_package_member($member_id){

        $buy_package_member = Buy_package::with('member', 'package')->where('member_id', $member_id)->first();


        if (!empty($buy_package_member)) {

            return view('admin_views.common.buy_package_member', compact('buy_package_member'));

        }else{

            return redirect()->back()->with('error', 'No Package bought..!');

        }

    }

    public function update_deposit_info(Request $request){

        $update_deposit_info = Deposit_balance::with('member')->find($request->deposit_id);

        $update_member = Member_user::with('role', 'package')->find($update_deposit_info->member_id);

        if (($update_deposit_info->approver_id != null)) {

            return redirect()->back()->with('error', 'Request expired..!');

        }

        $check_submission =Deposit_balance::where('admin_payment_id', $request->admin_payment_id)->where('member_id', $update_deposit_info->member_id)->first();

        // Check if this payment has already been processed
        if (!empty($check_submission)) {

            // return response()->json(['error' => 'Payment already processed..!'], 400);

            return redirect()->back()->with('error', 'Payment already processed..!');

        }

        $update_deposit_info->admin_payment_id = $request->admin_payment_id;

        if ($request->status == 1) {

            $admin = Admin_user::find(2);

            $update_deposit_info->status = $request->status;

            $update_member->deposit_balance = round(intval($update_member->deposit_balance) + intval($request->deposit_balance));

            $admin->balance = round(intval($admin->balance) + intval($request->deposit_balance));

            $passbook = new Passbook();

            $passbook->sender_name = 'Deposit';

            $passbook->receiver_name = 'Do Micro Work';

            $passbook->receiver_admin_id = $admin->admin_id;

            // $passbook->sender_member_id = $update_member->member_id;

            $passbook->amount = $update_deposit_info->deposit_balance;

            // $passbook->sender_user_code = $update_member->user_code;

            $passbook->receiver_user_code = $admin->user_code;

            $passbook->save();

            $admin->update();

            $passbook = new Passbook();

            $passbook->sender_name = 'Deposit';

            $passbook->receiver_name = $update_member->name;

            $passbook->sender_admin_id = session()->get('admin_id');

            $passbook->receiver_member_id = $update_member->member_id;

            $passbook->amount = $update_deposit_info->deposit_balance;

            $passbook->sender_user_code = session()->get('user_code');

            $passbook->receiver_user_code = $update_member->user_code;

            $passbook->save();

            $update_member->update();

        }

        $update_deposit_info->approver_id = session()->get('admin_id');

        $update_deposit_info->update();

        return redirect()->route('admin_panel.deposit_requests')->with('success', 'Deposit request checked..!');

    }

    public function buy_package_member_info(Request $request){

        // $buy_package_member_info = Buy_package::with('package', 'member')->where('member_id', $request->member_id)->first();

        $admin = Admin_user::find(2);

        $member_info = Member_user::with('parent')->find($request->member_id);

        $package = Package::find($request->package_id);

        $package_charge = floatval($package->price)*0.02;

        $package_price = round(intval($package->price) + $package_charge + 1);

        // if ($buy_package_member_info->approver_id == null) {

        //     $buy_package_member_info->approver_id = session()->get('admin_id');

        // }

        // echo $member_info->deposit_balance;
        // exit;

        if ($member_info->deposit_balance <= $package_price) {

            if ($member_info->balance <= $package_price) {

                return redirect()->back()->with('error', 'Not enough balance, please deposit first..!');

            }

        }

        if ($member_info->deposit_balance >= $package_price) {

            $member_info->deposit_balance = intval($member_info->deposit_balance) - intval($package_price);

            $member_info->expire_date = now()->addDays(intval($package->validity));

            $member_info->status = 1;

            $member_info->is_worker = 1;

            $passbook = new Passbook();

            $passbook->sender_name = $member_info->name;

            $passbook->receiver_name = 'Admin';

            $passbook->sender_member_id = $member_info->member_id;

            $passbook->receiver_admin_id = $admin->admin_id;

            $passbook->sender_user_code = $member_info->user_code;

            $passbook->receiver_user_code = $admin->user_code;

            $passbook->amount = $package_price;

            $passbook->save();



        }else {

            $member_info->balance = intval($member_info->balance) - intval($package_price);

            $member_info->expire_date = now()->addDays(intval($package->validity));

            $member_info->status = 1;

            $member_info->is_worker = 1;

            $passbook = new Passbook();

            $passbook->sender_name = $member_info->name;

            $passbook->receiver_name = 'Admin';

            $passbook->sender_member_id = $member_info->member_id;

            $passbook->receiver_admin_id = $admin->admin_id;

            $passbook->sender_user_code = $member_info->user_code;

            $passbook->receiver_user_code = $admin->user_code;

            $passbook->amount = $package_price;

            $passbook->save();


        }

            $member_info->package_id = $request->package_id;

            // $member_info->package_id = $request->package_id;

            $first_level_commission = round(floatval($package->price/100)*10);
            $second_level_commission = round(floatval($package->price/100)*4);
            $third_level_commission = round(floatval($package->price/100)*2);
            $fourth_level_commission = round(floatval($package->price/100)*1);
            $fifth_level_commission = round(floatval($package->price/100)*0.5);

            if (!empty($member_info->parent->member_id)) {

                $first_level_refer_member = Member_user::find($member_info->parent->member_id);

                $passbook = new Passbook();

                $passbook->sender_name = 'Admin';

                $passbook->receiver_name = $first_level_refer_member->name;

                $passbook->receiver_member_id = $first_level_refer_member->member_id;

                $passbook->sender_user_code = $member_info->user_code;

                $passbook->sender_member_id = $member_info->member_id;

                $first_level_refer_member->balance = intval(round($first_level_refer_member->balance + $first_level_commission));

                $passbook->amount = $first_level_commission;

                $passbook->receiver_user_code = $first_level_refer_member->user_code;

                if ($first_level_refer_member->is_worker == 1) {

                    $passbook->save();

                    $first_level_refer_member->update();

                }



                if (!empty($first_level_refer_member->parent->member_id)) {

                    $second_level_refer_member = Member_user::find($first_level_refer_member->parent->member_id);

                    $passbook = new Passbook();

                    $passbook->sender_name = 'Admin';

                    $passbook->receiver_name = $second_level_refer_member->name;

                    $passbook->receiver_member_id = $second_level_refer_member->member_id;

                    $passbook->sender_user_code = $member_info->user_code;
    
                    $passbook->sender_member_id = $member_info->member_id;

                    $second_level_refer_member->balance = intval(round($second_level_refer_member->balance + $second_level_commission));

                    $passbook->amount = $second_level_commission;

                    $passbook->receiver_user_code = $second_level_refer_member->user_code;

                    if ($second_level_refer_member->is_worker == 1) {

                        $passbook->save();

                        $second_level_refer_member->update();

                    }



                    if (!empty($second_level_refer_member->parent->member_id)) {

                        $third_level_refer_member = Member_user::find($second_level_refer_member->parent->member_id);

                        $passbook = new Passbook();

                        $passbook->sender_name = 'Admin';

                        $passbook->receiver_name = $third_level_refer_member->name;

                        $passbook->receiver_member_id = $third_level_refer_member->member_id;

                        $passbook->sender_user_code = $member_info->user_code;
        
                        $passbook->sender_member_id = $member_info->member_id;

                        $third_level_refer_member->balance = intval(round($third_level_refer_member->balance + $third_level_commission));

                        $passbook->amount = $third_level_commission;

                        $passbook->receiver_user_code = $third_level_refer_member->user_code;

                        if ($third_level_refer_member->is_worker == 1) {

                            $passbook->save();

                            $third_level_refer_member->update();
                        }


                        if (!empty($third_level_refer_member->parent->member_id)) {

                            $fourth_level_refer_member = Member_user::find($third_level_refer_member->parent->member_id);

                            $passbook = new Passbook();

                            $passbook->sender_name = 'Admin';

                            $passbook->receiver_name = $fourth_level_refer_member->name;

                            $passbook->receiver_member_id = $fourth_level_refer_member->member_id;

                            $passbook->sender_user_code = $member_info->user_code;
            
                            $passbook->sender_member_id = $member_info->member_id;

                            $fourth_level_refer_member->balance = intval(round($fourth_level_refer_member->balance + $fourth_level_commission));

                            $passbook->amount = $fourth_level_commission;

                            $passbook->receiver_user_code = $fourth_level_refer_member->user_code;


                            if ($fourth_level_refer_member->is_worker == 1) {

                                $passbook->save();

                                $fourth_level_refer_member->update();

                            }



                            if (!empty($fourth_level_refer_member->parent->member_id)) {

                                $fifth_level_refer_member = Member_user::find($fourth_level_refer_member->parent->member_id);

                                $passbook = new Passbook();

                                $passbook->sender_name = 'Admin';

                                $passbook->receiver_name = $fifth_level_refer_member->name;

                                $passbook->receiver_member_id = $fifth_level_refer_member->member_id;

                                $passbook->sender_user_code = $member_info->user_code;
                
                                $passbook->sender_member_id = $member_info->member_id;

                                $fifth_level_refer_member->balance = intval(round($fifth_level_refer_member->balance + $fifth_level_commission));

                                $passbook->amount = $fifth_level_commission;

                                $passbook->receiver_user_code = $fifth_level_refer_member->user_code;

                                if ($fifth_level_refer_member->is_worker == 1) {

                                    $passbook->save();

                                    $fifth_level_refer_member->update();
                                }




                            }


                        }


                    }



                }



            }




        $member_info->approver_id = session()->get('admin_id');

        // $buy_package_member_info->status = $request->status;

        $member_info->package_id = $package->package_id;

        // $buy_package_member_info->update();

        $member_info->update();

        return redirect()->route('client_panel.dashboard')->with('success', 'Package Activated..!');

    }

    public function update_member($member_id){

        $update_member = Member_user::with('role', 'package', 'parent')->find($member_id);

        return view('admin_views.common.update_member', compact('update_member'));

    }


    public function update_member_info(Request $request){

        $update_member_info = Member_user::find($request->member_id);

        if ($update_member_info->approver_id == null) {

            $update_member_info->approver_id = session()->get('admin_id');

        }

        $update_member_info->status = $request->status;

        $update_member_info->update();

        return redirect()->back()->with('success', 'User Updated..!');

    }

    public function contact_us(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required',
        ]);

        $subject = "A person want to contact with you.";
        $body =
        '
        Name : '.$request->name.'<br>
        Email : '.$request->email.'<br>
        Phone : '.$request->phone.'<br>
        Subject : '.$request->subject.'<br>
        Message : '.$request->message;
        Mail::to('domicrowork@gmail.com')->send(new SendMail($subject, $body));

        return redirect()->back()->with('success', 'Message Sent..!');

    }


    public function histories(){

        $histories = Passbook::where('receiver_user_code', session()->get('user_code'))->where('receiver_user_code', session()->get('user_code'))->orWhere('sender_user_code', session()->get('user_code'))->get();

        return view('member_views.common.histories', compact('histories'));

    }

    public function deposit(){

        return view('member_views.common.deposit');


    }


    public function package_deposit($package_id){

        $package = Package::find($package_id);

        $package_charge = intval($package->price)*0.02;

        $package_price = round(intval($package->price) + $package_charge + 4);

        return view('member_views.common.deposit', compact('package_price'));


    }


    public function refers(){

        $refers = Member_user::where('parent_user_code', session()->get('user_code'))->get();

        return view('member_views.common.refers', compact('refers'));

    }

    public function withdraws(){

        $withdraws = Withdraw::where('user_code', session()->get('user_code'))->where('member_id', session()->get('member_id'))->get();

        $payment_methods = Payment_method::where('user_code', session()->get('user_code'))->where('member_id', session()->get('member_id'))->get();

        return view('member_views.common.withdraws', compact('withdraws', 'payment_methods'));

    }


    public function provident_fund(){

        // $withdraws = Withdraw::where('user_code', session()->get('user_code'))->where('member_id', session()->get('member_id'))->get();

        // $payment_methods = Payment_method::where('user_code', session()->get('user_code'))->where('member_id', session()->get('member_id'))->get();

        return view('member_views.common.provident_fund');

    }





















}


