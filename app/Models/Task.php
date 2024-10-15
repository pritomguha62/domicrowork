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
        'work_link',
        'category_id',
        'sub_category_id',
        'client_id',
        'admin_id',
        'ss_thumbnail',
        'required_proof',
        'ss_number',
        'task_price_rate',
        'work_amount',
        'price',
        'status',
        'expire_date',
    ];

    public function worker(){

        return $this->belongsToMany(Member_user::class, 'task_assignments', 'task_id', 'worker_id');

    }

    public function client(){

        return $this->belongsTo(Member_user::class, 'client_id', 'member_id');

    }

    public function admin(){

        return $this->belongsTo(Admin_user::class, 'admin_id', 'admin_id');

    }

    public function category(){

        return $this->belongsTo(Category::class, 'category_id', 'category_id');

    }

    public function sub_category(){

        return $this->belongsTo(Sub_category::class, 'sub_category_id', 'sub_category_id');

    }



}


