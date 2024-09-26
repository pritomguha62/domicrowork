<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_assignments extends Model
{
    use HasFactory;

    protected $table = 'task_assignments';

    protected $primaryKey = 'task_id';

    protected $fillable = [
        'task_id',
        'worker_id',
        'worker_file',
        'code',
        'status',
    ];


    // public function admin(){

    //     return $this->belongsToMany(Admin_user::class, 'admin_users', 'admin_id', 'admin_id');

    // }



}

