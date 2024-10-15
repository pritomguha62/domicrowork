<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    protected $table = 'withdraws';

    protected $primaryKey = 'withdraw_id';

    protected $fillable = [
        'name',
        'member_id',
        'admin_id',
        'amount',
        'account_num',
        'payment_method',
        'user_code',
        'approver_id',
        'approver_user_code',
        'unique_id_status',
        'status',
    ];

}


