<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $primaryKey = 'role_id';

    protected $fillable = [
        'role_title',
    ];

    public function admin_users(){
        return $this->hasMany(Admin_user::class);
    }
  
    public function member_users(){
        return $this->hasMany(Member_user::class);
    }





}


