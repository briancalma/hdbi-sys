<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            ['name' => 'Basic'],
            ['name' => 'Standard'],
            ['name' => 'Premium']
        ];

        foreach($packages as $package) {
            \App\Models\OrderType::create($package);
        }
    }
}
