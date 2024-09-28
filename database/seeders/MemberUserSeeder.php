<?php

namespace Database\Seeders;

use App\Models\Member_user;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MemberUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $string_user_code = date('Ymds').'0000';

        Member_user::create([
            'name' => 'Anonymous',
            'phone' => '',
            'email' => 'itzf142@gmail.com',
            'email_verified' => 1,
            'verify_token' => 657434,
            'user_code' => strval(abs(intval($string_user_code)+1)),
            'status' => 1,
            'role_id' => 4,
            'approver_id' => 1,
            'is_worker' => 1,
            'password' => Hash::make('Itzf142@12#'),
        ]);

        $developer = Member_user::find(1);

        Member_user::create([
            'name' => 'Nayan Chowdhury',
            'phone' => '',
            'email' => 'nayanchowdhury543@gmail.com',
            'email_verified' => 1,
            'verify_token' => 657467,
            'user_code' => strval(abs(intval($string_user_code)+2)),
            'parent_id' => 1,
            'parent_user_code' => $developer->user_code,
            'status' => 1,
            'role_id' => 4,
            'is_worker' => 1,
            'password' => Hash::make('Domicrowork@'),
        ]);

        Member_user::create([
            'name' => 'মোহাম্মদ বিন কাসিম',
            'phone' => '',
            'email' => 'srjana85@gmail.com',
            'email_verified' => 1,
            'verify_token' => 657467,
            'user_code' => strval(abs(intval($string_user_code)+3)),
            'parent_id' => 1,
            'parent_user_code' => $developer->user_code,
            'status' => 1,
            'role_id' => 4,
            'is_worker' => 1,
            'password' => Hash::make('12345678'),
        ]);

        Member_user::create([
            'name' => 'L',
            'phone' => '',
            'email' => 'lamiyachowdhuri3@Gmail.com',
            'email_verified' => 1,
            'verify_token' => 657826,
            'user_code' => strval(abs(intval($string_user_code)+4)),
            'parent_id' => 1,
            'parent_user_code' => $developer->user_code,
            'status' => 1,
            'role_id' => 4,
            'is_worker' => 1,
            'password' => Hash::make('Dada1122@'),
        ]);

        $faker = Faker::create();

        for ($i=4; $i < 101; $i++) {
            $member = new Member_user();

            $string_user_code = date('Ymds').'0000';

            $member->name = $faker->name;
            $member->phone = $faker->phoneNumber;
            $member->email = $faker->email;
            $member->email_verified = 1;
            $member->verify_token = $faker->numberBetween(100000, 999999);
            $member->user_code = strval(abs(intval($string_user_code)+$i));
            $member->parent_user_code = $developer->user_code;
            $member->package_id = $faker->numberBetween(1, 7);
            $member->role_id = 4;
            $member->password = $faker->password;
            $member->save();
        }

    }
}


