<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $primaryKey = 'package_id';

    protected $fillable = [
        'title',
        'validity',
        'price',
        'limit',
        'task_amount',
        'file',
        'total_sold',
        'refer_commission_one',
        'refer_commission_two',
        'refer_commission_three',
        'refer_commission_four',
        'refer_commission_five',
        'status',
    ];









}



