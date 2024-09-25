<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_assignments extends Model
{
    use HasFactory;

    protected $table = 'task_assignments';

    protected $primaryKey = 'task_id';


    public function admin(){

        return $this->belongsToMany(Admin_user::class, 'admin_users', 'admin_id', 'admin_id');

    }

    public function client(){

        return $this->belongsToMany(Member_user::class, 'member_users', 'worker_id', 'member_id');

    }




}
