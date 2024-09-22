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

        $faker = Faker::create();

        for ($i=1; $i < 101; $i++) {
            $member = new Member_user();

            $string_user_code = date('Ymds').'0000';

            $member->name = $faker->name;
            $member->phone = $faker->phoneNumber;
            $member->email = $faker->email;
            $member->email_verified = 1;
            $member->verify_token = $faker->numberBetween(100000, 999999);
            $member->user_code = strval(abs(intval($string_user_code)+$i));
            // $member->parent_user_code = 240001;
            $member->package_id = $faker->numberBetween(1, 7);
            $member->role_id = 4;
            $member->password = $faker->password;
            $member->save();
        }

    }
}


