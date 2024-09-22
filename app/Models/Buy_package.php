<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buy_package extends Model
{
    use HasFactory;

    protected $table = 'buy_packages';

    protected $primaryKey = 'buy_package_id';

    protected $fillable = [
        'paid_from',
        'trxid',
        'user_code',
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

    public function package(){

        return $this->belongsTo(Package::class, 'package_id', 'package_id');

    }



}


