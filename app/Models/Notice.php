<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $table = 'notices';

    protected $primaryKey = 'notice_id ';

    protected $fillable =[
        'title',
        'description',
        'admin_id',
        'admin_user_code',
        'status',
    ];


}


