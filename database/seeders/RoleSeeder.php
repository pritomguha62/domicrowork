<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Role::create([
            'role_title' => 'Developer',
        ]);

        Role::create([
            'role_title' => 'Admin',
        ]);

        Role::create([
            'role_title' => 'Moderator',
        ]);

        Role::create([
            'role_title' => 'Member',
        ]);

    }
}


