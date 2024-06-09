<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HandlingTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $handlingTimes = [
            ['name' => '3-4 Business Days', 'additional_charge' => 0.00],
            ['name' => '2-3 Business Days', 'additional_charge' => 10.00],
            ['name' => '1-2 Business Day', 'additional_charge' => 20.00]
        ];

        foreach($handlingTimes as $handlingTime) {
            \App\Models\HandlingTime::create($handlingTime);
        }
    }
}
