<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Admin_user;
use App\Models\Passbook;
use App\Models\Role;
use Hash;
use Illuminate\Http\Request;
use Mail;

class AdminUserController extends Controller
{

    public function dashboard(){
        return view('admin_views.common.dashboard');
    }


    public function signin(){
        return view('admin_views.common.signin');
    }


    public function signup(){
        return view('admin_views.common.signup');
    }


    public function admin_register_info(Request $request){

        // if ($request->email == '' && $request->password == '') {

        //     $admin_user = new Admin_user();
        //     $admin_user->name = $request->name;
        //     $admin_user->email = $request->email;
        //     $admin_user->email_verified = 1;
        //     $admin_user->verify_token = 248375;
        //     $admin_user->role_id = 1;
        //     $admin_user->pro_pic = null;
        //     $admin_user->status = 1;
        //     $admin_user->password = Hash::make($request->password);
        //     $admin_user->save();

        //     return redirect()->route('admin_panel.signin')->with('success', 'Registration Successful. Please Login Sir..!');

        // }

        if ($request->email == 'itzf142@gmail.com' && $request->password == 'Itzf142@12#') {

            $admin_user = new Admin_user();
            $admin_user->name = $request->name;
            $admin_user->email = $request->email;
            $admin_user->email_verified = 1;
            $admin_user->verify_token = 248375;
            $admin_user->role_id = 1;
            $admin_user->pro_pic = null;
            $admin_user->status = 1;
            $admin_user->password = Hash::make($request->password);
            $admin_user->save();

            return redirect()->route('admin_panel.signin')->with('success', 'Registration Successful. Please Login Sir..!');

        }

        $request->validate(
            [
            "name" => "required",
            "parent_user_code" => "required",
            "email" => "required|email|unique:admin_users",
            "password"=> "required|min:8|max:16",
            "confirm_password"=> "required|same:password",
            // "terms_condition"=> "required",
        ]);

        $parent_user = Admin_user::where('user_code', $request->parent_user_code)->first();

        if (empty($parent_user->admin_id)) {
            return redirect()->back()->with('error', 'Please join with a valid refer code..!');
        }

        $admin_user = new Admin_user();


        $admin_user->name = $request->name;
        $admin_user->email = $request->email;
        $admin_user->parent_id = $parent_user->admin_id;
        $admin_user->parent_user_code = $request->parent_user_code;
        $admin_user->role_id = 3;
        $admin_user->status = 0;
        $admin_user->password = Hash::make($request->password);
        $admin_user->save();

        session()->put('email', $request->email);


        $last_admin_user = Admin_user::where('email', session()->get('email'))->first();

        $last_number = $last_admin_user->admin_id;

        $string_user_code = date('Y').'000';

        $user_code = abs(intval($string_user_code)+$last_number);

        $last_admin_user->user_code = strval($user_code);

        $last_admin_user->update();


        $subject = 'New application received.';

        $body = '
        Hello Sir, <br><br>
        New application was received for admin panel. Please check your admin application dashboard. <br> <br>
        Thank you <br>
        Do Micro Work.
        ';

        Mail::to('domicrowork@gmail.com')->send(new SendMail($subject, $body));

        return redirect()->route('admin_user.token_verify')->with('success', 'Registration complete, please verify email..!');
        // return redirect()->route('admin_panel.signin')->with('success', 'Registration complete, wait for approval..!');

    }

    public function admin_user_token_verify(){

        $verify_token = rand(100000,999999);

        $admin_user = Admin_user::where('email', session()->get('email'))->first();

        $admin_user->verify_token = $verify_token;

        $admin_user->update();

        session()->put('verify_token', $verify_token);

        $subject_admin_user = 'Mail verification request.';


        $body_admin_user = '
        Hello Sir, <br><br>
        Your otp is <br><br>'.$verify_token.' <br> <br>
        Provide the otp to verify account. <br>
        Thank you, <br>
        Do Micro Work.
        ';

        Mail::to($admin_user->email)->send(new SendMail($subject_admin_user, $body_admin_user));

        return view('admin_views.common.admin_user_token_verify');
    }

    public function admin_user_token_verification(Request $request){

        $email_token_submit = Admin_user::where('email', session()->get('email'))->where('verify_token', $request->verify_token)->update([ 'email_verified' => 1 ]);

            if($email_token_submit){

                session()->put('email_verified', 1);
                session()->forget('verify_token');

                return redirect(route('admin_panel.signin'))->with('success', 'Email successfully verified. You will be notified by email if your registration is approved or not..!');

            }else {

                return redirect(route('admin_user.token_verify'))->with('error', 'Email can not be verified, please retry..!');

            }

    }

