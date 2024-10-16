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

        // $faker = Faker::create();

        // for ($i=0; $i < 100; $i++) {
            $package = new Package();

            $package->title = 'Package 1';
            $package->validity = 365;
            $package->price = 1800;
            $package->task_amount = 40;
            // $package->limit = 20000;
            $package->status = 1;
            $package->save();
        // }

        $package = new Package();

        $package->title = 'Package 2';
        $package->validity = 365;
        $package->price = 3600;
        $package->task_amount = 100;
        // $package->limit = 20000;
        $package->status = 1;
        $package->save();

        $package = new Package();

        $package->title = 'Package 3';
        $package->validity = 365;
        $package->price = 7500;
        $package->task_amount = 230;
        // $package->limit = 20000;
        $package->status = 0;
        $package->save();

        // $package = new Package();

        // $package->title = 'Package 4';
        // $package->validity = 365;
        // $package->price = 15000;
        // $package->limit = 20000;
        // $package->status = 1;
        // $package->save();

        // $package = new Package();

        // $package->title = 'Package 5';
        // $package->validity = 365;
        // $package->price = 30000;
        // // $package->limit = 20000;
        // $package->status = 1;
        // $package->save();

        // $package = new Package();

        // $package->title = 'Package 6';
        // $package->validity = 365;
        // $package->price = 50000;
        // $package->limit = 20000;
        // $package->status = 1;
        // $package->save();

    }
}

