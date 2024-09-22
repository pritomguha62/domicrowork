<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        for ($i=0; $i < 100; $i++) {
            $package = new Package();

            $package->title = $faker->name;
            $package->validity = 380;
            $package->price = $faker->numberBetween(1000, 9999);
            $package->limit = 20000;
            $package->status = 1;
            $package->save();
        }

    }
}

