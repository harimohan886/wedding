<?php

namespace Database\Seeders;

use App\Models\FormField;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        FormField::truncate();

        FormField::insert([
            [
                'field' => 'maximum_budget',
                'value' => '100000000',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'field' => 'maximum_guest',
                'value' => '5000',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'field' => 'maximum_rooms',
                'value' => '100',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'field' => 'maximum_ratings',
                'value' => '5',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
