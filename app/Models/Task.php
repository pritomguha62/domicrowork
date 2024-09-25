<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $primaryKey = 'task_id';

    protected $fillable = [
        'title',
        'description',
        'client_link',
        'client_file',
        'worker_file',
        'code',
        'limit',
        'expire_date_time',
        'status',
    ];


}