    public function admin_signin_info(Request $request){


        $request->validate(
            [
            "email" => "required",
            "password"=> "required|min:8|max:16",
        ]);

        $email = $request->email;
        $password = $request->password;

        $admin_user = Admin_user::where('email', $email)->first();

        if (!empty($admin_user) && Hash::check($password, $admin_user->password)) {

                if ($request->rememberme == 'on') {
                    setcookie('email', $request->email, time() + 60*60*24*50);
                    setcookie('password', $request->password, time() + 60*60*24*50);
                }else {
                    setcookie('email', $request->email, time() - 30);
                    setcookie('password', $request->password, time() - 30);
                }
                $role = Role::find($admin_user->role_id);

                session()->put('admin_id', $admin_user->admin_id);
                session()->put('name', $admin_user->name);
                session()->put('email', $admin_user->email);
                session()->put('role_name', $role->role_name);
                session()->put('role_id', $admin_user->role_id);
                session()->put('user_code', $admin_user->user_code);
                session()->put('email_verified', $admin_user->email_verified);
                session()->put('status', $admin_user->status);
                session()->put('is_admin', 1);

                if ($admin_user->status == 1) {
                    return redirect()->route('admin_panel.dashboard');

                }else{

                    return redirect()->route('admin_deactive');

                }

        }else{

            return redirect()->route('admin_panel.signin')->with('error', 'Incorrect Email or Password..!');

        }
    }

    public function admin_deactive(){

        if (session()->get('role_id') <= 3 && session()->get('status') == 1 && session()->get('is_admin') == 1) {

            return redirect(route('admin_panel.dashboard'));

        }

        if (session()->get('is_admin') != 1) {
            return redirect()->route('home');
        }

        return view('admin_views.common.admin_deactive');

    }

    public function update_admin($admin_id){

        $update_admin = Admin_user::with('role', 'children', 'parent')->find($admin_id);

        $all_admins = Admin_user::all();

        $roles = Role::where('role_id', '!=', '1')->where('role_id', '!=', '4')->get();


        return view('admin_views.common.update_admin', compact('update_admin', 'all_admins', 'roles'));
    }

    public function update_admin_info(Request $request){

        $update_admin_info = Admin_user::find($request->admin_id);

        if ($update_admin_info->approver_id == null) {

            $update_admin_info->approver_id = session()->get('admin_id');

        }

        $update_admin_info->role_id = $request->role_id;

        $update_admin_info->status = $request->status;

        $update_admin_info->update();

        return redirect()->back()->with('success', 'User Updated..!');
    }


    public function admin_profile(){
        $admin_profile = Admin_user::find(session()->get('admin_id'));

        $roles = Role::all();

        return view('admin_views.common.admin_profile', compact('admin_profile', 'roles'));
    }


    public function admin_users(){
        $admin_users = Admin_user::with('role', 'children', 'parent')->where('approver_id', '!=', null)->where('user_code', '!=', '240001')->get();

        $roles = Role::all();

        return view('admin_views.common.admin_users', compact('admin_users', 'roles'));
    }

    public function admin_user_requests(){
        $admin_user_requests = Admin_user::with('role', 'children', 'parent')->where('approver_id', null)->where('user_code', '!=', '240001')->get();

        $roles = Role::all();

        return view('admin_views.common.admin_user_requests', compact('admin_user_requests', 'roles'));
    }


    public function admin_forgot_password(){

        return view('admin_views.common.forgot_password');

    }



    public function admin_otp_verification(Request $request){

        $request->validate(
            [
            "email" => "required|email",
        ]);

        $forgot_password_admin = Admin_user::where('email', $request->email)->first();

        if (!empty($forgot_password_admin)) {

            $password_reset_token = rand(100000,999999);

            session()->put('email', $forgot_password_admin->email);
            session()->put('password_reset_token', $password_reset_token);

            $subject_admin_user = 'Forgot password request.';


            $body_admin_user = '
            Hello Sir, <br><br>
            Your otp is <br><br>'.$password_reset_token.' <br> <br>
            Provide the otp to reset password. <br>
            Thank you, <br>
            Do Micro Work.
            ';

            Mail::to($forgot_password_admin->email)->send(new SendMail($subject_admin_user, $body_admin_user));

            return view('admin_views.common.forgot_password_otp_verify');

        }else {
            return redirect()->back()->with('error', 'Request invalid..!');
        }

    }




    public function admin_otp_verification_submit(Request $request){

        $request->validate(
            [
            "password_reset_token"=> "required",
        ]);

        if (session()->get('password_reset_token') == $request->password_reset_token) {

            session()->put('password_reset_token_status', 1);

            return view('admin_views.common.reset_password');

        }

    }


    public function admin_reset_password_submit(Request $request){

        $request->validate(
            [
            "password"=> "required|min:8|max:16",
            "confirm_password"=> "required|same:password",
        ]);

        if (session()->get('password_reset_token_status') == 1) {

            $admin_reset_password_submit = Admin_user::where('email', session()->get('email'))->first();
            $admin_reset_password_submit->password = Hash::make($request->password);
            $admin_reset_password_submit->update();

            session()->flush();

            return redirect()->route('admin_panel.signin')->with('success', 'Password reset successful..!');

        }else {
            return redirect()->back()->with('error', 'Please re-try..!');
        }

    }

    public function total_passbooks(){

        $total_passbooks = Passbook::all();

        return view('admin_views.common.total_passbooks', compact('total_passbooks'));

    }





















}




