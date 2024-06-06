<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $configurations = [
            ['key' => 'Currency', 'value' => 'AUD', 'type' => 'string'],
            ['key' => 'Additional charges for second dwelling', 'value' => '10', 'type' => 'integer'],
            ['key' => 'Company email', 'value' => 'hdbi@hello.com']
        ];

        foreach ($configurations as $configuration) {
            \App\Models\Configuration::create($configuration);
        }
    }
}
