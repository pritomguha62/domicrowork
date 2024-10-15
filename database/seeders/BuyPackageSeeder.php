<?php

namespace Database\Seeders;

use App\Models\Buy_package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BuyPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        for ($i=0; $i < 50; $i++) {
            $buy_package = new Buy_package();

            $buy_package->paid_from = $faker->phoneNumber;
            $buy_package->trxid = $faker->numberBetween(100000, 999999);
            // $buy_package->user_code = 2400000002+$i;
            $buy_package->package_id = $faker->numberBetween(1, 3);
            $buy_package->member_id = $faker->numberBetween(1, 40);
            $buy_package->save();
        }

    }
}


