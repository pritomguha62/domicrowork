<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit_balance extends Model
{
    use HasFactory;

    protected $table = 'deposit_balances';

    protected $primaryKey = 'deposit_id';

    protected $fillable = [
        'paid_from',
        'trxid',
        'deposit_balance',
        'user_code',
        'admin_payment_id',
        'member_payment_id',
        'member_id',
        'package_id',
        'approver_id',
        'comment',
    ];

    public function approver(){

        return $this->belongsTo(Admin_user::class, 'approver_id', 'admin_id');

    }

    public function member(){

        return $this->belongsTo(Member_user::class, 'member_id', 'member_id');

    }

}

