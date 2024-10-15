<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'title',
        'admin_id',
        'status',
    ];

    public function sub_categories()
    {
        return $this->hasMany(Sub_category::class, 'category_id', 'category_id');
    }

}


