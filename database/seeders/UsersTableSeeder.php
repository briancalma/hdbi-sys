<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'email' => 'johndoe@hdbi.com',
                'password' => bcrypt('password'),
                'role' => 'Real-State Agent'
            ], 
            [
                'first_name' => 'Admin',
                'last_name' => 'Hdbi',
                'email' => 'admin@hdbi.com',
                'password' => bcrypt('password'),
                'role' => 'Admin'
            ], 
        ];

        foreach ($users as $user) {
            $userData = collect($user)->except('role')->toArray();
         
            \App\Models\User::create($userData);
        }
    }
}
