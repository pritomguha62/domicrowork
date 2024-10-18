<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientUserController;
use App\Http\Controllers\DepositBalanceController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\MemberUserController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WithdrawController;
use Illuminate\Support\Facades\Route;



// puglic panel routes

Route::get('/', [MemberUserController::class, 'home']
)->name('home');

// posts


Route::get('/posts', [TaskController::class, 'worker_click_task']
)->name('posts');

Route::post('/contact_us', [MemberUserController::class, 'contact_us']
)->name('contact_us');


// common panel routes

Route::get('/logout', [LogOutController::class, 'logout']
)->name('logout');


// admin panel routes

// sign in

Route::get('admin_panel/signin', [AdminUserController::class, 'signin']
)->name('admin_panel.signin')->middleware('logged_in_admin');

Route::post('/admin_signin_info', [AdminUserController::class, 'admin_signin_info']
)->name('admin_signin_info');

// sign up

Route::get('admin_panel/signup', [AdminUserController::class, 'signup']
)->name('admin_panel.signup');

Route::post('/admin_register_info', [AdminUserController::class, 'admin_register_info']
)->name('admin_register_info');

Route::get('/admin_user_token_verify', [AdminUserController::class, 'admin_user_token_verify']
)->name('admin_user.token_verify')->middleware('email_verified');

Route::post('/admin_user_token_verification', [AdminUserController::class, 'admin_user_token_verification']
)->name('admin_user.token_verification');

Route::get('/admin_deactive', [AdminUserController::class, 'admin_deactive']
)->name('admin_deactive');

// forgot password

Route::get('/admin_forgot_password', [AdminUserController::class, 'admin_forgot_password']
)->name('admin_forgot_password');

Route::post('/admin_otp_verification', [AdminUserController::class, 'admin_otp_verification']
)->name('admin_otp_verification');

Route::post('/admin_otp_verification_submit', [AdminUserController::class, 'admin_otp_verification_submit']
)->name('admin_otp_verification_submit');

Route::post('/admin_reset_password_submit', [AdminUserController::class, 'admin_reset_password_submit']
)->name('admin_reset_password_submit');





