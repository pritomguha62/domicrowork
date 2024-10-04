<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_user extends Model
{
    use HasFactory;

    protected $table = 'admin_users';

    protected $primaryKey = 'admin_id';

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
        'withdraws',
        'parent_id',
        'user_code',
        'parent_user_code',
        'pro_pic',
        'role_id',
        'approver_id',
        'status',
        'password',
    ];


    static public function admin(){

        return self::find(session()->get('admin_id'));

    }


    public function parent(){

        return $this->belongsTo(Admin_user::class, 'parent_id', 'admin_id');

    }

    public function children(){

        return $this->hasMany(Admin_user::class, 'parent_id', 'admin_id');

    }

    public function role(){

        return $this->belongsTo(Role::class, 'role_id', 'role_id');

    }

    public function task(){

        return $this->belongsToMany(Task::class, 'member_users', 'worker_id', 'task_id');

    }


    public function admin_task(){

        return $this->belongsTo(Task::class, 'admin_id', 'admin_id');

    }






}


