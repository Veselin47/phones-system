<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Phone::create(['name' => 'iPhone 13 Pro', 'phone_model_id' => 1, 'manufacturer_id' => 1, 'release_year' => 2021]);
// и т.н.

    }
}