Route::prefix('/admin_panel')->middleware('admin_panel')->group(function(){

    Route::get('/dashboard', [AdminUserController::class, 'dashboard']
    )->name('admin_panel.dashboard')->middleware('email_verify');

    Route::get('/', function () {
        return redirect()->route('admin_panel.dashboard');
    });

    // admin panel users

    Route::get('/admin_users', [AdminUserController::class, 'admin_users']
    )->name('admin_panel.admin_users')->middleware('admin');

    Route::get('/admin_user_requests', [AdminUserController::class, 'admin_user_requests']
    )->name('admin_panel.admin_user_requests')->middleware('admin');

    Route::get('/update_admin/{admin_id?}', [AdminUserController::class, 'update_admin']
    )->name('admin_panel.update_admin')->middleware('admin');

    Route::post('/update_admin_info', [AdminUserController::class, 'update_admin_info']
    )->name('admin_panel.update_admin_info')->middleware('admin');



    // deposit

    Route::get('/deposit_requests', [DepositBalanceController::class, 'deposit_requests']
    )->name('admin_panel.deposit_requests')->middleware('admin');

    Route::get('/update_deposit/{deposit_id}', [DepositBalanceController::class, 'update_deposit']
    )->name('admin_panel.update_deposit')->middleware('admin');


    Route::post('/update_deposit_info', [MemberUserController::class, 'update_deposit_info']
    )->name('admin_panel.update_deposit_info')->middleware('admin');



    // category


    Route::get('/add_category', [CategoryController::class, 'add_category']
    )->name('admin_panel.add_category');

    Route::post('/add_category_info', [CategoryController::class, 'add_category_info']
    )->name('admin_panel.add_category_info');

    Route::get('/categories', [CategoryController::class, 'categories']
    )->name('admin_panel.categories');

    Route::get('/update_category/{category_id?}', [CategoryController::class, 'update_category']
    )->name('admin_panel.update_category');

    Route::post('/update_category_info', [CategoryController::class, 'update_category_info']
    )->name('admin_panel.update_category_info');

    // sub category


    Route::get('/add_sub_category', [SubCategoryController::class, 'add_sub_category']
    )->name('admin_panel.add_sub_category');

    Route::post('/add_sub_category_info', [SubCategoryController::class, 'add_sub_category_info']
    )->name('admin_panel.add_sub_category_info');

    Route::get('/sub_categories', [SubCategoryController::class, 'sub_categories']
    )->name('admin_panel.sub_categories');

    Route::get('/update_sub_category/{sub_category_id?}', [SubCategoryController::class, 'update_sub_category']
    )->name('admin_panel.update_sub_category');

    Route::post('/update_sub_category_info', [SubCategoryController::class, 'update_sub_category_info']
    )->name('admin_panel.update_sub_category_info');


    // package


    Route::get('/add_package', [PackageController::class, 'add_package']
    )->name('admin_panel.add_package');

    Route::post('/add_package_info', [PackageController::class, 'add_package_info']
    )->name('admin_panel.add_package_info');

    Route::get('/packages', [PackageController::class, 'packages']
    )->name('admin_panel.packages');

    Route::get('/update_package/{package_id?}', [PackageController::class, 'update_package']
    )->name('admin_panel.update_package');

    Route::post('/update_package_info', [PackageController::class, 'update_package_info']
    )->name('admin_panel.update_package_info');



    // member package



    Route::get('/member_package_requests', [MemberUserController::class, 'member_package_requests']
    )->name('admin_panel.member_package_requests')->middleware('admin');

    Route::get('/update_member/{member_id?}', [MemberUserController::class, 'update_member']
    )->name('admin_panel.update_member')->middleware('admin');

    Route::get('/buy_package_member/{member_id?}', [MemberUserController::class, 'buy_package_member']
    )->name('admin_panel.buy_package_member')->middleware('admin');

    Route::post('/buy_package_member_info', [MemberUserController::class, 'buy_package_member_info']
    )->name('admin_panel.buy_package_member_info')->middleware('admin');

    Route::post('/update_member_info', [MemberUserController::class, 'update_member_info']
    )->name('admin_panel.update_member_info')->middleware('admin');



    // task


    Route::get('/add_social_task', [TaskController::class, 'admin_add_social_task']
    )->name('admin_panel.add_social_task');

    Route::get('/add_click_task', [TaskController::class, 'admin_add_click_task']
    )->name('admin_panel.add_click_task');

    Route::get('/social_tasks', [TaskController::class, 'admin_social_tasks']
    )->name('admin_panel.social_tasks');

    Route::get('/click_tasks', [TaskController::class, 'admin_click_tasks']
    )->name('admin_panel.click_tasks');

    Route::get('/task_requests', [TaskController::class, 'task_requests']
    )->name('admin_panel.task_requests');

    Route::get('/get-subcategories/{category_id?}', [CategoryController::class, 'getSubcategories'])->name('get.subcategories');


    Route::post('/add_social_task_info', [TaskController::class, 'admin_add_social_task_info']
    )->name('admin_panel.add_social_task_info');

    Route::post('/add_click_task_info', [TaskController::class, 'admin_add_click_task_info']
    )->name('admin_panel.add_click_task_info');

    Route::post('/update_social_task_info', [TaskController::class, 'admin_update_social_task_info']
    )->name('admin_panel.update_social_task_info');

    Route::get('/update_social_task/{task_id?}', [TaskController::class, 'admin_update_social_task']
    )->name('admin_panel.update_social_task');

    Route::post('/update_click_task_info', [TaskController::class, 'update_click_task_info']
    )->name('admin_panel.update_click_task_info');

    Route::get('/update_click_task/{task_id?}', [TaskController::class, 'admin_update_click_task']
    )->name('admin_panel.update_click_task');

    Route::get('/activate_task/{task_id?}', [TaskController::class, 'activate_task']
    )->name('admin_panel.activate_task');
    
    Route::get('/confirm_tasks', [TaskController::class, 'admin_confirm_tasks']
    )->name('admin_panel.confirm_tasks');

    Route::get('/accept_task/{task_worker_id?}', [TaskController::class, 'accept_task']
    )->name('admin_panel.accept_task');

    Route::get('/reject_task/{task_worker_id?}', [TaskController::class, 'reject_task']
    )->name('admin_panel.reject_task');




    // passbook


    Route::get('/total_passbooks', [AdminUserController::class, 'total_passbooks']
    )->name('admin_panel.total_passbooks')->middleware('admin');


    // notice


    Route::get('/create_notice', [NoticeController::class, 'create_notice']
    )->name('admin_panel.create_notice');

    Route::post('/create_notice_info', [NoticeController::class, 'create_notice_info']
    )->name('admin_panel.create_notice_info');


    // withdraw


    Route::get('/withdraw_approvals', [WithdrawController::class, 'withdraw_approvals']
    )->name('admin_panel.withdraw_approvals');

    Route::get('/update_withdraw_approval/{withdraw_id?}', [WithdrawController::class, 'update_withdraw_approval']
    )->name('admin_panel.update_withdraw_approval');

    Route::post('/withdraw_approval_info', [WithdrawController::class, 'withdraw_approval_info']
    )->name('admin_panel.withdraw_approval_info');




});



// member panel routes


