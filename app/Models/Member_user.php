<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_user extends Model
{
    use HasFactory;

    protected $table = 'member_users';

    protected $primaryKey = 'member_id';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'email_verified',
        'verify_token',
        'home_town',
        'city',
        'country',
        'balance',
        'deposit_balance',
        'withdraws',
        'user_code',
        'parent_user_code',
        'pro_pic',
        'nid_birth_status',
        'nid_birth',
        'birth_date',
        'task_charge',
        'parent_id',
        'package_id',
        'task_amount',
        'role_id',
        'approver_id',
        'daily_income', 
        'income_reset_date',
        'status',
        'comment',
        'password',
        'expire_date',
    ];


    static public function member(){

        return self::find(session()->get('member_id'));

    }


    public function approver(){

        return $this->belongsTo(Admin_user::class, 'approver_id', 'admin_id');

    }

    public function parent(){

        return $this->belongsTo(Member_user::class, 'parent_id', 'member_id');

    }

    public function role(){

        return $this->belongsTo(Role::class, 'role_id', 'role_id');

    }

    public function package(){

        return $this->belongsTo(Package::class, 'package_id', 'package_id');

    }

    public function task(){

        return $this->belongsToMany(Task::class, 'task_assignments', 'worker_id', 'task_id');

    }


    public function client_task(){

        return $this->belongsTo(Task::class, 'client_id', 'member_id');

    }






}


