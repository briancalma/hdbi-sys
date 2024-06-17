<?php

namespace Database\Seeders;

use App\Constants\Roles;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   

        if(config('app.env') !== 'production') {
            $faker = \Faker\Factory::create();
            
            for ($i = 0; $i < 20; $i++) {
                $_user = [
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'email' => $faker->unique()->safeEmail,
                    'password' => bcrypt('password'),
                    'role' => Roles::REAL_ESTATE_AGENT
                ];
            
                $userData = collect($_user)->except('role')->toArray();
                
                $user = \App\Models\User::create($userData);
                $user->assignRole($_user['role']);
            } 
        }

        $users = [
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'agent@hdbi.com',
                'password' => bcrypt('password'),
                'role' => Roles::REAL_ESTATE_AGENT
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
