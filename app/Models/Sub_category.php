<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';

    protected $primaryKey = 'sub_category_id';

    protected $fillable = [
        'title',
        'price',
        'admin_id',
        'category_id',
        'status',
    ];

}