Route::prefix('/member_panel')->group(function(){

    // log in

    Route::get('/signin', [MemberUserController::class, 'member_signin']
    )->name('member_panel.signin')->middleware('logged_in_member');

    Route::post('/check_login', [MemberUserController::class, 'check_login']
    )->name('check_login');

    // register

    Route::get('/signup', [MemberUserController::class, 'member_signup']
    )->name('member_panel.signup');

    Route::post('/member_register_info', [MemberUserController::class, 'member_register_info']
    )->name('member_register_info');

    Route::get('/token_verify', [MemberUserController::class, 'member_token_verify']
    )->name('member.token_verify')->middleware('email_verified');

    Route::post('/token_verication', [MemberUserController::class, 'member_token_verification']
    )->name('member.token_verification');

    Route::get('/member_deactive', [MemberUserController::class, 'member_deactive']
    )->name('member_deactive')->middleware('status_check');

    Route::get('/member_forgot_password', [MemberUserController::class, 'member_forgot_password']
    )->name('member_forgot_password');

    Route::post('/member_otp_verification', [MemberUserController::class, 'member_otp_verification']
    )->name('member_otp_verification');

    Route::post('/member_otp_verification_submit', [MemberUserController::class, 'member_otp_verification_submit']
    )->name('member_otp_verification_submit');

    Route::post('/member_reset_password', [MemberUserController::class, 'member_reset_password']
    )->name('member_reset_password');

    Route::post('/member_reset_password_submit', [MemberUserController::class, 'member_reset_password_submit']
    )->name('member_reset_password_submit');

    // package

    Route::get('/member_packages', [PackageController::class, 'member_packages']
    )->name('member_panel.member_packages');

    Route::get('/activate_package/{package_id?}', [PackageController::class, 'activate_package']
    )->name('member_panel.activate_package');

    Route::post('/activate_package_info', [PackageController::class, 'activate_package_info']
    )->name('member_panel.activate_package_info');

    Route::post('/buy_package_member_info', [MemberUserController::class, 'buy_package_member_info']
    )->name('member_panel.buy_package_member_info');


    // payment method

    Route::post('/add_member_payment_method', [PaymentMethodController::class, 'add_member_payment_method']
    )->name('member_panel.add_member_payment_method');



});



// worker panel routes



Route::prefix('/worker_panel')->middleware('worker')->group(function(){

    // Route::get('/dashboard', [MemberUserController::class, 'worker_dashboard']
    // )->name('worker_panel.dashboard')->middleware('email_verify');

    // Route::get('/', function () {
    //     return redirect()->route('worker_panel.dashboard');
    // });


    // worker task

    Route::get('/worker_social_tasks', [TaskController::class, 'worker_social_tasks']
    )->name('worker_panel.worker_social_tasks')->middleware('worker');

    Route::post('/worker_click_task_info', [TaskController::class, 'worker_click_task_info']
    )->name('worker_panel.worker_click_task_info')->middleware('worker');

    Route::get('/apply_social_task/{task_id?}', [TaskController::class, 'apply_social_task']
    )->name('worker_panel.apply_social_task')->middleware('worker');

    Route::get('/submit_social_task/{task_id?}', [TaskController::class, 'submit_social_task']
    )->name('worker_panel.submit_social_task')->middleware('worker');

    Route::post('/submit_social_task_info', [TaskController::class, 'submit_social_task_info']
    )->name('worker_panel.submit_social_task_info')->middleware('worker');



});




// client panel routes




Route::prefix('/client_panel')->middleware('client')->group(function(){

    Route::get('/dashboard', [MemberUserController::class, 'client_dashboard']
    )->name('client_panel.dashboard')->middleware('email_verify');

    Route::get('/', function () {
        return redirect()->route('client_panel.dashboard');

    });


    // profile


    Route::get('/profile', [MemberUserController::class, 'profile']
    )->name('member_panel.profile');

    Route::post('/update_profile', [MemberUserController::class, 'update_profile']
    )->name('member_panel.update_profile');


    // diposit


    Route::get('/deposit', [MemberUserController::class, 'deposit']
    )->name('member_panel.deposit');

    Route::get('/package_deposit/{package_id?}', [MemberUserController::class, 'package_deposit']
    )->name('member_panel.package_deposit');

    Route::post('/deposit_balance_info', [DepositBalanceController::class, 'deposit_balance_info']
    )->name('member_panel.deposit_balance_info');


    // client task


    Route::get('/add_client_social_task', [TaskController::class, 'add_client_social_task']
    )->name('client_panel.add_client_social_task');


    Route::post('/add_client_social_task_info', [TaskController::class, 'add_client_social_task_info']
    )->name('client_panel.add_client_social_task_info');


    Route::get('/get-subcategories/{category_id?}', [CategoryController::class, 'getSubcategories'])->name('client_panel.get.subcategories');

    Route::get('/get-subcategorie_info/{subcategory_id?}', [CategoryController::class, 'getSubcategorieinfo'])->name('client_panel.get.subcategorieinfo');



    // history


    Route::get('/histories', [MemberUserController::class, 'histories']
    )->name('client_panel.histories');


    // refers


    Route::get('/refers', [MemberUserController::class, 'refers']
    )->name('client_panel.refers');



    // withdraws



    Route::get('/withdraws', [MemberUserController::class, 'withdraws']
    )->name('client_panel.withdraws');

    Route::post('/withdraw_request_member', [WithdrawController::class, 'withdraw_request_member']
    )->name('client_panel.withdraw_request_member');


    // withdraws



    Route::get('/provident_fund', [MemberUserController::class, 'provident_fund']
    )->name('client_panel.provident_fund');



});













