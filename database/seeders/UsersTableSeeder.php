<?php

namespace Database\Seeders;

use App\Constants\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'agent@hdbi.com',
                'password' => bcrypt('password'),
                'role' => Roles::REAL_STATE_AGENT
            ], 
            [
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'admin@hdbi.com',
                'password' => bcrypt('password'),
                'role' => Roles::ROOT
            ], 
            [
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'email' => 'inspector@hdbi.com',
                'password' => bcrypt('password'),
                'role' => Roles::INSPECTOR
            ], 
        ];

        foreach ($users as $item) {
            $userData = collect($item)->except('role')->toArray();
            
            $user = \App\Models\User::create($userData);

            $user->assignRole($item['role']);
        }
    }
}
