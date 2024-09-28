<?php

namespace Database\Seeders;

use App\Models\Admin_user;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Admin_user::create([
            'name' => 'Anonymous',
            'phone' => '',
            'email' => 'itzf142@gmail.com',
            'email_verified' => 1,
            'verify_token' => 657434,
            'user_code' => date('Ymds').'01',
            'status' => 1,
            'role_id' => 1,
            'approver_id' => 1,
            'is_admin' => 1,
            'password' => Hash::make('Itzf142@12#'),
        ]);

        $developer = Admin_user::find(1);

        Admin_user::create([
            'name' => 'Nayan Chowdhury',
            'phone' => '',
            'email' => 'nayanchowdhury543@gmail.com',
            'email_verified' => 1,
            'verify_token' => 657467,
            'user_code' => date('Ymds').'02',
            'parent_id' => 1,
            'parent_user_code' => $developer->user_code,
            'status' => 1,
            'role_id' => 2,
            'is_admin' => 1,
            'password' => Hash::make('Domicrowork@'),
        ]);

        Admin_user::create([
            'name' => 'মোহাম্মদ বিন কাসিম',
            'phone' => '',
            'email' => 'srjana85@gmail.com',
            'email_verified' => 1,
            'verify_token' => 657467,
            'user_code' => date('Ymds').'03',
            'parent_id' => 1,
            'parent_user_code' => $developer->user_code,
            'status' => 1,
            'role_id' => 3,
            'is_admin' => 1,
            'password' => Hash::make('12345678'),
        ]);

        Admin_user::create([
            'name' => 'L',
            'phone' => '',
            'email' => 'lamiyachowdhuri3@Gmail.com',
            'email_verified' => 1,
            'verify_token' => 657826,
            'user_code' => date('Ymds').'04',
            'parent_id' => 1,
            'parent_user_code' => $developer->user_code,
            'status' => 1,
            'role_id' => 3,
            'is_admin' => 1,
            'password' => Hash::make('Dada1122@'),
        ]);

    }
}


